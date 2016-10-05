<ul class="timeline">
  <!-- timeline time label -->
  @if (!$visits->isEmpty())
    @php
      $date=null;
      $message=''
    @endphp
    @foreach ($visits as $visit)
      @if ($visit->data != $date)
        <li class="time-label">
          <span class="bg-gray">
            {{ $visit->data->format('d M. Y') }}
            {{-- <a href="{{ route('visit::insert', $codcli) }}"> </a> --}}
            @php
              $date=$visit->data
            @endphp
          </span>
        </li>
      @endif
      <li>
      @switch( $visit->tipo )
          @case( 'Meet' )
              <i class="fa fa-weixin bg-light-blue"></i>
              @php
                $message='Meeting'
              @endphp
          @breakswitch
          @case( 'Mail' )
              <i class="fa fa-envelope bg-orange"></i>
              @php
                $message='Inviata eMail'
              @endphp
          @breakswitch
          @case( 'Prod' )
              <i class="fa fa-cube bg-green"></i>
              @php
                $message='Presentazione Prodotto'
              @endphp
          @breakswitch
          @case( 'Scad' )
              <i class="fa fa-money bg-purple"></i>
              @php
                $message='Pagamento Scadenza'
              @endphp
          @breakswitch
          @case( 'RNC' )
              <i class="fa fa-exclamation-circle bg-red"></i>
              @php
                $message='Non Conformità'
              @endphp
          @breakswitch
          @default
              <i class="fa fa-question-circle bg-yellow"></i>
              @php
                $message='Generico'
              @endphp
          @breakswitch
      @endswitch
        <div class="timeline-item">
          <span class="time"><i class="fa fa-user"></i> {{ $visit->user->name }}</span>

          <h3 class="timeline-header"><strong>{{ $visit->descrizione }}</strong> - <small> {{ $message }} </small></h3>

          <div class="timeline-body">
            {!! $visit->note !!}
          </div>
          <div class="timeline-footer">
            <a class="btn btn-primary btn-xs">Read more</a>
          </div>
        </div>
      </li>
    @endforeach
  @else
    <li class="time-label">
      <span class="bg-gray">
        {{ $dateNow->format('d M. Y') }}
      </span>
    </li>
  @endif
  <li>
    <i class='fa fa-clock-o bg-gray'></i>
    <span class="timeline-item">
      <a class="btn btn-sm btn-default" href="{{ route('visit::insert', $codcli) }}"> <i class="fa fa-plus"></i> <span>Inserisci Evento</span></a>
    </span>
  </li>
</ul>
