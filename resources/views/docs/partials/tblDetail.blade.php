<table class="table table-hover table-condensed dtTbls_total">
  <thead>
    <th>{{ trans('doc.#Row') }}</th>
    <th>{{ trans('doc.codeArt') }}</th>
    <th>{{ trans('doc.descArt') }}</th>
    <th>{{ trans('doc.codeLot') }}</th>
    <th>{{ trans('doc.quantity_condensed') }}</th>
    <th>{{ trans('doc.unitPrice') }}</th>
    <th>{{ trans('doc.discount') }}</th>
    <th>{{ trans('doc.totPrice') }}</th>
  </thead>
  <tfoot>
    <tr>
      <th colspan="6" style="text-align:right">{{ trans('doc.totMerce') }}:</th>
      <th></th>
      <th></th>
    </tr>
  </tfoot>
  <tbody>
    @foreach ($rows as $row)
      @if($head->tipomodulo!='O')
        <tr>
          <td>{{ $row->numeroriga }}</td>
          <td><a href="#"> {{ $row->codicearti }} </a></td>
          <td>{{ $row->descrizion }}</td>
          <td>{{ $row->lotto }}</td>
          <td>{{ $row->quantita }}</td>
          <td>{{ $row->prezzoun }}</td>
          <td>{{ $row->sconti }}</td>
          <td>{{ $row->prezzotot }}</td>
        </tr>
      @elseif($head->tipomodulo=='O' && $row->rifstato!='X')
        <tr>
          <td>{{ $row->numeroriga }}</td>
          <td><a href="#"> {{ $row->codicearti }} </a></td>
          <td>{{ $row->descrizion }}</td>
          <td>{{ $row->lotto }}</td>
          <td>{{ $row->quantita }}</td>
          <td>{{ $row->prezzoun }}</td>
          <td>{{ $row->sconti }}</td>
          <td>{{ $row->prezzotot }}</td>
        </tr>
      @endif
    @endforeach
  </tbody>
</table>
