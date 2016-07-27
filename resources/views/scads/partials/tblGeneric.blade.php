<table class="table table-hover table-condensed dtTbls_light">
  <thead>
    <th>Data Scad.</th>
    <th>Num. Fatt.</th>
    <th>Data Fatt.</th>
    <th>Accorpata?</th>
    <th>Importo Scad.</th>
    <th>Importo Pagato</th>
  </thead>
  <tbody>
    @if($scads->count()>0)
      @foreach ($scads as $scad)
        @if($scad->insoluto==1 || $scad->u_insoluto==1)
        <tr class="danger">
        @elseif($scad->datascad < \Carbon\Carbon::now())
        <tr class="warning">
        @else
        <tr>
        @endif
          <td>
            <span>{{$scad->datascad->format('Ymd')}}</span>
            <a href="{{ route('client::detail', $scad->id ) }}"> {{ $scad->datascad->format('d-m-Y') }}</a>
          </td>
          <td>
            <a href="{{ route('doc::detail', $scad->id_doc ) }}">
              {{ $scad->tipomod }} {{ $scad->numfatt }}
            </a>
          </td>
          <td><span>{{$scad->datafatt->format('Ymd')}}</span>{{ $scad->datafatt->format('d-m-Y') }}</td>
          <td>@if($scad->idragg>0)
            <a href=""> Accorpata</a>
          @endif</td>
          <td>{{ $scad->impeffval }}</td>
          <td>{{ $scad->importopag }}</td>
        </tr>        
      @endforeach
    @endif
  </tbody>
</table>
