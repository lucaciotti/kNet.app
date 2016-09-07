<form action="{{ route('client::fltList') }}" method="post">
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
      <input type="text" class="form-control" name="ragsoc">
    </div>
  </div>
  <div class="form-group">
    <label>Settore</label>
    <select name="settore[]" class="form-control select2" multiple="multiple" data-placeholder="Seleziona Settore" style="width: 100%;">
      @foreach ($settori as $settore)
        <option value="{{ $settore->codice }}">{{ $settore->descrizion }}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label>Nazione</label>
    <select name="nazione[]" class="form-control select2" multiple="multiple" data-placeholder="Seleziona Nazione" style="width: 100%;">
      @foreach ($nazioni as $nazione)
        <option value="{{ $nazione->codice }}">{{ $nazione->descrizion }}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label>Gruppo Cliente</label>
    <select name="zona[]" class="form-control select2" multiple="multiple" data-placeholder="Seleziona Zona" style="width: 100%;">
      @foreach ($zone as $zona)
        <option value="{{ $zona->codice }}">{{ $zona->descrizion }}</option>
      @endforeach
    </select>
  </div>
  {{--
    <div class="form-group">
      <label>Date range button:</label>
      <div class="input-group">
        <button type="button" class="btn btn-default pull-right daterange-btn" id="">
          <span>
            <i class="fa fa-calendar"></i> Date range picker
          </span>
          <i class="fa fa-caret-down"></i>
        </button>
      </div>
    </div>
  --}}
  <div class="form-group">
    <label>Stato Cliente</label>
    <div class="radio">
      <label>
        <input type="radio" name="optStatocf" id="opt1" value="T"> Attivo
      </label>
      <label>
        <input type="radio" name="optStatocf" id="opt2" value="I"> Insoluto
      </label>
      <label>
        <input type="radio" name="optStatocf" id="opt3" value="M"> Moroso
      </label>
      <label>
        <input type="radio" name="optStatocf" id="opt4" value="C"> Chiuso
      </label>
      <label>
        <input type="radio" name="optStatocf" id="opt5" value="" checked> TUTTI
      </label>
    </div>
  </div>

  <div>
    <button type="submit" class="btn btn-primary">{{ trans('adminlte_lang::message.submit') }}</button>
  </div>
</form>
