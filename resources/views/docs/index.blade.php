@extends('layouts.app')

@section('htmlheader_title')
    - {{$descModulo or 'Documenti'}}
@endsection

@section('contentheader_title')
    Lista {{$descModulo or 'Documenti'}}
@endsection

@section('contentheader_breadcrumb')
  @if($tipomodulo)
    {!! Breadcrumbs::render('docsTipo', $tipomodulo) !!}
  @else
    {!! Breadcrumbs::render('docs') !!}
  @endif
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
        @include('docs.partials.formIndex')
      </div>
    </div>

    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title" data-widget="collapse">Cambia Tipo Documento</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">
        <a type="button" class="btn btn-default btn-block" href="{{ route('doc::list', ['']) }}">TUTTI</a>
        <a type="button" class="btn btn-default btn-block" href="{{ route('doc::list', ['P']) }}">Preventivi</a>
        <a type="button" class="btn btn-default btn-block" href="{{ route('doc::list', ['O']) }}">Ordini</a>
        <a type="button" class="btn btn-default btn-block" href="{{ route('doc::list', ['B']) }}">Bolle</a>
        <a type="button" class="btn btn-default btn-block" href="{{ route('doc::list', ['F']) }}">Fatture</a>
        <a type="button" class="btn btn-default btn-block" href="{{ route('doc::list', ['N']) }}">Note di Accredito</a>
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
