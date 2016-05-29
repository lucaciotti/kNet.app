@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">{{$client->codice}} - {{$client->descrizion}}</div>
                <div class="panel-body">
                  <dl class="dl-horizontal">
                    <dt>Codice Cliente</dt>
                    <dd>{{$client->codice}}</dd>

                    <dt>Ragione Sociale</dt>
                    <dd>{{$client->descrizion}} {{$client->supragsoc}}</dd>

                    <dt>Partita Iva</dt>
                    <dd>{{$client->partiva}}</dd>

                    @if($client->codfiscale != $client->partiva)
                      <dt>Codice Fiscale</dt>
                      <dd>{{$client->codfiscale}}</dd>
                    @endif

                    <dt>Telefono</dt>
                    <dd>{{$client->telefono}}</dd>

                    <dt>Email</dt>
                    <dd>{{$client->email}}</dd>

                    <dt>Località</dt>
                    <dd>{{$client->localita}} ({{$client->prov}}) - {{$client->codnazione}}</dd>

                    <dt>CAP</dt>
                    <dd>{{$client->cap}}</dd>

                    <dt>Zona</dt>
                    <dd>{{$client->zona}}</dd>

                    <dt>Settore</dt>
                    <dd>{{$client->settore}}</dd>

                    <dt>Stato Cliente</dt>
                    <dd>{{$client->statocf}}</dd>

                    <dt>Fido Accordato</dt>
                    <dd>{{$client->fido}} €</dd>

                    <dt>Data Inizio Rapporto</dt>
                    <dd>{{$client->u_dataini}}</dd>

                    <dt>Data Fine Rapporto</dt>
                    <dd>{{$client->u_datafine}}</dd>


                    <dt>Note</dt>
                    <dd>{!! $client->note !!}</dd>
                  </dl>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
