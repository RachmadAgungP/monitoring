
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
        <label class="col-md-2 col-form-label text-md-right">Nama Rekanan</label>
        <div class="col-md-6">
            {{ Form::text('nama_rekanan',null,['class'=>'from-control','placeholder'=>'Nama Rekanan'])}}
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 col-form-label text-md-right">Kap GP Ton</label>
        <div class="col-md-6">
            {{ Form::number('kap_GP_Ton',null,['class'=>'from-control','placeholder'=>'Kap GP Ton'])}}
        </div>
    </div>
    
    <div class="form-group row">
        <label class="col-md-2 col-form-label text-md-right">Kapasitas Anper Lain</label>
        <div class="col-md-6">
            {{ Form::number('Kapasitas_Anper_Lain',null,['class'=>'from-control','placeholder'=>'Kapasitas Anper Lain'])}}
        </div>
    </div>
    
    <div class="form-group row">
        <label class="col-md-2 col-form-label text-md-right">Sewa Gudang Rp/bulan</label>
        <div class="col-md-6">
            {{ Form::number('sewa_Gudang_Rpbulan',null,['class'=>'from-control','placeholder'=>'Sewa Gudang Rp/bulan'])}}
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 col-form-label text-md-right">Pengolahan Stock Rp/bulan</label>
        <div class="col-md-6">
            {{ Form::number('pengelolan_Stock_Rpbulan',null,['class'=>'from-control','placeholder'=>'Pengolahan Rp/bulan'])}}
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 col-form-label text-md-right">B/M Rp/Ton</label>
        <div class="col-md-6">
            {{ Form::number('BM_RpTon',null,['class'=>'from-control','placeholder'=>'B/M Rp/Ton'])}}
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 col-form-label text-md-right">rebag Rp/Ton</label>
        <div class="col-md-6">
            {{ Form::number('rebag_RpTon',null,['class'=>'from-control','placeholder'=>'rebag Rp/Ton'])}}
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 col-form-label text-md-right">lembur Rp/Ton</label>
        <div class="col-md-6">
            {{ Form::number('lembur_RpTon',null,['class'=>'from-control','placeholder'=>'lembur Rp/Ton'])}}
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 col-form-label text-md-right">restapel Rp/Ton</label>
        <div class="col-md-6">
            {{ Form::number('restapel_RpTon',null,['class'=>'from-control','placeholder'=>'restapel Rp/Ton'])}}
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 col-form-label text-md-right">Nomor Surat</label>
        <div class="col-md-6">
            {{ Form::text('nomor_surat',null,['class'=>'from-control','placeholder'=>'Nomor Surat'])}}
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

    <div class="form-group row">
        <label class="col-md-2 col-form-label text-md-right">Jenis surat</label>
        <div class="col-md-6">
            {{ Form::text('jenis_surat',null,['class'=>'from-control','placeholder'=>'Jenis surat'])}}
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
                        