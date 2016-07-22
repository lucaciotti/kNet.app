@extends('layouts.app')
@section('htmlheader_title')
    - Dettaglio Cliente
@endsection

@section('contentheader_title')
    {{$client->descrizion}}
@endsection

@section('contentheader_description')
    [{{$client->codice}}]
@endsection

@section('contentheader_breadcrumb')
  {!! Breadcrumbs::render('client', $client->codice) !!}
@endsection

@section('main-content')
{{-- <div class="container"> --}}
<div class="row">
  <div class="col-lg-5">
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title">Dati Anagrafica</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">
        <dl class="dl-horizontal">
          <dt>Codice Cliente</dt>
          <dd>{{$client->codice}}</dd>

          <dt>Ragione Sociale</dt>
          <dd><strong>{{$client->descrizion}} {{$client->supragsoc}}</strong></dd>

          <dt>Partita Iva</dt>
          <dd>{{$client->partiva}}</dd>

          @if($client->codfiscale != $client->partiva)
            <dt>Codice Fiscale</dt>
            <dd>{{$client->codfiscale}}</dd>
          @endif

          <dt>Settore Merciologico</dt>
          <dd>{{$client->settore}} - @if($client->detSect) {{$client->detSect->descrizion}} @endif</dd>
        </dl>

        <h4> Località </h4>
        <hr>
        <dl class="dl-horizontal">

          <dt>Località</dt>
          <dd>{{$client->localita}} ({{$client->prov}}) - @if($client->detNation) {{$client->detNation->descrizion}} @endif</dd>

          <dt>Indirizzo</dt>
          <dd>{{$client->indirizzo}}</dd>

          <dt>CAP</dt>
          <dd>{{$client->cap}}</dd>

          <dt>Zona</dt>
          <dd>@if($client->detZona) {{$client->detZona->descrizion}} @endif</dd>
        </dl>

        <h4> Situazione Cliente </h4>
        <hr>
        <dl class="dl-horizontal">

          <dt>Stato Cliente</dt>
          <dd>{{$client->statocf}} - @if($client->detStato) {{$client->detStato->descrizion}} @endif</dd>

          <dt>Tipo Pagamento</dt>
          <dd>{{$client->pag}} - @if($client->detPag) {{$client->detPag->descrizion}} @endif</dd>

          <dt>Data Inizio Rapporto</dt>
          <dd>{{$client->u_dataini}}</dd>

          <dt>Data Fine Rapporto</dt>
          <dd>{{$client->u_datafine}}</dd>
        </dl>
      </div>
    </div>
  </div>

  <div class="col-lg-5">
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title">Contatti</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">
        <dl class="dl-horizontal">

          <dt>Persona da Contattare</dt>
          <dd>{{$client->persdacont}}</dd>

          <dt>Agente di Riferimento</dt>
          <dd>@if($client->agent) {{$client->agent->descrizion}} @endif</dd>

          <hr>

          <dt>Telefono</dt>
          <dd>{{$client->telefono}}</dd>

          <dt>Fax</dt>
          <dd>{{$client->fax}}</dd>

          <dt>Telex</dt>
          <dd>{{$client->telex}}</dd>

          <dt>Cellulare</dt>
          <dd>{{$client->telcell}}</dd>

          <hr>

          <dt>Email Generale</dt>
          <dd>{{$client->email}}</dd>

          <hr>

          <dt>Email Amministrazione</dt>
          <dd>{{$client->emailam}}</dd>

          <dt>Email Invio Ordini</dt>
          <dd>{{$client->emailut}}</dd>

          <dt>Email Invio Bolle</dt>
          <dd>{{$client->emailav}}</dd>

          <dt>Email Invio Fatture</dt>
          <dd>{{$client->emailpec}}</dd>

        </dl>
      </div>
    </div>
  </div>

</div>

<div class="row">
  <div class="col-lg-6">
    <div class="box box-default">  {{-- collapsed-box --}}
      <div class="box-header with-border">
        <h3 class="box-title">Annotazioni</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">
        <strong>{!! $client->note !!}</strong>
      </div>
    </div>
  </div>
  <div class="col-lg-4">
    <div class="box box-default collapsed-box">
      <div class="box-header with-border">
        <h3 class="box-title" data-widget="collapse">Documenti del Cliente</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
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

    <div class="box box-default collapsed-box">
      <div class="box-header with-border">
        <h3 class="box-title" data-widget="collapse">Scadenze del Cliente</h3>
        <span class="badge bg-yellow">{{$scads->count()}}</span>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
        </div>
      </div>
      <div class="box-body">
        <table class="table table-hover table-condensed dtTbls_light">
          <thead>
            <th>Data Scad.</th>
            <th>Num. Fatt.</th>
            <th>Data Fatt.</th>
            <th>Accorpata?</th>
            <th>Importo Scad.</th>
            <th>Importo Pagato</th>
          </thead>
          <tbody>
            @if($scads->count()>0)
              @foreach ($scads as $scad)
                @if($scad->insoluto==1 || $scad->u_insoluto==1)
                <tr class="danger">
                @elseif($scad->datascad < \Carbon\Carbon::now())
                <tr class="warning">
                @else
                <tr>
                @endif
                  <td>
                    <span>{{$scad->datascad->format('Ymd')}}</span>
                    <a href="{{ route('client::detail', $client->codice ) }}"> {{ $scad->datascad->format('d-m-Y') }}</a>
                  </td>
                  <td>{{ $scad->numfatt }}</td>
                  <td><span>{{$scad->datafatt->format('Ymd')}}</span>{{ $scad->datafatt->format('d-m-Y') }}</td>
                  <td>@if($scad->idragg>0)
                    <a href=""> Accorpata</a>
                  @endif</td>
                  <td>{{ $scad->impeffval }}</td>
                  <td>{{ $scad->importopag }}</td>
                </tr>
              @endforeach
            @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

{{-- </div> --}}
@endsection
