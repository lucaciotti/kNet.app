@extends('layouts.app')

@section('htmlheader_title')
    - Statistiche
@endsection

@section('contentheader_title')
    Statistiche Agente
@endsection

@section('contentheader_breadcrumb')
    {!! Breadcrumbs::render('docs') !!}
@endsection

@section('main-content')
<div class="row">
  <div class="col-lg-3">
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title" data-widget="collapse">Agente</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          {{-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button> --}}
        </div>
      </div>
      <div class="box-body">
        <form action="{{ route('stFatt::idxAg') }}" method="post">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="form-group">
            <label>Seleziona Agente</label>
            <select name="role" class="form-control select2" style="width: 100%;">
              <option value=""> </option>
              @foreach ($agents as $agent)
                <option value="{{ $agent->agente }}"
                  @if($agent->agente==$agente)
                      selected
                  @endif
                  >{{ $agent->agent->descrizion }}</option>
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

  <div class="col-lg-9">
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title" data-widget="collapse">Statistiche</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">
        @include('stFatt.partials.tblIndex', [
          'fatturato' => $fatturato,
          $target,
        ])
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
