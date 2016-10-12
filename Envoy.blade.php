@servers(['web' => 'luca@172.16.9.39', 'web2' => 'ced@213.152.198.49'])

@setup
  $repo = 'https://github.com/lucaciotti/kNet.app.git';
  $release_dir = '/home/ced/releases';
  $app_dir = '/var/www/html/kNet/';
  $release = 'release_' . date('YmdHis');
@endsetup

@macro('deploy', ['on' => 'web'])
    fetch_repo
    run_composer
    update_permissions
    update_symlinks
@endmacro

@macro('deploy-kuantica', ['on' => 'web2'])
    fetch_repo
    run_composer
    update_permissions
    update_symlinks
@endmacro

@task('fetch_repo')
    [ -d {{ $release_dir }} ] || mkdir {{ $release_dir }};
    cd {{ $release_dir }};
    git clone -b master --depth=1 {{ $repo }} {{ $release }};
    {{-- git clone -b dev --depth=1 {{ $repo }} {{ $release }}; --}}
@endtask

@task('run_composer')
    cd {{ $release_dir }}/{{ $release }};
    {{-- composer install --prefer-dist; --}}
    composer install --prefer-dist --no-scripts;
    php artisan clear-compiled --env=production;
    php artisan optimize --env=production;
@endtask

@task('update_permissions')
    cd {{ $release_dir }};
    chgrp -R www-data {{ $release }};
    chmod -R ug+rwx {{ $release }};
@endtask

@task('update_symlinks')
    ln -nfs {{ $release_dir }}/{{ $release }} {{ $app_dir }};
    chgrp -h www-data {{ $app_dir }};

    cd {{ $release_dir }}/{{ $release }};
    ln -nfs ../../.env .env;
    chgrp -h www-data .env;

    rm -r {{ $release_dir }}/{{ $release }}/storage/logs;
    cd {{ $release_dir }}/{{ $release }}/storage;
    ln -nfs ../../../logs logs;
    chgrp -h www-data logs;

    sudo service php5-fpm reload;
@endtask
