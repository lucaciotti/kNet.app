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
      $fatMese = $fat->valore1;
      $tgtMese = $tgt->valore1;
      $fatProg = $fatMese;
      $tgtProg = $tgtMese;
      $deltaMese = round((($tgtMese-$fatMese) / $tgtMese) * 100,2);
      $deltaProg = round((($tgtProg-$fatProg) / $tgtProg) * 100,2);
    @endphp
    <tr>
      <th>Gennaio</th>
      <td><strong>{{ currency($fatMese) }}</strong></td>
      <td>{{ currency($tgtMese) }}</td>
      <td><strong>{{ $deltaMese }} %</strong></td>
      <td><strong>{{ currency($fatProg) }}</strong></td>
      <td>{{ currency($tgtProg) }}</td>
      <td><strong>{{ $deltaProg }} %</strong></td>
    </tr>
    @php
      $fatMese = $fat->valore2;
      $tgtMese = $tgt->valore2 - $tgtProg;
      $fatProg += $fatMese;
      $tgtProg += $tgtMese;
      $deltaMese = round((($tgtMese-$fatMese) / $tgtMese) * 100,2);
      $deltaProg = round((($tgtProg-$fatProg) / $tgtProg) * 100,2);
    @endphp
    <tr>
      <th>Febbraio</th>
      <td><strong>{{ currency($fatMese) }}</strong></td>
      <td>{{ currency($tgtMese) }}</td>
      <td><strong>{{ $deltaMese }} %</strong></td>
      <td><strong>{{ currency($fatProg) }}</strong></td>
      <td>{{ currency($tgtProg) }}</td>
      <td><strong>{{ $deltaProg }} %</strong></td>
    </tr>
    @php
      $fatMese = $fat->valore3;
      $tgtMese = $tgt->valore3 - $tgtProg;
      $fatProg += $fatMese;
      $tgtProg += $tgtMese;
      $deltaMese = round((($tgtMese-$fatMese) / $tgtMese) * 100,2);
      $deltaProg = round((($tgtProg-$fatProg) / $tgtProg) * 100,2);
    @endphp
    <tr>
      <th>Marzo</th>
      <td><strong>{{ currency($fatMese) }}</strong></td>
      <td>{{ currency($tgtMese) }}</td>
      <td><strong>{{ $deltaMese }} %</strong></td>
      <td><strong>{{ currency($fatProg) }}</strong></td>
      <td>{{ currency($tgtProg) }}</td>
      <td><strong>{{ $deltaProg }} %</strong></td>
    </tr>
    @php
      $fatMese = $fat->valore4;
      $tgtMese = $tgt->valore4 - $tgtProg;
      $fatProg += $fatMese;
      $tgtProg += $tgtMese;
      $deltaMese = round((($tgtMese-$fatMese) / $tgtMese) * 100,2);
      $deltaProg = round((($tgtProg-$fatProg) / $tgtProg) * 100,2);
    @endphp
    <tr>
      <th>Aprile</th>
      <td><strong>{{ currency($fatMese) }}</strong></td>
      <td>{{ currency($tgtMese) }}</td>
      <td><strong>{{ $deltaMese }} %</strong></td>
      <td><strong>{{ currency($fatProg) }}</strong></td>
      <td>{{ currency($tgtProg) }}</td>
      <td><strong>{{ $deltaProg }} %</strong></td>
    </tr>
    @php
      $fatMese = $fat->valore5;
      $tgtMese = $tgt->valore5 - $tgtProg;
      $fatProg += $fatMese;
      $tgtProg += $tgtMese;
      $deltaMese = round((($tgtMese-$fatMese) / $tgtMese) * 100,2);
      $deltaProg = round((($tgtProg-$fatProg) / $tgtProg) * 100,2);
    @endphp
    <tr>
      <th>Maggio</th>
      <td><strong>{{ currency($fatMese) }}</strong></td>
      <td>{{ currency($tgtMese) }}</td>
      <td><strong>{{ $deltaMese }} %</strong></td>
      <td><strong>{{ currency($fatProg) }}</strong></td>
      <td>{{ currency($tgtProg) }}</td>
      <td><strong>{{ $deltaProg }} %</strong></td>
    </tr>
    @php
      $fatMese = $fat->valore6;
      $tgtMese = $tgt->valore6 - $tgtProg;
      $fatProg += $fatMese;
      $tgtProg += $tgtMese;
      $deltaMese = round((($tgtMese-$fatMese) / $tgtMese) * 100,2);
      $deltaProg = round((($tgtProg-$fatProg) / $tgtProg) * 100,2);
    @endphp
    <tr>
      <th>Giugno</th>
      <td><strong>{{ currency($fatMese) }}</strong></td>
      <td>{{ currency($tgtMese) }}</td>
      <td><strong>{{ $deltaMese }} %</strong></td>
      <td><strong>{{ currency($fatProg) }}</strong></td>
      <td>{{ currency($tgtProg) }}</td>
      <td><strong>{{ $deltaProg }} %</strong></td>
    </tr>
    @php
      $fatMese = $fat->valore7;
      $tgtMese = $tgt->valore7 - $tgtProg;
      $fatProg += $fatMese;
      $tgtProg += $tgtMese;
      $deltaMese = round((($tgtMese-$fatMese) / $tgtMese) * 100,2);
      $deltaProg = round((($tgtProg-$fatProg) / $tgtProg) * 100,2);
    @endphp
    <tr>
      <th>Luglio</th>
      <td><strong>{{ currency($fatMese) }}</strong></td>
      <td>{{ currency($tgtMese) }}</td>
      <td><strong>{{ $deltaMese }} %</strong></td>
      <td><strong>{{ currency($fatProg) }}</strong></td>
      <td>{{ currency($tgtProg) }}</td>
      <td><strong>{{ $deltaProg }} %</strong></td>
    </tr>
    @php
      $fatMese = $fat->valore8;
      $tgtMese = $tgt->valore8 - $tgtProg;
      $fatProg += $fatMese;
      $tgtProg += $tgtMese;
      $deltaMese = round((($tgtMese-$fatMese) / $tgtMese) * 100,2);
      $deltaProg = round((($tgtProg-$fatProg) / $tgtProg) * 100,2);
    @endphp
    <tr>
      <th>Agosto</th>
      <td><strong>{{ currency($fatMese) }}</strong></td>
      <td>{{ currency($tgtMese) }}</td>
      <td><strong>{{ $deltaMese }} %</strong></td>
      <td><strong>{{ currency($fatProg) }}</strong></td>
      <td>{{ currency($tgtProg) }}</td>
      <td><strong>{{ $deltaProg }} %</strong></td>
    </tr>
    @php
      $fatMese = $fat->valore9;
      $tgtMese = $tgt->valore9 - $tgtProg;
      $fatProg += $fatMese;
      $tgtProg += $tgtMese;
      $deltaMese = round((($tgtMese-$fatMese) / $tgtMese) * 100,2);
      $deltaProg = round((($tgtProg-$fatProg) / $tgtProg) * 100,2);
    @endphp
    <tr>
      <th>Settembre</th>
      <td><strong>{{ currency($fatMese) }}</strong></td>
      <td>{{ currency($tgtMese) }}</td>
      <td><strong>{{ $deltaMese }} %</strong></td>
      <td><strong>{{ currency($fatProg) }}</strong></td>
      <td>{{ currency($tgtProg) }}</td>
      <td><strong>{{ $deltaProg }} %</strong></td>
    </tr>
    @php
      $fatMese = $fat->valore10;
      $tgtMese = $tgt->valore10 - $tgtProg;
      $fatProg += $fatMese;
      $tgtProg += $tgtMese;
      $deltaMese = round((($tgtMese-$fatMese) / $tgtMese) * 100,2);
      $deltaProg = round((($tgtProg-$fatProg) / $tgtProg) * 100,2);
    @endphp
    <tr>
      <th>Ottobre</th>
      <td><strong>{{ currency($fatMese) }}</strong></td>
      <td>{{ currency($tgtMese) }}</td>
      <td><strong>{{ $deltaMese }} %</strong></td>
      <td><strong>{{ currency($fatProg) }}</strong></td>
      <td>{{ currency($tgtProg) }}</td>
      <td><strong>{{ $deltaProg }} %</strong></td>
    </tr>
    @php
      $fatMese = $fat->valore11;
      $tgtMese = $tgt->valore11 - $tgtProg;
      $fatProg += $fatMese;
      $tgtProg += $tgtMese;
      $deltaMese = round((($tgtMese-$fatMese) / $tgtMese) * 100,2);
      $deltaProg = round((($tgtProg-$fatProg) / $tgtProg) * 100,2);
    @endphp
    <tr>
      <th>Novembre</th>
      <td><strong>{{ currency($fatMese) }}</strong></td>
      <td>{{ currency($tgtMese) }}</td>
      <td><strong>{{ $deltaMese }} %</strong></td>
      <td><strong>{{ currency($fatProg) }}</strong></td>
      <td>{{ currency($tgtProg) }}</td>
      <td><strong>{{ $deltaProg }} %</strong></td>
    </tr>
    @php
      $fatMese = $fat->valore12;
      $tgtMese = $tgt->valore12 - $tgtProg;
      $fatProg += $fatMese;
      $tgtProg += $tgtMese;
      $deltaMese = round((($tgtMese-$fatMese) / $tgtMese) * 100,2);
      $deltaProg = round((($tgtProg-$fatProg) / $tgtProg) * 100,2);
    @endphp
    <tr>
      <th>Dicembre</th>
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
