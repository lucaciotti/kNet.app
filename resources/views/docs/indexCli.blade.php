@extends('layouts.app')

@section('htmlheader_title')
    - {{$descModulo}}
@endsection

@section('contentheader_title')
    Lista {{$descModulo}}
@endsection

@section('contentheader_description')
    {{$client->descrizion}} [{{$client->codice}}]
@endsection

@section('contentheader_breadcrumb')
    {!! Breadcrumbs::render('clientDocs', $codicecf, $tipomodulo) !!}
@endsection

@section('main-content')
<div class="row">
  <div class="col-lg-7">
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title" data-widget="collapse">Lista Documenti</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">
        @include('docs.partials.tblIndex', $docs)
      </div>
    </div>
  </div>

  <div class="col-lg-5">
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title" data-widget="collapse">Filtra</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          {{-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button> --}}
        </div>
      </div>
      <div class="box-body">
        <form action="{{ route('client::fltList') }}" method="post">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="form-group">
            <label>Ragione Sociale</label>
            <div class="input-group">
              <span class="input-group-btn">
                <select type="button" class="btn btn-warning dropdown-toggle" name="ragsocOp">
                  <option value="eql">=</option>
                  <option value="stw">[]...</option>
                  <option value="cnt" selected>...[]...</option>
                </select>
              </span>
              <input type="text" class="form-control" name="ragsoc">
            </div>
          </div>
          <div class="form-group">
            <label>Data Documento:</label>
            <div class="input-group">
              <button type="button" class="btn btn-default pull-right daterange-btn" id="">
                <span>
                  <i class="fa fa-calendar"></i> Date range picker
                </span>
                <i class="fa fa-caret-down"></i>
              </button>
            </div>
          </div>
          <div>
            <button type="submit" class="btn btn-primary">{{ trans('adminlte_lang::message.submit') }}</button>
          </div>
        </form>
      </div>
    </div>

    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title" data-widget="collapse">Cambia Documento per {{$client->descrizion}}</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">
        <a type="button" class="btn btn-default btn-block" href="{{ route('doc::client', [$client->codice, '']) }}">TUTTI</a>
        <a type="button" class="btn btn-default btn-block" href="{{ route('doc::client', [$client->codice, 'P']) }}">Preventivi</a>
        <a type="button" class="btn btn-default btn-block" href="{{ route('doc::client', [$client->codice, 'O']) }}">Ordini</a>
        <a type="button" class="btn btn-default btn-block" href="{{ route('doc::client', [$client->codice, 'B']) }}">Bolle</a>
        <a type="button" class="btn btn-default btn-block" href="{{ route('doc::client', [$client->codice, 'F']) }}">Fatture</a>
        <a type="button" class="btn btn-default btn-block" href="{{ route('doc::client', [$client->codice, 'N']) }}">Note di Accredito</a>
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
