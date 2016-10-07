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
            <select name="codag" class="form-control select2" style="width: 100%;">
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
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#StatTot" data-toggle="tab" aria-expanded="true">Statistiche Totali</a></li>
        <li class=""><a href="#StatDet" data-toggle="tab" aria-expanded="false">Dettagliate</a></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="StatTot">
        @include('stFatt.partials.tblTotAg', [
          'fatturato' => $fatTot,
          'target' => $target,
        ])
        </div>

        <div class="tab-pane" id="StatDet">
          <div class="box-group" id="accordion">

            <div class="panel box box-primary">
              <div class="box-header with-border">
                <h4 class="box-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                    KRONA
                  </a>
                </h4>
              </div>
              <div id="collapse1" class="panel-collapse collapse">
                <div class="box-body">
                  @include('stFatt.partials.tblDetAg', [
                    'fatturato' => $fatDet->where('grp', 'A'),
                  ])
                </div>
              </div>
            </div>

            <div class="panel box box-danger">
              <div class="box-header with-border">
                <h4 class="box-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                    KOBLENZ
                  </a>
                </h4>
              </div>
              <div id="collapse2" class="panel-collapse collapse">
                <div class="box-body">
                  @include('stFatt.partials.tblDetAg', [
                    'fatturato' => $fatDet->where('grp', 'B')->where('gruppo', '!=', 'B06'),
                  ])
                </div>
              </div>
            </div>

            <div class="panel box box-danger">
              <div class="box-header with-border">
                <h4 class="box-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                    KUBICA
                  </a>
                </h4>
              </div>
              <div id="collapse3" class="panel-collapse collapse">
                <div class="box-body">
                  @include('stFatt.partials.tblDetAg', [
                    'fatturato' => $fatDet->where('gruppo', 'B06'),
                  ])
                </div>
              </div>
            </div>

            <div class="panel box box-danger">
              <div class="box-header with-border">
                <h4 class="box-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
                    GRASS
                  </a>
                </h4>
              </div>
              <div id="collapse4" class="panel-collapse collapse">
                <div class="box-body">
                  @include('stFatt.partials.tblDetAg', [
                    'fatturato' => $fatDet->where('grp', 'C'),
                  ])
                </div>
              </div>
            </div>

            <div class="panel box box-danger">
              <div class="box-header with-border">
                <h4 class="box-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">
                    ALTRO
                  </a>
                </h4>
              </div>
              <div id="collapse5" class="panel-collapse collapse">
                <div class="box-body">
                  @include('stFatt.partials.tblDetAg', [
                    'fatturato' => $fatDet->where('grp', 'D'),
                  ])
                </div>
              </div>
            </div>

          </div>
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
