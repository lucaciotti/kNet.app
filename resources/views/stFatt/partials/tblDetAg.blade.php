<table class="table table-hover table-striped" id="statFattTot" style="text-align: center;">
  <col width="80">
  <col width="80">
  <col width="50">
  <col width="50">
  <thead>
    <tr>
      <th rowspan="2">&nbsp;</th>
      <th rowspan="2" style="text-align: center;">Mese</th>
      <th colspan="2" style="text-align: center;">FATTURATO</th>
    </tr>
    <tr>
      <th style="text-align: center;">Mese</th>
      <th style="text-align: center;">Progressivo</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($fatturato as $val)
      <tr>
        <th colspan="4">{{ $val->gruppo }} - {{ $val->grpProd->descrizion }}</th>
      </tr>
      @php
        $fatMese = $val->valore1;
        $fatProg = $fatMese;
      @endphp
      <tr>
        <th>&nbsp;</th>
        <th>Gennaio</th>
        <td><strong>{{ currency($fatMese) }}</strong></td>
        <td><strong>{{ currency($fatProg) }}</strong></td>
      </tr>
      @php
        $fatMese = $val->valore2;
        $fatProg += $fatMese;
      @endphp
      <tr>
        <th>&nbsp;</th>
        <th>Febbraio</th>
        <td><strong>{{ currency($fatMese) }}</strong></td>
        <td><strong>{{ currency($fatProg) }}</strong></td>
      </tr>
      @php
        $fatMese = $val->valore3;
        $fatProg += $fatMese;
      @endphp
      <tr>
        <th>&nbsp;</th>
        <th>Marzo</th>
        <td><strong>{{ currency($fatMese) }}</strong></td>
        <td><strong>{{ currency($fatProg) }}</strong></td>
      </tr>
      @php
        $fatMese = $val->valore4;
        $fatProg += $fatMese;
      @endphp
      <tr>
        <th>&nbsp;</th>
        <th>Aprile</th>
        <td><strong>{{ currency($fatMese) }}</strong></td>
        <td><strong>{{ currency($fatProg) }}</strong></td>
      </tr>
      @php
        $fatMese = $val->valore5;
        $fatProg += $fatMese;
      @endphp
      <tr>
        <th>&nbsp;</th>
        <th>Maggio</th>
        <td><strong>{{ currency($fatMese) }}</strong></td>
        <td><strong>{{ currency($fatProg) }}</strong></td>
      </tr>
      @php
        $fatMese = $val->valore6;
        $fatProg += $fatMese;
      @endphp
      <tr>
        <th>&nbsp;</th>
        <th>Giugno</th>
        <td><strong>{{ currency($fatMese) }}</strong></td>
        <td><strong>{{ currency($fatProg) }}</strong></td>
      </tr>
      @php
        $fatMese = $val->valore7;
        $fatProg += $fatMese;
      @endphp
      <tr>
        <th>&nbsp;</th>
        <th>Luglio</th>
        <td><strong>{{ currency($fatMese) }}</strong></td>
        <td><strong>{{ currency($fatProg) }}</strong></td>
      </tr>
      @php
        $fatMese = $val->valore8;
        $fatProg += $fatMese;
      @endphp
      <tr>
        <th>&nbsp;</th>
        <th>Agosto</th>
        <td><strong>{{ currency($fatMese) }}</strong></td>
        <td><strong>{{ currency($fatProg) }}</strong></td>
      </tr>
      @php
        $fatMese = $val->valore9;
        $fatProg += $fatMese;
      @endphp
      <tr>
        <th>&nbsp;</th>
        <th>Settembre</th>
        <td><strong>{{ currency($fatMese) }}</strong></td>
        <td><strong>{{ currency($fatProg) }}</strong></td>
      </tr>
      @php
        $fatMese = $val->valore10;
        $fatProg += $fatMese;
      @endphp
      <tr>
        <th>&nbsp;</th>
        <th>Ottobre</th>
        <td><strong>{{ currency($fatMese) }}</strong></td>
        <td><strong>{{ currency($fatProg) }}</strong></td>
      </tr>
      @php
        $fatMese = $val->valore11;
        $fatProg += $fatMese;
      @endphp
      <tr>
        <th>&nbsp;</th>
        <th>Novembre</th>
        <td><strong>{{ currency($fatMese) }}</strong></td>
        <td><strong>{{ currency($fatProg) }}</strong></td>
      </tr>
      @php
        $fatMese = $val->valore12;
        $fatProg += $fatMese;
      @endphp
      <tr>
        <th>&nbsp;</th>
        <th>Dicembre</th>
        <td><strong>{{ currency($fatMese) }}</strong></td>
        <td><strong>{{ currency($fatProg) }}</strong></td>
      </tr>
    @endforeach
  </tbody>
  {{-- <tfoot class="bg-gray">
    <tr>
      <th>&nbsp;</th>
      <th>TOTALE</th>
      <td></td>
      <td><strong>{{ currency($fatProg) }}</strong></td>
    </tr>
  </tfoot> --}}
</table>
