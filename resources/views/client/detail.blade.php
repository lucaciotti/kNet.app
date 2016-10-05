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
  <div class="col-lg-4">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#Anag" data-toggle="tab" aria-expanded="true">Dati Anagrafica</a></li>
        <li class=""><a href="#Cont" data-toggle="tab" aria-expanded="false">Contatti</a></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="Anag">
          <dl class="dl-horizontal">
            <dt>Ragione Sociale</dt>
            <dd>
              <big><strong>{{$client->descrizion}}</strong></big>
              <small>{{$client->supragsoc}}</small>
            </dd>

            <dt>Codice Cliente</dt>
            <dd>{{$client->codice}}</dd>

            <dt>Partita Iva</dt>
            <dd>{{$client->partiva}}</dd>

            @if($client->codfiscale != $client->partiva)
              <dt>Codice Fiscale</dt>
              <dd>{{$client->codfiscale}}</dd>
            @endif

            <dt>Settore Merciologico</dt>
            <dd>{{$client->settore}} - @if($client->detSect) {{$client->detSect->descrizion}} @endif</dd>
          </dl>

          <h4><strong> Località </strong> </h4>
          <hr style="padding-top: 0; margin-top:0;">
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

          <h4><strong> Situazione Cliente</strong> </h4>
          <hr style="padding-top: 0; margin-top:0;">
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
        <!-- /.tab-pane -->
        <div class="tab-pane" id="Cont">
          <dl class="dl-horizontal">

            <dt>Persona da Contattare</dt>
            <dd>{{$client->persdacont}}</dd>

            <dt>Agente di Riferimento</dt>
            <dd>@if($client->agent) {{$client->agent->descrizion}} @endif</dd>

            <hr>

            <dt>Telefono</dt>
            <dd>{{$client->telefono}}
              @if (!empty($client->telefono))
                  &nbsp;<a href="tel:{{$client->telefono}}"><i class="btn btn-xs fa fa-phone bg-green"></i></a>
              @endif
            </dd>
            <dt>Fax</dt>
            <dd>{{$client->fax}}</dd>

            <dt>Telex</dt>
            <dd>{{$client->telex}}</dd>

            <dt>Cellulare</dt>
            <dd>{{$client->telcell}}
              @if (!empty($client->telcell))
                  &nbsp;<a href="tel:{{$client->telcell}}"><i class="btn btn-xs fa fa-phone bg-green"></i></a>
              @endif
            </dd>

            <hr>

            <dt>eMail Generale</dt>
            <dd>{{$client->email}}
              @if (!empty($client->email))
                  &nbsp;<a href="mailto:{{$client->email}}"><i class="btn btn-xs fa fa-envelope-o bg-red"></i></a>
              @endif
            </dd>

            <hr>

            <dt>eMail Amministrazione</dt>
            <dd>{{$client->emailam}}
              @if (!empty($client->emailam))
                  &nbsp;<a href="mailto:{{$client->emailam}}"><i class="btn btn-xs fa fa-envelope-o bg-red"></i></a>
              @endif
            </dd>

            <dt>eMail Invio Ordini</dt>
            <dd>{{$client->emailut}}
              @if (!empty($client->emailut))
                  &nbsp;<a href="mailto:{{$client->emailut}}"><i class="btn btn-xs fa fa-envelope-o bg-red"></i></a>
              @endif
            </dd>

            <dt>eMail Invio Bolle</dt>
            <dd>{{$client->emailav}}
              @if (!empty($client->emailav))
                  &nbsp;<a href="mailto:{{$client->emailav}}"><i class="btn btn-xs fa fa-envelope-o bg-red"></i></a>
              @endif
            </dd>

            <dt>eMail Invio Fatture</dt>
            <dd>{{$client->emailpec}}
              @if (!empty($client->emailpec))
                  &nbsp;<a href="mailto:{{$client->emailpec}}"><i class="btn btn-xs fa fa-envelope-o bg-red"></i></a>
              @endif
            </dd>

          </dl>
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-4">
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title">Mappa</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">
        <div style="height: 403px; width: 100%;">
          @if($mapsException=='')
            {!! Mapper::render() !!}
          @else
            {{ $mapsException }}
          @endif
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-4">
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title" data-widget="collapse">Documenti del Cliente</h3>
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

    <div class="box box-default collapsed-box">
      <div class="box-header with-border">
        <h3 class="box-title" data-widget="collapse">Scadenze del Cliente</h3>
        <span class="badge bg-yellow">{{$scads->count()}}</span>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
        </div>
      </div>
      <div class="box-body">
        @include('scads.partials.tblGeneric', $scads)
      </div>
    </div>
  </div>

</div>

<div class="row">

  <div class="col-lg-6">
    @include('client.partials.timeline', [
      'visits' => $visits,
      'codcli' => $client->codice,
      'dateNow' => $dateNow,
      ])
  </div>

  <div class="col-lg-6">
    <div class="box box-default collapsed-box">  {{-- collapsed-box --}}
      <div class="box-header with-border">
        <h3 class="box-title" data-widget="collapse">Annotazioni</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
        </div>
      </div>
      <div class="box-body">
        <strong>{!! $client->note !!}</strong>
      </div>
    </div>

  </div>
</div>

<script type="text/javascript">

    function onMapLoad(map)
    {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                function(position) {
                    var pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };

                    var marker = new google.maps.Marker({
                      position: pos,
                      map: map,
                      label: "#",
                      title: "You Are Here"
                    });

                    // map.setCenter(pos);
                }
            );
        }
    }
</script>

{{-- </div> --}}
@endsection
