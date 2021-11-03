
    <div class="form-group row">
        <label class="col-md-2 col-form-label text-md-right">Nama Rekanan</label>
        <div class="col-md-6">
            {{ Form::text('nama_rekanan',null,['class'=>'from-control','placeholder'=>'Nama Rekanan'])}}
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 col-form-label text-md-right">Lokasi Gudang</label>
        <div class="col-md-6">
            {{ Form::text('lokasi_gudang',null,['class'=>'from-control','placeholder'=>'Lokasi Gudang'])}}
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 col-form-label text-md-right">Alamat Gudang</label>
        <div class="col-md-6">
            {{ Form::text('alamat_gudang',null,['class'=>'from-control','placeholder'=>'Alamat Gudang'])}}
        </div>
    </div>

  
    <div class="form-group row">
        <label class="col-md-2 col-form-label text-md-right">Provinsi</label>
        <div class="col-md-6">
            {{ Form::select('provinsi',$provinsi,['class'=>'from-control selects','placeholder'=>'pilih Provinsi'])}}
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 col-form-label text-md-right">Keterangan</label>
        <div class="col-md-6">
            {{ Form::text('keterangan',null,['class'=>'from-control','placeholder'=>'Keterangan'])}}
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
                        