@extends('layouts.app')

@section('htmlheader_title')
    - Visite Clienti
@endsection

@section('contentheader_title')
    {{$client->descrizion or ''}}
@endsection

@section('contentheader_breadcrumb')
  {!! Breadcrumbs::render('clients') !!}
@endsection

@section('main-content')
  <div class="row">
      <div class="container">
      <div class="col-lg-12">
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title" data-widget="collapse">Inserimento Visite</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">

          <form action="{{ route('visit::store') }}" method="POST">
              {{ csrf_field() }}

            <div class="form-group">
              <label>Cliente</label>
              <select name="codcli" class="form-control select2" style="width: 100%;">
                @if (count($client)>1)
                  <option value=""> </option>
                  @foreach ($client as $cli)
                    <option value="{{ $cli->codice }}">[{{$cli->codice}}] {{ $cli->descrizion }}</option>
                  @endforeach
                @else
                  <option value="{{ $client->codice }}">[{{$client->codice}}] {{ $client->descrizion }}</option>
                @endif
              </select>
            </div>

            <div class="form-group">
              <label>Tipologia</label>
              <select name="tipo" class="form-control select2" style="width: 100%;">
                <option value=""> </option>
                <option value="M">Meeting</option>
                <option value="P">Presentazione Prodotto</option>
                <option value="S">Scadenza</option>
                <option value="N">Non Conformità</option>
              </select>
            </div>

            <div class="form-group">
              <label>Date:</label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right datepicker" name="data">
              </div>
            </div>

            <div class="form-group">
              <label>Breve Descrizione</label>
              <input type="text" class="form-control" name="descrizione" value="" placeholder="Descrizione">
            </div>

            <div class="form-group">
              <label>Note</label>
              {{-- <textarea class="form-control" rows="6" name="note" placeholder="Dettagli &hellip;"></textarea>
              style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"--}}
              <textarea class="textarea" placeholder="Place some text here" name="note"
                style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
            </div>

            @push('css-head')
              <link rel="stylesheet" href="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
            @endpush

            @push('script-footer')
              <script src="{{ asset('/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}" type="text/javascript"></script>
              <script type="text/javascript">
                    $(function () {
                      //bootstrap WYSIHTML5 - text editor
                      $(".textarea").wysihtml5();
                    });
              </script>
            @endpush

            <div>
              <button type="submit" class="btn btn-primary">{{ trans('adminlte_lang::message.submit') }}</button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('extra_script')
  @include('layouts.partials.scripts.iCheck')
  @include('layouts.partials.scripts.select2')
  @include('layouts.partials.scripts.datePicker')
@endsection
