<table class="table table-hover table-condensed dtTbls_full" id="listDocs">
  <thead>
    <th>Tipo Doc.</th>
    <th># Doc.</th>
    <th>Data Doc.</th>
    <th>Cliente</th>
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
        <td>{{ $doc->tipodoc }}</td>
        <td>
          <a href="{{ route('doc::detail', $doc->id) }}"> {{ $doc->numerodoc }} </a>
        </td>
        <td><span>{{$doc->datadoc->format('Ymd')}}</span>{{ $doc->datadoc->format('d-m-Y') }}</td>
        <td>{{ $doc->client->descrizion }} [{{ $doc->codicecf }}]</td>
        <td>{{ $doc->numerodocf }}</td>
        <td>{{ $doc->totdoc }}</td>
      </tr>
    @endforeach
  </tbody>
</table>
{{--
@push('scripts')
    <script>
    $(document).ready(function() {
      $('#listDocs').DataTable( {
          "order": [[ 3, "desc" ]]
      } );
    } );
    </script>
@endpush --}}
