@extends('layouts.app')

@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Anagrafica Clienti</div>
                <div class="panel-body">
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
</div>
@endsection
