@extends('layouts.app')

@section('htmlheader_title')
    Anagrafica Clienti
@endsection

@section('contentheader_title')
    Anagrafica Clienti
@endsection

@section('main-content')
  <div class="row">

    <div class="col-lg-5">

      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Filtro</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            {{-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button> --}}
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <form action="{{ url('/client/filter') }}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="form-group">
                <label>Ragione Sociale</label>
                <div class="input-group">
                  <span class="input-group-btn">
                      <select type="button" class="btn btn-warning dropdown-toggle" name="ragsocOp">
                        <option value="eql">=</option>
                        <option value="stw">[]...</option>
                        <option value="cnt">...[]...</option>
                      </select>
                  </span>
                  <input type="text" class="form-control" name="ragsoc">
                </div>
              </div>

                <div class="form-group">
                  <label>Settore</label>
                  <select name="settore[]" class="form-control select2" multiple="multiple" data-placeholder="Seleziona Settore" style="width: 100%;">
                    <option value="IND">Industria</option>
                    <option value="FER">Ferramenta</option>
                    <option value="FAL">Falegnameria</option>
                    <option value="RIV">Rivenditore</option>
                    <option value="MOB">Industrie del Mobile</option>
                    <option value="PRO">Produttori</option>
                    <option value="SER">Serramenti</option>
                  </select>
                </div>

                <div class="form-group">
                  <label>Nazione</label>
                  <select name="nazione" class="form-control select2" multiple="multiple" data-placeholder="Seleziona Settore" style="width: 100%;">
                    <option value="IND">Industria</option>
                    <option value="FER">Ferramenta</option>
                    <option value="FAL">Falegnameria</option>
                    <option value="RIV">Rivenditore</option>
                    <option value="MOB">Industrie del Mobile</option>
                    <option value="PRO">Produttori</option>
                    <option value="SER">Serramenti</option>
                  </select>
                </div>

                <div class="form-group">
                  <label>Gruppo Cliente</label>
                  <select name="grpCli" class="form-control select2" multiple="multiple" data-placeholder="Seleziona Settore" style="width: 100%;">
                    <option value="IND">Industria</option>
                    <option value="FER">Ferramenta</option>
                    <option value="FAL">Falegnameria</option>
                    <option value="RIV">Rivenditore</option>
                    <option value="MOB">Industrie del Mobile</option>
                    <option value="PRO">Produttori</option>
                    <option value="SER">Serramenti</option>
                  </select>
                </div>
{{--
                <div class="form-group">
                  <label>Date range button:</label>
                  <div class="input-group">
                    <button type="button" class="btn btn-default pull-right daterange-btn" id="">
                      <span>
                        <i class="fa fa-calendar"></i> Date range picker
                      </span>
                      <i class="fa fa-caret-down"></i>
                    </button>
                  </div>
                </div> --}}

                <div class="form-group">
                  <label>Stato Cliente</label>
                  <div class="radio">
                    <label>
                      <input type="radio" name="optStatocf" id="opt1" value="T" checked>Attivo
                    </label>
                    <label>
                      <input type="radio" name="optStatocf" id="opt2" value="I">Insoluto
                    </label>
                    <label>
                      <input type="radio" name="optStatocf" id="opt3" value="M">Moroso
                    </label>
                    <label>
                      <input type="radio" name="optStatocf" id="opt4" value="C">Chiuso
                    </label>
                    <label>
                      <input type="radio" name="optStatocf" id="opt5" value="">TUTTI
                    </label>
                  </div>
                </div>

                <div>
                    <button type="submit" class="btn btn-primary">{{ trans('adminlte_lang::message.submit') }}</button>
                </div><!-- /.col -->

            </div>
          </div>
      </div>

      <div class="col-lg-7">
          <div class="box box-default">
              <div class="box-header with-border">
                <h3 class="box-title">Lista Clienti</h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
              </div>
              <div class="box-body">
                <table class="table table-hover table-condensed">
                  <thead>
                    <th>Codice</th>
                    <th>Rag. Sociale</th>
                    <th>Nazione</th>
                    <th>Località</th>
                    <th>Settore</th>
                    <th>Cod. Agente</th>
                    <th>Link Documenti</th>
                  </thead>
                  <tbody>
                    @foreach ($clients as $client)
                      <tr>
                        <td>
                          <a href="{{ url('client/'.$client->codice ) }}"> {{ $client->codice }}</a>
                        </td>
                        <td>{{ $client->descrizion }}</td>
                        <td>{{ $client->codnazione }}</td>
                        <td>{{ $client->localita }}</td>
                        <td>{{ $client->settore }}</td>
                        <td>{{ $client->agente }}</td>
                        <td><a href="{{ url('client/'.$client->codice.'/doc') }}">Documenti</a></td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>

                {!! $clients->render() !!}
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
