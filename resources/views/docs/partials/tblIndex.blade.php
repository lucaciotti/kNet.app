<table class="table table-hover table-condensed dtTbls_full" id="listDocs">
  <thead>
    <th>{{ trans('doc.typeDoc') }}</th>
    <th>{{ trans('doc.#Doc') }}</th>
    <th>{{ trans('doc.dateDoc_condensed') }}</th>
    <th>{{ trans('doc.client') }}</th>
    <th>{{ trans('doc.referenceDoc_condensed') }}</th>
    <th>{{ trans('doc.totDoc_condensed') }}</th>
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
