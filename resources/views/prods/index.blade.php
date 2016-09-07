@extends('layouts.app')

@section('htmlheader_title')
    - {{$descModulo or 'Documenti'}}
@endsection

@section('contentheader_title')
    Lista {{$descModulo or 'Documenti'}}
@endsection

{{-- @section('contentheader_breadcrumb')
  @if($tipomodulo)
    {!! Breadcrumbs::render('docsTipo', $tipomodulo) !!}
  @else
    {!! Breadcrumbs::render('docs') !!}
  @endif
@endsection --}}

@section('main-content')
<div class="row">
  <div class="col-lg-7">
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title" data-widget="collapse">Lista Prodotti</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">
        @include('prods.partials.tblIndex', $products)
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
        @include('prods.partials.formIndex', $gruppi)
      </div>
    </div>

    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title" data-widget="collapse">Extra Filtri</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">
        
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
