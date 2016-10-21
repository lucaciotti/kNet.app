@extends('layouts.app')

@section('htmlheader_title')
    - Profilo Utente
@endsection

@section('contentheader_title')
@endsection

@section('contentheader_breadcrumb')
  {!! Breadcrumbs::render('clients') !!}
@endsection

@section('main-content')
  <div class="row">
    <div class="col-lg-10 col-lg-offset-1">
      <img src="{{asset('/img/avatar_default.jpg')}}" style="width:120px; height:120px; float:left; border-radius:50%; margin-right:25px;"/>
      <h2>{{ $user->name }}'s Profile</h2>
      @if (!in_array(Registry::get('role'), ['client', 'agent', 'superAgent', 'user']))
        <a href="{{ route('user::users.edit', $user->id ) }}">
          <button type="submit" id="edit-user-{{ $user->id }}" class="btn btn-sm">
              <i class="fa fa-btn fa-pencil"></i>&nbsp;&nbsp; Edit
          </button>
        </a>
      @endif
    </div>
  </div>
  <hr>
  <div class="row">
    <div class="col-lg-8 col-lg-offset-2">
        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title" data-widget="collapse">Impostazioni Utente</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div>
          <div class="box-body">
            <dl class="dl-horizontal">
              <dt>Nome</dt>
              <dd>{{$user->name}}</dd>

              <dt>Email</dt>
              <dd>{{ $user->email }}</dd>

              <dt>Ruolo</dt>
              <dd>{{$user->roles()->first()->display_name}}</dd>

              @if (!empty($user->codag))
                <dt>Cod. Agente</dt>
                <dd>{{$user->codag}} - {{$user->agent->descrizion}}</dd>
              @endif

              @if (!empty($user->codcli))
                <dt>Cod. Cliente</dt>
                <dd>{{$user->codcli}} - {{$user->client->descrizion}}</dd>
              @endif

              <dt>Ditta di Riferimento</dt>
              <dd>{{ $user->ditta }}</dd>

            </dl>

          </div>
      </div>
    </div>
  </div>
@endsection

@section('extra_script')
  @include('layouts.partials.scripts.iCheck')
  @include('layouts.partials.scripts.select2')
  @include('layouts.partials.scripts.datePicker')
@endsection
