<table class="table table-hover table-condensed dtTbls_total">
  <thead>
    <th># Riga</th>
    <th>Codice Articolo</th>
    <th>Descrizione</th>
    <th>Qta</th>
    <th>Prezzo Un.</th>
    <th>Sconto</th>
    <th>Prezzo Tot</th>
  </thead>
  <tfoot>
    <tr>
      <th colspan="6" style="text-align:right">Totale:</th>
      <th></th>
    </tr>
  </tfoot>
  <tbody>
    @foreach ($rows as $row)
      <tr>
        <td>{{ $row->numeroriga }}</td>
        <td><a href="#"> {{ $row->codicearti }} </a></td>
        <td>{{ $row->descrizion }}</td>
        <td>{{ $row->quantita }}</td>
        <td>{{ $row->prezzoun }}</td>
        <td>{{ $row->sconti }}</td>
        <td>{{ $row->prezzotot }}</td>
      </tr>
    @endforeach
  </tbody>
</table>
