<form action="{{ route('scad::fltList') }}" method="post">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="form-group">
    <label>Ragione Sociale</label>
    <div class="input-group">
      <span class="input-group-btn">
        <select type="button" class="btn btn-warning dropdown-toggle" name="ragsocOp">
          <option value="eql">=</option>
          <option value="stw">[]...</option>
          <option value="cnt" selected>...[]...</option>
        </select>
      </span>
      <input type="text" class="form-control" name="ragsoc" value="{{$ragSoc or ''}}">
    </div>
  </div>
  <div class="form-group">
    <label>Data Scadenza:</label>
    <div class="input-group">&nbsp;
      <button type="button" class="btn btn-default pull-right daterange-btn">
        <i class="fa fa-calendar"></i>&nbsp;
        <span></span> <b class="fa fa-caret-down"></b>
      </button>
      <input type="hidden" name="startDate" value="">
      <input type="hidden" name="endDate" value="">
    </div>
  </div>
  <div class="form-group">
    <label>&nbsp;
      <input type="checkbox" name="noDate" id="noDate" value="C" > Qualsiasi Data
    </label>
  </div>
  <div class="form-group">
    <label>Tipo Scadenza</label>
    <div class="checkbox">
      <label>
        <input type="checkbox" name="chkPag[]" id="opt1" value="D" checked> Rimessa Diretta
      </label>
      <label>
        <input type="checkbox" name="chkPag[]" id="opt2" value="R" checked> Ricevuta Bancaria
      </label>
      <label>
        <input type="checkbox" name="chkPag[]" id="opt3" value="T" checked> Tratta
      </label>
      <label>
        <input type="checkbox" name="chkPag[]" id="opt4" value="P" checked> Pagherò
      </label>
      <br>
      <label>
        <input type="checkbox" name="chkPag[]" id="opt6" value="L" checked> Bollettino di C/C
      </label>
      <label>
        <input type="checkbox" name="chkPag[]" id="opt7" value="C" checked> Contrassegno
      </label>
      <label>
        <input type="checkbox" name="chkPag[]" id="opt5" value="B" checked> Bonifico
      </label>
      <label>
        <input type="checkbox" name="chkPag[]" id="opt8" value="A" checked> Altro
      </label>
    </div>
  </div>
  <div class="form-group">
    <label>Stato Scadenza</label>
    <div class="checkbox">
      <label>
        <input type="checkbox" name="chkStato_P" id="optStato1" value="P"> Pagato
      </label>
      <label>
        <input type="checkbox" name="chkStato_T" id="optStato2" value="T"> TUTTE
      </label>
    </div>
  </div>
  <div class="form-group">
    <label>Tipologia Scadenze</label>
    <div class="radio">
      <label>
        <input type="radio" name="optRaggr" id="opt1" value="F" checked> Singole
      </label>
      <label>
        <input type="radio" name="optRaggr" id="opt2" value="M"> Accorpate
      </label>
    </div>
  </div>
  <div>
    <button type="submit" class="btn btn-primary">{{ trans('adminlte_lang::message.submit') }}</button>
  </div>
</form>
