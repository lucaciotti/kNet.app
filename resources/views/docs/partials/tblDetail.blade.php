<table class="table table-hover table-condensed dtTbls_total">
  <thead>
    <th>{{ trans('doc.#Row') }}</th>
    <th>{{ trans('doc.codeArt') }}</th>
    <th>{{ trans('doc.descArt') }}</th>
    @if($head->tipomodulo!='O')
      <th>{{ trans('doc.codeLot') }}</th>
      <th>{{ trans('doc.quantity_condensed') }}</th>
      <th>{{ trans('doc.unitPrice') }}</th>
      <th>{{ trans('doc.discount') }}</th>
    @elseif($head->tipomodulo=='O')
      <th>{{ trans('doc.quantity_condensed') }}</th>
      <th>{{ trans('doc.quantity_residual') }}</th>
      <th>{{ trans('doc.dateDispach_condensed') }}</th>
      <th>&nbsp</th>
    @endif
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
          <td><a href="#"> {{ $row->codicearti }} </a>
            {{-- &nbsp
            @if($row->u_dtpronto)
              <a href="#" data-toggle="popover" title="Dispach Date" data-content="{{ $row->u_dtpronto->format('d-m-Y') }}">
                <i class="fa fa-info-circle"> </i>
              </a>
            @endif --}}
          </td>
          <td>{{ $row->descrizion }}</td>
          <td>{{ $row->quantita }}</td>
          <td>
            @if($row->quantitare>0)
              {{ $row->quantitare }}
            @else
              -
            @endif
          </td>
          <td>
            @if($row->u_dtpronto)
              {{ $row->u_dtpronto->format('d-m-Y') }}
            @else
              {{ $row->dataconseg->format('d-m-Y') }}
            @endif
          </td>
          <td>
            <a href="#" data-toggle="popover" title="{{ trans('doc.unitPrice') }} [{{ trans('doc.discount') }}]"
            data-content="{{ $row->prezzoun }} [{{ $row->sconti }}]" data-placement="top">
              <i class="fa fa-info-circle"> </i>
            </a>
          </td>
          <td>{{ $row->prezzotot }}</td>
        </tr>
      @endif
    @endforeach
  </tbody>
</table>
