@servers(['web' => 'ced@172.16.9.39'])

@task('foo', ['on' => 'web'])
    mysql -u ".\Config::get('database.mysql.user')." -p".\Config::get('database.mysql.password')." ".\Config::get('database.mysql.database')." < script.sql
@endtask
