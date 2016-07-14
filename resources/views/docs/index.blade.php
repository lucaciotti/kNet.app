@extends('layouts.app')

@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                  Lista Documenti
                </div>
                <div class="panel-body">
                  <table class="table table-hover table-condensed">
                    <thead>
                      <th>Tipo Documento</th>
                      <th>Numero Documento</th>
                      <th>Data Documento</th>
                      <th>Codice Cliente</th>
                      <th>Rif. Doc.</th>
                      <th>Tot. Doc. €</th>
                    </thead>
                    <tbody>
                      @foreach ($docs as $doc)
                        @if($doc->numrighepr==0)
                          <tr class="warning">
                        @else
                          <tr>
                        @endif
                          <td>
                            <a href="{{ url('docrows/'.$doc->id) }}"> {{ $doc->tipodoc }}</a>
                          </td>
                          <td>{{ $doc->numerodoc }}</td>
                          <td>{{ $doc->datadoc->format('d-m-Y') }}</td>
                          <td>{{ $doc->codicecf }}</td>
                          <td>{{ $doc->numerodocf }}</td>
                          <td>{{ $doc->totdoc }}</td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>

                  {!! $docs->render() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
