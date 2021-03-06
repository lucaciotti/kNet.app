<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{asset('/img/avatar_default.jpg')}}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('_menu.online') }}</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('_menu.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">Arca Web</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="{{ Ekko::isActiveURL('home') }}"><a href="{{ url('/home') }}"><i class='fa fa-home'></i> <span>{{ trans('_menu.home') }}</span></a></li>

            @if (!in_array(Registry::get('role'), ['user']))
              @if (in_array(Registry::get('role'), ['client']))
                <li class="{{ Ekko::isActiveRoute('client::*') }}"><a href="{{ route('client::list') }}"><i class='fa fa-user'></i> <span>{{ trans('_menu.anagClient') }}</span></a></li>
              @else
                <li class="{{ Ekko::isActiveRoute('client::*') }}"><a href="{{ route('client::list') }}"><i class='fa fa-users'></i> <span>{{ trans('_menu.listClients') }}</span></a></li>
              @endif
              <li class="treeview {{ Ekko::isActiveRoute('doc::*') }}">
                  <a href="{{ route('doc::list') }}"><i class='fa fa-copy'></i> <span>{{ trans('_menu.documents') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                      <li class="{{ Ekko::isActiveRoute('doc::list','O') }}"><a href="{{ route('doc::list', 'O') }}">{{ strtoupper(trans('_menu.orders')) }}</a></li>
                      <li class="{{ Ekko::isActiveRoute('doc::list','B') }}"><a href="{{ route('doc::list', 'B') }}">{{ strtoupper(trans('_menu.ddt')) }}</a></li>
                      <li class="{{ Ekko::isActiveRoute('doc::list','F') }}"><a href="{{ route('doc::list', 'F') }}">{{ strtoupper(trans('_menu.invoice')) }}</a></li>
                  </ul>
              </li>
              <li class="{{ Ekko::isActiveRoute('scad::*') }}"><a href="{{ route('scad::list') }}"><i class='fa fa-money'></i> <span>{{ trans('_menu.payment') }}</span></a></li>
              <li class="{{ Ekko::isActiveRoute('prod::*') }}"><a href="{{ route('prod::list') }}"><i class='fa fa-cube'></i> <span>{{ trans('_menu.products') }}</span></a></li>
              <li><i class='fa fa-empty'></i></li>

              {{-- @if (!Auth::user()->hasRole('client')) --}}
              @if (!in_array(Registry::get('role'), ['client']))
              <li class="header">Funzioni Web</li>
              {{-- <li class=""><a href="{{ route('doc::list', 'O') }}"><i class='fa fa-pencil-square-o'></i> <span>Pre-Ordini via Web</span></a></li> --}}
              <li class="{{ Ekko::isActiveRoute('visit::*') }}"><a href="{{ route('visit::insert') }}"><i class='fa fa-weixin'></i> <span>{{ trans('_menu.insVisits') }}</span></a></li>
              <li><i class='fa fa-empty'></i></li>

              <li class="header">Statistiche</li>
              <li class="treeview {{ Ekko::isActiveRoute('stFatt::*') }}">
                  <a href="{{ route('stFatt::idxAg') }}"><i class='fa fa-line-chart'></i> <span>{{ trans('_menu.statsFatt') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                      <li class="{{ Ekko::isActiveRoute('stFatt::idxAg') }}"><a href="{{ route('stFatt::idxAg') }}">{{ trans('_menu.agent') }}</a></li>
                      <li class="{{ Ekko::isActiveRoute('stFatt::idxCli') }}"><a href="{{ route('stFatt::idxCli') }}">{{ trans('_menu.client') }}</a></li>
                      @if (!in_array(Registry::get('role'), ['agent']))
                        <li class="{{ Ekko::isActiveRoute('stFatt::idxZone') }}"><a href="{{ route('stFatt::idxZone') }}">{{ trans('_menu.zone') }}</a></li>
                        <li class="{{ Ekko::isActiveRoute('stFatt::idxManager') }}"><a href="{{ route('stFatt::idxManager') }}">{{ trans('_menu.superAgent') }}</a></li>
                      @endif
                  </ul>
              </li>
              {{-- <li class="treeview {{ Ekko::isActiveRoute('stAbc::*') }}">
                  <a href="{{ route('stAbc::idxAg') }}"><i class='fa fa-sort-alpha-asc'></i> <span>{{ trans('_menu.statsAbc') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                      <li class="{{ Ekko::isActiveRoute('stAbc::idxAg') }}"><a href="{{ route('stAbc::idxAg') }}">{{ trans('_menu.agent') }}</a></li>
                      <li class="{{ Ekko::isActiveRoute('stAbc::idxCli') }}"><a href="{{ route('stAbc::idxCli') }}">{{ trans('_menu.client') }}</a></li>
                      <li class="{{ Ekko::isActiveRoute('stAbc::idxZone') }}"><a href="{{ route('stAbc::idxZone') }}">{{ trans('_menu.zone') }}</a></li>
                      <li class="{{ Ekko::isActiveRoute('stAbc::idxManager') }}"><a href="{{ route('stAbc::idxManager') }}">{{ trans('_menu.superAgent') }}</a></li>
                  </ul>
              </li>
              <li><i class='fa fa-empty'></i></li> --}}

              {{-- <li class="header">Forecast & Target</li>
              <li class="treeview {{ Ekko::isActiveRoute('target::*') }}">
                  <a href="{{ route('stFatt::idxAg') }}"><i class='fa fa-stack-overflow'></i> <span>Forecast & Target</span> <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                      <li class="{{ Ekko::isActiveRoute('stFatt::idxAg') }}"><a href="{{ route('stFatt::idxAg') }}">{{ trans('_menu.agent') }}</a></li>
                      <li class="{{ Ekko::isActiveRoute('stFatt::idxCli') }}"><a href="{{ route('stFatt::idxCli') }}">Riepilogo Area Manager</a></li>
                  </ul>
              </li> --}}
              @endif
            @endif
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
