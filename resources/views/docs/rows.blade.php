@extends('layouts.app')

@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                  Elenco Righe
                </div>
                <div class="panel-body">
                  <table class="table table-hover table-condensed">
                    <thead>
                      <th>Numero Riga</th>
                      <th>Codice Articolo</th>
                      <th>Descrizione</th>
                      <th>Qta</th>
                      <th>Qta Residua</th>
                      <th>Prezzo Un.</th>
                      <th>Sconto</th>
                      <th>Prezzo Tot</th>
                    </thead>
                    <tbody>
                      @foreach ($rows as $row)
                        <tr>
                          <td>
                            <a href="#"> {{ $row->numeroriga }}</a>
                          </td>
                          <td>{{ $row->codicearti }}</td>
                          <td>{{ $row->descrizion }}</td>
                          <td>{{ $row->quantita }}</td>
                          <td>{{ $row->quantitare }}</td>
                          <td>{{ $row->prezzoun }}</td>
                          <td>{{ $row->sconti }}</td>
                          <td>{{ $row->prezzotot }}</td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
