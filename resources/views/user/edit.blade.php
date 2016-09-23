@extends('layouts.app')

@section('htmlheader_title')
    - Gestione Utenti
@endsection

@section('contentheader_title')
    Gestione degli Utenti
@endsection

@section('contentheader_breadcrumb')
  {!! Breadcrumbs::render('clients') !!}
@endsection

@section('main-content')
  <div class="row">
      <div class="container">
      <div class="col-lg-12">
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title" data-widget="collapse">Modifica Utente</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">

          <form action="{{ route('user::users.update', $user->id) }}" method="POST">
              {{ csrf_field() }}
              {{ method_field('PUT') }}
            <div class="form-group">
              <label>Nome</label>
              <input type="text" class="form-control" name="name" value="{{$user->name}}">
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="text" class="form-control" name="email" value="{{$user->email}}">
            </div>
            <div class="form-group">
              <label>Ruolo</label>
              <select name="role" class="form-control select2" style="width: 100%;">
                <option value=""> </option>
                @foreach ($roles as $role)
                  <option value="{{ $role->id }}"
                    @if($user->roles->contains($role->id))
                        selected
                    @endif
                    >{{ $role->display_name }}</option>
                @endforeach
              </select>
            </div>
            {{-- <div class="form-group">
              <label>Cod. Agente</label>
              <input type="text" class="form-control" name="codag" value="{{$user->codag}}">
            </div> --}}
            <div class="form-group">
              <label>Cod. Agente</label>
              <select name="codag" class="form-control select2" style="width: 100%;">
                <option value=""> </option>
                @foreach ($agents as $agent)
                  <option value="{{ $agent->codice }}"
                    @if($agent->codice===$user->codag)
                        selected
                    @endif
                    >[{{$agent->codice}}] {{ $agent->descrizion }}</option>
                @endforeach
              </select>
            </div>
            {{-- <div class="form-group">
              <label>Cod. Cliente</label>
              <input type="text" class="form-control" name="codcli" value="{{$user->codcli}}">
            </div> --}}
            <div class="form-group">
              <label>Cod. Cliente</label>
              <select name="codcli" class="form-control select2" style="width: 100%;">
                <option value=""> </option>
                @foreach ($clients as $client)
                  <option value="{{ $client->codice }}"
                    @if($client->codice==$user->codcli)
                        selected
                    @endif
                    >[{{$client->codice}}] {{ $client->descrizion }}</option>
                @endforeach
              </select>
            </div>
            <div>
              <button type="submit" class="btn btn-primary">{{ trans('adminlte_lang::message.submit') }}</button>
            </div>
          </form>

        </div>
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
