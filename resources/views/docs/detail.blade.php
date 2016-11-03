@extends('layouts.app')

@section('htmlheader_title')
    - {{$head->tipodoc}} {{$head->numerodoc}}
@endsection

@section('contentheader_title')
    {{$head->tipodoc}} {{$head->numerodoc}}
@endsection

@section('contentheader_description')
    {{-- di {{$head->client->descrizion}} [{{$head->codicecf}}] --}}
    del {{$head->datadoc->format('d/m/Y')}}
@endsection

@section('contentheader_breadcrumb')
    {!! Breadcrumbs::render('docsDetail', $head) !!}
@endsection

@section('main-content')
<div class="row">
  <div class="col-lg-5">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#DatiDoc" data-toggle="tab" aria-expanded="true">Dati Documento</a></li>
        <li class=""><a href="#Sped" data-toggle="tab" aria-expanded="false">Dati Spedizione</a></li>
        <li class=""><a href="#Val" data-toggle="tab" aria-expanded="false">Totali Documento</a></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="DatiDoc">
          <dl class="dl-horizontal">
            <dt>Documento</dt>
            <dd>{{$head->tipodoc}} {{$head->numerodoc}}</dd>

            <dt>Cliente</dt>
            <dd><strong>{{$head->client->descrizion}} [{{$head->codicecf}}]</strong></dd>

            <dt>Data Documento</dt>
            <dd>{{$head->datadoc->format('d/m/Y')}}</dd>

            @if($head->tipomodulo == 'O')
              <dt>Tipologia di Consegna</dt>
              <dd>{{$head->u_tipocons}}</dd>

              {{-- <dt>Prevista Consegna</dt>
              <dd>{{$head->datacons->format('d/m/Y')}}</dd> --}}
            @endif

            <dt>Riferimento Doc.</dt>
            <dd>{{$head->numerodocf}}</dd>

            <hr>

            <dt>Tot. Documento</dt>
            <dd><strong>{{$head->totdoc}} €</strong></dd>

            @if($head->tipomodulo == 'F' || $head->tipomodulo == 'N')
              <br>

              @if($head->scontocass)
              <dt>Sconto Cassa</dt>
              <dd>{{$head->scontocass}} %</dd>
              @endif

              <dt>Totale a Pagare</dt>
              <dd>{{$head->totdoc}} €</dd>
            @endif
          </dl>
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="Sped">
          @if($head->tipomodulo == 'B' || $head->tipodoc == 'BV' || $head->tipodo == 'EQ')
          <dl class="dl-horizontal">
            <dt>N° Colli</dt>
            <dd>{{$head->colli}}</dd>

            <dt>Aspetto dei Beni</dt>
            <dd>@if($head->detBeni) {{$head->detBeni->descrizion}} @endif</strong></dd>

            <dt>Volume</dt>
            <dd>{{$head->volume}} mc</dd>

            <dt>Peso Netto</dt>
            <dd>{{$head->pesonetto}} Kg</dd>

            <dt>Peso Lordo</dt>
            <dd>{{$head->pesolordo}} Kg</dd>

            <hr>

            <dt>Vettore</dt>
            <dd>@if($head->vettore) {{$head->vettore->descrizion}} @endif</dd>

            <dt>Partenza Vettore</dt>
            <dd>@if($head->v1data) {{$head->v1data->format('d/m/Y')}} - {{$head->v1ora}} @else -- @endif</dd>

            <br>
            @if($destinaz)
            <dt>Destinazione Merce</dt>
            <dd>{{$destinaz->ragionesoc}}</dd>
            <dd>{{$destinaz->cap}}, {{$destinaz->localita}} ({{$destinaz->pv}}) - {{$destinaz->u_nazione}}</dd>
            <dd>{{$destinaz->indirizzo}}</dd>
            <dd>{{$destinaz->telefono}}</dd>
            @endif

            <hr>
            @if (empty($ddtOk))
              @include('docs.partials.mdlFormDdtOk', ['head' => $head])
            @else
              <dt>Data Conferma Ricezione</dt>
              <dd>{{$ddtOk->created_at->format('d/m/Y')}}</dd>

              <dt>Firma Ricezione</dt>
              <dd>{{$ddtOk->firma}}</dd>

              <dt>Note</dt>
              <dd>{{$ddtOk->note or ''}}</dd>
            @endif
          @else
            <div class="callout callout-danger">
              <p>Visualizzabile solo nei Documenti di tipo Bolle!</p>
            </div>
          </dl>
          @endif
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="Val">
          <dl class="dl-horizontal">
            @if($head->sconti)
            <dt>Sconto Merce</dt>
            <dd>{{$head->sconti}} %</dd>
            @endif

            <br>

            <dt>Tot. Merce</dt>
            <dd>{{$head->totmerce}} €</dd>

            <dt>Spese Trasporto</dt>
            <dd>{{$head->speseim + $head->spesetr}} €</dd>

            <br>

            <dt>Tot. Imponibile</dt>
            <dd>{{$head->totimp}} €</dd>

            <dt>Tot. IVA</dt>
            <dd>{{$head->totiva}} €</dd>

            <hr>

            <dt>Tot. Documento</dt>
            <dd><strong>{{$head->totdoc}} €</strong></dd>

            @if($head->tipomodulo == 'F' || $head->tipomodulo == 'N')
              <br>

              @if($head->scontocass)
              <dt>Sconto Cassa</dt>
              <dd>{{$head->scontocass}} %</dd>
              @endif

              <dt>Totale a Pagare</dt>
              <dd>{{$head->totdoc}} €</dd>
            @endif
          </dl>
        </div>
        <!-- /.tab-pane -->
      </div>
      <!-- /.tab-content -->
    </div>

    @if($head->tipomodulo == 'F')
      <div class="box box-warning">
        <div class="box-header with-border">
          <h3 class="box-title" data-widget="collapse">Scadenze</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          @if(!empty($head->scadenza))
            <h4>Scadenza Associata</h4>
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
                    @if($head->scadenza->insoluto==1 || $head->scadenza->u_insoluto==1)
                    <tr class="danger">
                    @elseif($head->scadenza->datascad < \Carbon\Carbon::now())
                    <tr class="warning">
                    @else
                    <tr>
                    @endif
                      <td>
                        <span>{{$head->scadenza->datascad->format('Ymd')}}</span>
                        <a href=""> {{ $head->scadenza->datascad->format('d-m-Y') }}</a>
                      </td>
                      <td>{{ $head->scadenza->numfatt }}</td>
                      <td><span>{{$head->scadenza->datafatt->format('Ymd')}}</span>{{ $head->scadenza->datafatt->format('d-m-Y') }}</td>
                      <td>@if($head->scadenza->idragg>0)
                        <a href=""> Accorpata</a>
                      @endif</td>
                      <td>{{ $head->scadenza->impeffval }}</td>
                      <td>{{ $head->scadenza->importopag }}</td>
                    </tr>
              </tbody>
            </table>
          @endif
        </div>
      </div>
    @endif

    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title" data-widget="collapse">Documenti Collegati</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">
        @if($prevDocs->count()>0)
          <h4>Documenti Prelevati</h4>
            @foreach($prevDocs as $doc)
              <a type="button" class="btn btn-default btn-block" href="{{ route('doc::detail', $doc->id) }}">
                <strong>{{$doc->tipodoc}} {{$doc->numerodoc}} del {{$doc->datadoc->format('d/m/Y')}}</strong>
              </a>
            @endforeach
        @endif
        <hr>
        @if($nextDocs->count()>0)
          <h4>Documenti Successivi</h4>
            @foreach($nextDocs as $doc)
              <a type="button" class="btn btn-primary btn-block" href="{{ route('doc::detail', $doc->id) }}">
                <strong>{{$doc->tipodoc}} {{$doc->numerodoc}} del {{$doc->datadoc->format('d/m/Y')}}</strong>
              </a>
            @endforeach
        @endif
      </div>
    </div>
  </div>

  <div class="col-lg-7">
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title" data-widget="collapse">Elenco Righe</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">
        @include('docs.partials.tblDetail', [$rows, $head])
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
