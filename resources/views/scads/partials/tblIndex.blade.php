<table class="table table-hover table-condensed dtTbls_light">
  <thead>
    <th>Data Scad.</th>
    <th>Num. Fatt.</th>
    <th>Data Fatt.</th>
    <th>Cliente</th>
    <th>Accorpata?</th>
    <th>Stato</th>
    <th>Tipo Pag.</th>
    <th>Importo Scad.</th>
    <th>Importo Pagato</th>
  </thead>
  <tbody>
    @if($scads->count()>0)
      @foreach ($scads as $scad)
        @if(($scad->insoluto==1 || $scad->u_insoluto==1) && $scad->pagato==0)
        <tr class="danger">
        @elseif($scad->datascad < \Carbon\Carbon::now() && $scad->pagato==0)
        <tr class="warning">
        @else
        <tr>
        @endif
          <td>
            <span>{{$scad->datascad->format('Ymd')}}</span>
            <a href="{{ route('scad::detail', $scad->id ) }}"> {{ $scad->datascad->format('d-m-Y') }}</a>
          </td>
          <td>
            <a href="{{ route('doc::detail', $scad->id_doc ) }}">
              {{ $scad->tipomod }} {{ $scad->numfatt }}
            </a>
          </td>
          <td><span>{{$scad->datafatt->format('Ymd')}}</span>{{ $scad->datafatt->format('d-m-Y') }}</td>
          <td>
            @if($scad->client)
              <a href="{{ route('client::detail', $scad->codcf ) }}">
                {{ $scad->client->descrizion }} [{{$scad->codcf}}]
              </a>
            @endif
          </td>
          <td>
            @if($scad->idragg>0)
              <a href="{{ route('scad::detail', $scad->idragg ) }}"> Accorpata</a>
            @endif
          </td>
          <td>
            @if($scad->pagato==1)
              Pagato
            @elseif($scad->insoluto==1)
              Insoluto
            @elseif($scad->u_insoluto==1)
              Moroso
            @else
              Non Pagato
            @endif
          </td>

          <td>{{ $scad->tipo }}</td>
          <td>{{ $scad->impeffval }}</td>
          <td>{{ $scad->importopag }}</td>
        </tr>
      @endforeach
    @endif
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