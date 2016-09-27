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
          <h3 class="box-title" data-widget="collapse">Lista degli Utenti</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <table class="table table-hover table-condensed dtTbls_full">
            <thead>
              <th>Nome</th>
              <th>eMail</th>
              <th>Ruolo</th>
              <th>Cod. Agente</th>
              <th>Cod. Cliente</th>
              <th>&nbsp;</th>
              <th>&nbsp;</th>
              <th>&nbsp;</th>
            </thead>
            <tbody>
              @if (count($users) > 1)
                @foreach ($users as $user)
                  <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>@foreach ($user->roles as $role)
                      {{ $role->display_name }}
                    @endforeach</td>
                    <td>@if ($user->codag!="")
                      {{ $user->codag }} - {{ $user->agent->descrizion }}
                    @endif</td>
                    <td>@if ($user->codcli!="")
                      {{ $user->codcli }}
                      {{-- {{ $user->codcli }} - {{ $user->client->descrizion }} --}}
                    @endif</td>
                    <td>
                      <a href="{{ route('user::actLike', $user->id ) }}">
                        <button type="submit" id="act-user-{{ $user->id }}" class="btn btn-warning">
                            <i class="fa fa-btn fa-user-secret">
                            </i>
                        </button>
                      </a>
                    </td>
                    <td>
                      <a href="{{ route('user::users.edit', $user->id ) }}">
                        <button type="submit" id="edit-user-{{ $user->id }}" class="btn">
                            <i class="fa fa-btn fa-pencil">
                            </i>
                        </button>
                      </a>
                    </td>
                    <td>
                      <form action="{{ route('user::users.destroy', $user->id) }}" method="POST">
                          {{ csrf_field() }}
                          {{ method_field('DELETE') }}
                          <button type="submit" id="delete-user-{{ $user->id }}" class="btn btn-danger">
                              <i class="fa fa-btn fa-trash"></i>
                          </button>
                      </form>
                    </td>
                  </tr>
                @endforeach
              @else
                <tr>
                  <td>
                    <a href="{{ route('user::users.show', $users->id ) }}"> {{ $users->id }}</a>
                  </td>
                  <td>{{ $users->name }}</td>
                  <td>{{ $users->email }}</td>
                  <td>@foreach ($users->roles as $role)
                    {{ $role->display_name }}
                  @endforeach</td>
                </tr>
              @endif

            </tbody>
          </table>
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
