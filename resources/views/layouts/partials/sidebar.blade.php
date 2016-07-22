<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{asset('/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">{{ trans('adminlte_lang::message.header') }}</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="{{ Ekko::isActiveURL('home') }}"><a href="{{ url('/blankPage') }}"><i class='fa fa-home'></i> <span>{{ trans('adminlte_lang::message.home') }}</span></a></li>
            <li class="{{ Ekko::isActiveRoute('client::*') }}"><a href="{{ route('client::list') }}"><i class='fa fa-users'></i> <span>Lista Cliente</span></a></li>
            <li class="treeview {{ Ekko::isActiveRoute('doc::*') }}">
                <a href="{{ route('doc::list') }}"><i class='fa fa-copy'></i> <span>Documenti</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="{{ Ekko::isActiveRoute('doc::list','O') }}"><a href="{{ route('doc::list', 'O') }}">ORDINI</a></li>
                    <li class="{{ Ekko::isActiveRoute('doc::list','B') }}"><a href="{{ route('doc::list', 'B') }}">BOLLE</a></li>
                    <li class="{{ Ekko::isActiveRoute('doc::list','F') }}"><a href="{{ route('doc::list', 'F') }}">FATTURE</a></li>
                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
