<table class="table table-hover table-striped" id="statFattTot" style="text-align: center;">
  <col width="80">
  <col width="50">
  <col width="50">
  <col width="50">
  <col width="50">
  <col width="50">
  <col width="50">
  <thead>
    <tr>
      <th rowspan="2">&nbsp;</th>
      <th colspan="3" style="text-align: center;">Mese</th>
      <th colspan="3" style="text-align: center;">Progressivo</th>
    </tr>
    <tr>
      <th style="text-align: center;">FATTURATO</th>
      <th style="text-align: center;">TARGET</th>
      <th style="text-align: center;">% Mancante</th>

      <th style="text-align: center;">FATTURATO</th>
      <th style="text-align: center;">TARGET</th>
      <th style="text-align: center;">% Mancante</th>
    </tr>
  </thead>
  <tbody>
    @php
      $fat = $fatturato->first();
      $tgt = $target->first();
      $fatMese = empty($fat) ? 0 : $fat->valore1;
      $tgtMese = empty($tgt) ? 0 : $tgt->valore1;
      $fatProg = $fatMese;
      $tgtProg = $tgtMese;
      $deltaMese = $tgtMese==0 ? 0 : round((($tgtMese-$fatMese) / $tgtMese) * 100,2);
      $deltaProg = $tgtProg==0 ? 0 : round((($tgtProg-$fatProg) / $tgtProg) * 100,2);
    @endphp
    <tr>
      <th>Gennaio
        @if ($prevMonth==1)
          &nbsp; >>
        @endif
      </th>
      <td><strong>{{ currency($fatMese) }}</strong></td>
      <td>{{ currency($tgtMese) }}</td>
      <td><strong>{{ $deltaMese }} %</strong></td>
      <td><strong>{{ currency($fatProg) }}</strong></td>
      <td>{{ currency($tgtProg) }}</td>
      <td><strong>{{ $deltaProg }} %</strong></td>
    </tr>
    @php
      $fatMese = empty($fat) ? 0 : $fat->valore2;
      $tgtMese = empty($tgt) ? 0 : $tgt->valore2 - $tgtProg;
      $fatProg += $fatMese;
      $tgtProg += $tgtMese;
      $deltaMese = $tgtMese==0 ? 0 : round((($tgtMese-$fatMese) / $tgtMese) * 100,2);
      $deltaProg = $tgtProg==0 ? 0 : round((($tgtProg-$fatProg) / $tgtProg) * 100,2);
    @endphp
    <tr>
      <th>Febbraio
        @if ($prevMonth==2)
          &nbsp; >>
        @endif
      </th>
      <td><strong>{{ currency($fatMese) }}</strong></td>
      <td>{{ currency($tgtMese) }}</td>
      <td><strong>{{ $deltaMese }} %</strong></td>
      <td><strong>{{ currency($fatProg) }}</strong></td>
      <td>{{ currency($tgtProg) }}</td>
      <td><strong>{{ $deltaProg }} %</strong></td>
    </tr>
    @php
      $fatMese = empty($fat) ? 0 : $fat->valore3;
      $tgtMese = empty($tgt) ? 0 : $tgt->valore3 - $tgtProg;
      $fatProg += $fatMese;
      $tgtProg += $tgtMese;
      $deltaMese = $tgtMese==0 ? 0 : round((($tgtMese-$fatMese) / $tgtMese) * 100,2);
      $deltaProg = $tgtProg==0 ? 0 : round((($tgtProg-$fatProg) / $tgtProg) * 100,2);
    @endphp
    <tr>
      <th>Marzo
        @if ($prevMonth==3)
          &nbsp; >>
        @endif
      </th>
      <td><strong>{{ currency($fatMese) }}</strong></td>
      <td>{{ currency($tgtMese) }}</td>
      <td><strong>{{ $deltaMese }} %</strong></td>
      <td><strong>{{ currency($fatProg) }}</strong></td>
      <td>{{ currency($tgtProg) }}</td>
      <td><strong>{{ $deltaProg }} %</strong></td>
    </tr>
    @php
      $fatMese = empty($fat) ? 0 : $fat->valore4;
      $tgtMese = empty($tgt) ? 0 : $tgt->valore4 - $tgtProg;
      $fatProg += $fatMese;
      $tgtProg += $tgtMese;
      $deltaMese = $tgtMese==0 ? 0 : round((($tgtMese-$fatMese) / $tgtMese) * 100,2);
      $deltaProg = $tgtProg==0 ? 0 : round((($tgtProg-$fatProg) / $tgtProg) * 100,2);
    @endphp
    <tr>
      <th>Aprile
        @if ($prevMonth==4)
          &nbsp; >>
        @endif
      </th>
      <td><strong>{{ currency($fatMese) }}</strong></td>
      <td>{{ currency($tgtMese) }}</td>
      <td><strong>{{ $deltaMese }} %</strong></td>
      <td><strong>{{ currency($fatProg) }}</strong></td>
      <td>{{ currency($tgtProg) }}</td>
      <td><strong>{{ $deltaProg }} %</strong></td>
    </tr>
    @php
      $fatMese = empty($fat) ? 0 : $fat->valore5;
      $tgtMese = empty($tgt) ? 0 : $tgt->valore5 - $tgtProg;
      $fatProg += $fatMese;
      $tgtProg += $tgtMese;
      $deltaMese = $tgtMese==0 ? 0 : round((($tgtMese-$fatMese) / $tgtMese) * 100,2);
      $deltaProg = $tgtProg==0 ? 0 : round((($tgtProg-$fatProg) / $tgtProg) * 100,2);
    @endphp
    <tr>
      <th>Maggio
        @if ($prevMonth==5)
          &nbsp; >>
        @endif
      </th>
      <td><strong>{{ currency($fatMese) }}</strong></td>
      <td>{{ currency($tgtMese) }}</td>
      <td><strong>{{ $deltaMese }} %</strong></td>
      <td><strong>{{ currency($fatProg) }}</strong></td>
      <td>{{ currency($tgtProg) }}</td>
      <td><strong>{{ $deltaProg }} %</strong></td>
    </tr>
    @php
      $fatMese = empty($fat) ? 0 : $fat->valore6;
      $tgtMese = empty($tgt) ? 0 : $tgt->valore6 - $tgtProg;
      $fatProg += $fatMese;
      $tgtProg += $tgtMese;
      $deltaMese = $tgtMese==0 ? 0 : round((($tgtMese-$fatMese) / $tgtMese) * 100,2);
      $deltaProg = $tgtProg==0 ? 0 : round((($tgtProg-$fatProg) / $tgtProg) * 100,2);
    @endphp
    <tr>
      <th>Giugno
        @if ($prevMonth==6)
          &nbsp; >>
        @endif
      </th>
      <td><strong>{{ currency($fatMese) }}</strong></td>
      <td>{{ currency($tgtMese) }}</td>
      <td><strong>{{ $deltaMese }} %</strong></td>
      <td><strong>{{ currency($fatProg) }}</strong></td>
      <td>{{ currency($tgtProg) }}</td>
      <td><strong>{{ $deltaProg }} %</strong></td>
    </tr>
    @php
      $fatMese = empty($fat) ? 0 : $fat->valore7;
      $tgtMese = empty($tgt) ? 0 : $tgt->valore7 - $tgtProg;
      $fatProg += $fatMese;
      $tgtProg += $tgtMese;
      $deltaMese = $tgtMese==0 ? 0 : round((($tgtMese-$fatMese) / $tgtMese) * 100,2);
      $deltaProg = $tgtProg==0 ? 0 : round((($tgtProg-$fatProg) / $tgtProg) * 100,2);
    @endphp
    <tr>
      <th>Luglio
        @if ($prevMonth==7)
          &nbsp; >>
        @endif
      </th>
      <td><strong>{{ currency($fatMese) }}</strong></td>
      <td>{{ currency($tgtMese) }}</td>
      <td><strong>{{ $deltaMese }} %</strong></td>
      <td><strong>{{ currency($fatProg) }}</strong></td>
      <td>{{ currency($tgtProg) }}</td>
      <td><strong>{{ $deltaProg }} %</strong></td>
    </tr>
    @php
      $fatMese = empty($fat) ? 0 : $fat->valore8;
      $tgtMese = empty($tgt) ? 0 : $tgt->valore8 - $tgtProg;
      $fatProg += $fatMese;
      $tgtProg += $tgtMese;
      $deltaMese = $tgtMese==0 ? 0 : round((($tgtMese-$fatMese) / $tgtMese) * 100,2);
      $deltaProg = $tgtProg==0 ? 0 : round((($tgtProg-$fatProg) / $tgtProg) * 100,2);
    @endphp
    <tr>
      <th>Agosto
        @if ($prevMonth==8)
          &nbsp; >>
        @endif
      </th>
      <td><strong>{{ currency($fatMese) }}</strong></td>
      <td>{{ currency($tgtMese) }}</td>
      <td><strong>{{ $deltaMese }} %</strong></td>
      <td><strong>{{ currency($fatProg) }}</strong></td>
      <td>{{ currency($tgtProg) }}</td>
      <td><strong>{{ $deltaProg }} %</strong></td>
    </tr>
    @php
      $fatMese = empty($fat) ? 0 : $fat->valore9;
      $tgtMese = empty($tgt) ? 0 : $tgt->valore9 - $tgtProg;
      $fatProg += $fatMese;
      $tgtProg += $tgtMese;
      $deltaMese = $tgtMese==0 ? 0 : round((($tgtMese-$fatMese) / $tgtMese) * 100,2);
      $deltaProg = $tgtProg==0 ? 0 : round((($tgtProg-$fatProg) / $tgtProg) * 100,2);
    @endphp
    <tr>
      <th>Settembre
        @if ($prevMonth==9)
          &nbsp; >>
        @endif
      </th>
      <td><strong>{{ currency($fatMese) }}</strong></td>
      <td>{{ currency($tgtMese) }}</td>
      <td><strong>{{ $deltaMese }} %</strong></td>
      <td><strong>{{ currency($fatProg) }}</strong></td>
      <td>{{ currency($tgtProg) }}</td>
      <td><strong>{{ $deltaProg }} %</strong></td>
    </tr>
    @php
      $fatMese = empty($fat) ? 0 : $fat->valore10;
      $tgtMese = empty($tgt) ? 0 : $tgt->valore10 - $tgtProg;
      $fatProg += $fatMese;
      $tgtProg += $tgtMese;
      $deltaMese = $tgtMese==0 ? 0 : round((($tgtMese-$fatMese) / $tgtMese) * 100,2);
      $deltaProg = $tgtProg==0 ? 0 : round((($tgtProg-$fatProg) / $tgtProg) * 100,2);
    @endphp
    <tr>
      <th>Ottobre
        @if ($prevMonth==10)
          &nbsp; >>
        @endif
      </th>
      <td><strong>{{ currency($fatMese) }}</strong></td>
      <td>{{ currency($tgtMese) }}</td>
      <td><strong>{{ $deltaMese }} %</strong></td>
      <td><strong>{{ currency($fatProg) }}</strong></td>
      <td>{{ currency($tgtProg) }}</td>
      <td><strong>{{ $deltaProg }} %</strong></td>
    </tr>
    @php
      $fatMese = empty($fat) ? 0 : $fat->valore11;
      $tgtMese = empty($tgt) ? 0 : $tgt->valore11 - $tgtProg;
      $fatProg += $fatMese;
      $tgtProg += $tgtMese;
      $deltaMese = $tgtMese==0 ? 0 : round((($tgtMese-$fatMese) / $tgtMese) * 100,2);
      $deltaProg = $tgtProg==0 ? 0 : round((($tgtProg-$fatProg) / $tgtProg) * 100,2);
    @endphp
    <tr>
      <th>Novembre
        @if ($prevMonth==11)
          &nbsp; >>
        @endif
        </th>
      <td><strong>{{ currency($fatMese) }}</strong></td>
      <td>{{ currency($tgtMese) }}</td>
      <td><strong>{{ $deltaMese }} %</strong></td>
      <td><strong>{{ currency($fatProg) }}</strong></td>
      <td>{{ currency($tgtProg) }}</td>
      <td><strong>{{ $deltaProg }} %</strong></td>
    </tr>
    @php
      $fatMese = empty($fat) ? 0 : $fat->valore12;
      $tgtMese = empty($tgt) ? 0 : $tgt->valore12 - $tgtProg;
      $fatProg += $fatMese;
      $tgtProg += $tgtMese;
      $deltaMese = $tgtMese==0 ? 0 : round((($tgtMese-$fatMese) / $tgtMese) * 100,2);
      $deltaProg = $tgtProg==0 ? 0 : round((($tgtProg-$fatProg) / $tgtProg) * 100,2);
    @endphp
    <tr>
      <th>Dicembre
        @if ($prevMonth==12)
          &nbsp; >>
        @endif
        </th>
      <td><strong>{{ currency($fatMese) }}</strong></td>
      <td>{{ currency($tgtMese) }}</td>
      <td><strong>{{ $deltaMese }} %</strong></td>
      <td><strong>{{ currency($fatProg) }}</strong></td>
      <td>{{ currency($tgtProg) }}</td>
      <td><strong>{{ $deltaProg }} %</strong></td>
    </tr>
  </tbody>
  <tfoot class="bg-gray">
    <tr>
      <th>TOTALE</th>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><strong>{{ currency($fatProg) }}</strong></td>
      <td><strong>{{ currency($tgtProg) }}</strong></td>
      <td><strong>{{ $deltaProg }} %</strong></td>
    </tr>
  </tfoot>
</table>