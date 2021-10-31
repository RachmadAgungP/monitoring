    
    

    <div class="form-group row">
        <label class="col-md-2 col-form-label text-md-right">Tarif</label>
        <div class="col-md-6">
            {{ Form::text('tarif',null,['class'=>'from-control','placeholder'=>'Tarif'])}}
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 col-form-label text-md-right">Kapasitas</label>
        <div class="col-md-6">
            {{ Form::text('kapasitas',null,['class'=>'from-control','placeholder'=>'kapasitas'])}}
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 col-form-label text-md-right">Kontrak</label>
        <div class="col-md-6">
            {{ Form::text('kontrak',null,['class'=>'from-control','placeholder'=>'No Kontrak'])}}
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 col-form-label text-md-right">Tanggal Kontrak</label>
        <div class="col-md-6">
            {{ Form::date('tgl_kontrak',null,['class'=>'from-control','placeholder'=>'Tgl Kontrak'])}}
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 col-form-label text-md-right">Mulai</label>
        <div class="col-md-6">
            {{ Form::date('mulai',null,['class'=>'from-control','placeholder'=>'Mulai'])}}
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 col-form-label text-md-right">Akhir</label>
        <div class="col-md-6">
            {{ Form::date('akhir',null,['class'=>'from-control','placeholder'=>'Akhir'])}}
        </div>
    </div>

<!-- @section('style')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@stop -->

@push('scripts')
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(function() {
            $('select').select2();
        });    
    </script>
@endpush
                        