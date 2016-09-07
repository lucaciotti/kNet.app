@extends('layouts.app')

@section('htmlheader_title')
    - Anagrafica Clienti
@endsection

@section('contentheader_title')
    Anagrafica Clienti
@endsection

@section('contentheader_breadcrumb')
  {!! Breadcrumbs::render('clients') !!}
@endsection

@section('main-content')
  <div class="row">

    <div class="col-lg-7">
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title" data-widget="collapse">Lista Clienti</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <table class="table table-hover table-condensed dtTbls_light">
            <thead>
              <th>Codice</th>
              <th>Rag. Sociale</th>
              <th>Nazione e Località</th>
              <th>Settore</th>
              <th>Agente</th>
              <th>Link Documenti</th>
            </thead>
            <tbody>
              @foreach ($clients as $client)
                <tr>
                  <td>
                    <a href="{{ route('client::detail', $client->codice ) }}"> {{ $client->codice }}</a>
                  </td>
                  <td>{{ $client->descrizion }}</td>
                  <td>{{ $client->codnazione }} - {{ $client->localita }}</td>
                  <td>{{ $client->settore }}</td>
                  <td>@if($client->agent) {{ $client->agent->descrizion }} @endif</td>
                  <td><a href="{{ route('doc::client', $client->codice) }}">Documenti</a></td>
                </tr>
              @endforeach
            </tbody>
          </table>
          {{-- {!! $clients->render() !!} --}}
        </div>
      </div>
    </div>

    <div class="col-lg-5">
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title" data-widget="collapse">Filtro</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            {{-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button> --}}
          </div>
        </div>
        <div class="box-body">
          @include('client.partials.formIndex')
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
