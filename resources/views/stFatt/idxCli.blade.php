@extends('layouts.app')

@section('htmlheader_title')
    - Statistiche
@endsection

@section('contentheader_title')
    Statistiche Cliente
@endsection

@section('contentheader_breadcrumb')
    {!! Breadcrumbs::render('clientStFat', $cliente) !!}
@endsection

@push('css-head')
  <!-- Morris charts -->
  <link rel="stylesheet" href="{{ asset('/plugins/morris/morris.css') }}">
@endpush

@section('main-content')
<div class="row">
  <div class="col-lg-3">
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title" data-widget="collapse">Cliente</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          {{-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button> --}}
        </div>
      </div>
      <div class="box-body">
        <form action="{{ route('stFatt::idxCli') }}" method="post">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="form-group">
            <label>Seleziona Cliente</label>
            <select name="codcli" class="form-control select2" style="width: 100%;">
              <option value=""> </option>
              @foreach ($clients as $client)
                <option value="{{ $client->codicecf }}"
                  @if($client->codicecf==$cliente)
                      selected
                  @endif
                  >{{ $client->client->descrizion }}</option>
              @endforeach
            </select>
          </div>
          <div>
            <button type="submit" class="btn btn-primary">{{ trans('adminlte_lang::message.submit') }}</button>
          </div>
        </form>
      </div>
    </div>

    <div class="box box-default">
      {{-- <div class="box-header with-border">
        <h3 class="box-title" data-widget="collapse">% Target</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div> --}}
      <div class="box-body text-center">
        @php
          $valMese = 'valore' . $prevMonth;
          $tgtMese = $target->first()->$valMese;
          $fatMese = $fatTot->first()->fattmese;
          $deltaProg = round((($fatMese) / $tgtMese) * 100,2);
          $deltaProg = $deltaProg > 100 ? 100 : $deltaProg;
          $colorDelta = ($deltaProg < 33) ? 'red' : ($deltaProg > 33 && $deltaProg < 66) ? 'orange' : 'green';
        @endphp
          <input type="text" class="knob" data-thickness="0.2" data-angleArc="250" data-angleOffset="-125" value="{{ $deltaProg }}" data-width="120" data-height="120" data-fgColor="{{ $colorDelta }}">

          <div class="knob-label"><strong>% Target Mese</strong></div>
        </div>
    </div>
  </div>

  <div class="col-lg-9">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs pull-right">
        <li class="active"><a href="#StatTot" data-toggle="tab" aria-expanded="true">TOTALI</a></li>
        <li class=""><a href="#StatDet" data-toggle="tab" aria-expanded="false">Dettagliate</a></li>
        <li class="pull-left header"><i class="fa fa-th"></i> Statistiche</li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="StatTot">
        @include('stFatt.partials.tblTotAg', [
          'fatturato' => $fatTot,
          'target' => $target,
          'prevMonth' => $prevMonth,
        ])
        </div>

        <div class="tab-pane" id="StatDet">

          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#Krona" data-toggle="tab" aria-expanded="true">Krona</a></li>
              <li class=""><a href="#Koblenz" data-toggle="tab" aria-expanded="false">Koblenz</a></li>
              <li class=""><a href="#Kubica" data-toggle="tab" aria-expanded="false">Kubica</a></li>
              <li class=""><a href="#Grass" data-toggle="tab" aria-expanded="false">Grass</a></li>
              <li class=""><a href="#Altro" data-toggle="tab" aria-expanded="false">Altro</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="Krona">
                @include('stFatt.partials.tblDetAg', [
                  'fatturato' => $fatDet->where('prodotto', 'KRONA'),
                ])
              </div>

              <div class="tab-pane" id="Koblenz">
                @include('stFatt.partials.tblDetAg', [
                  'fatturato' => $fatDet->where('prodotto', 'KOBLENZ'),
                ])
              </div>

              <div class="tab-pane" id="Kubica">
                @include('stFatt.partials.tblDetAg', [
                  'fatturato' => $fatDet->where('prodotto', 'KUBIKA'),
                ])
              </div>

              <div class="tab-pane" id="Grass">
                @include('stFatt.partials.tblDetAg', [
                  'fatturato' => $fatDet->where('prodotto', 'GRASS'),
                ])
              </div>

              <div class="tab-pane" id="Altro">
                @include('stFatt.partials.tblDetAg', [
                  'fatturato' => $fatDet->where('prodotto', 'ALTRO'),
                ])
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-12">
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title" data-widget="collapse">Grafico</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body chart-responsive">
        <div class="chart" id="revenue-chart" style="height: 300px;"></div>
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

@push('script-footer')
  <script src="{{ asset('/plugins/knob/jquery.knob.js') }}"></script>
  <!-- Morris.js charts -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="{{ asset('/plugins/morris/morris.min.js') }}"></script>
  <script>
  $(function () {
    /* jQueryKnob */
    $(".knob").knob({
      /*change : function (value) {
       //console.log("change : " + value);
       },
       release : function (value) {
       console.log("release : " + value);
       },
       cancel : function () {
       console.log("cancel : " + this.value);
       },*/
      draw: function () {}
    });
    /* END JQUERY KNOB */

    "use strict";
    // AREA CHART
    var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    var data = {!! $stats !!};
    var area = new Morris.Line({
      element: 'revenue-chart',
      resize: true,
      data: data,
      xkey: 'm',
      ykeys: ['a', 'b'],
      labels: ['Fatturato', 'Target'],
      lineColors: ['#227a03', '#cd6402'],
      hideHover: 'auto',
      xLabelFormat: function(x) { // <--- x.getMonth() returns valid index
        var month = months[x.getMonth()];
        return month;
      },
      dateFormat: function(x) {
        var month = months[new Date(x).getMonth()];
        return month;
      },
    });
  });
</script>
@endpush
