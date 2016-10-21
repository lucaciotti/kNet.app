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
            <li class="header">Arca Web</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="{{ Ekko::isActiveURL('home') }}"><a href="{{ url('/home') }}"><i class='fa fa-home'></i> <span>{{ trans('adminlte_lang::message.home') }}</span></a></li>

            @if (!in_array(Registry::get('role'), ['user']))
              @if (in_array(Registry::get('role'), ['client']))
                <li class="{{ Ekko::isActiveRoute('client::*') }}"><a href="{{ route('client::list') }}"><i class='fa fa-user'></i> <span>Anagrafica Cliente</span></a></li>
              @else
                <li class="{{ Ekko::isActiveRoute('client::*') }}"><a href="{{ route('client::list') }}"><i class='fa fa-users'></i> <span>Lista Cliente</span></a></li>
              @endif
              <li class="treeview {{ Ekko::isActiveRoute('doc::*') }}">
                  <a href="{{ route('doc::list') }}"><i class='fa fa-copy'></i> <span>Documenti</span> <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                      <li class="{{ Ekko::isActiveRoute('doc::list','O') }}"><a href="{{ route('doc::list', 'O') }}">ORDINI</a></li>
                      <li class="{{ Ekko::isActiveRoute('doc::list','B') }}"><a href="{{ route('doc::list', 'B') }}">BOLLE</a></li>
                      <li class="{{ Ekko::isActiveRoute('doc::list','F') }}"><a href="{{ route('doc::list', 'F') }}">FATTURE</a></li>
                  </ul>
              </li>
              <li class="{{ Ekko::isActiveRoute('scad::*') }}"><a href="{{ route('scad::list') }}"><i class='fa fa-money'></i> <span>Scadenze</span></a></li>
              <li class="{{ Ekko::isActiveRoute('prod::*') }}"><a href="{{ route('prod::list') }}"><i class='fa fa-cube'></i> <span>Prodotti</span></a></li>
              <li><i class='fa fa-empty'></i></li>

              {{-- @if (!Auth::user()->hasRole('client')) --}}
              @if (!in_array(Registry::get('role'), ['client']))
              <li class="header">Funzioni Web</li>
              {{-- <li class=""><a href="{{ route('doc::list', 'O') }}"><i class='fa fa-pencil-square-o'></i> <span>Pre-Ordini via Web</span></a></li> --}}
              <li class="{{ Ekko::isActiveRoute('visit::*') }}"><a href="{{ route('visit::insert') }}"><i class='fa fa-weixin'></i> <span>Inserimento Visite Clienti</span></a></li>
              <li><i class='fa fa-empty'></i></li>

              <li class="header">Statistiche</li>
              <li class="treeview {{ Ekko::isActiveRoute('stFatt::*') }}">
                  <a href="{{ route('stFatt::idxAg') }}"><i class='fa fa-line-chart'></i> <span>Statistiche Fatturato</span> <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                      <li class="{{ Ekko::isActiveRoute('stFatt::idxAg') }}"><a href="{{ route('stFatt::idxAg') }}">Agente</a></li>
                      <li class="{{ Ekko::isActiveRoute('stFatt::idxCli') }}"><a href="{{ route('stFatt::idxCli') }}">Cliente</a></li>
                  </ul>
              </li>
              @endif
            @endif
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
