<table class="table table-hover table-condensed dtTbls_full" id="listDocs">
  <thead>
    <th>Gruppo</th>
    <th>Gennaio</th>
    <th>Febbraio</th>
    <th>Marzo</th>
    <th>Aprile</th>
    <th>Maggio</th>
    <th>Giugno</th>
    <th>Luglio</th>
    <th>Agosto</th>
    <th>Settembre</th>
    <th>Ottobre</th>
    <th>Novembre</th>
    <th>Dicembre</th>
    <th>TOTALE</th>
  </thead>
  <tbody>
    @foreach ($fatturato as $fat)
      <tr>
        <td>{{ $fat->grpProd->codice }} - {{ $fat->grpProd->descrizion }}</td>
        <td>{{ $fat->valore1 }}</td>
        <td>{{ $fat->valore2 }}</td>
        <td>{{ $fat->valore3 }}</td>
        <td>{{ $fat->valore4 }}</td>
        <td>{{ $fat->valore5 }}</td>
        <td>{{ $fat->valore6 }}</td>
        <td>{{ $fat->valore7 }}</td>
        <td>{{ $fat->valore8 }}</td>
        <td>{{ $fat->valore9 }}</td>
        <td>{{ $fat->valore10 }}</td>
        <td>{{ $fat->valore11 }}</td>
        <td>{{ $fat->valore12 }}</td>
        <td>{{ $fat->valore }}</td>
      </tr>
    @endforeach
  </tbody>
</table>
