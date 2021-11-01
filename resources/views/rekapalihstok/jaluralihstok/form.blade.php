
<!-- <h5><b><label class="col-md-5 col-form-label text-md-center">ASAL</label></b></h5> -->

<div class="form-group row">
    <label class="col-md-2 col-form-label text-md-right">Jenis Gudang Asal</label>
    <div class="col-md-6">
        {{Form::select('jenisgudanga',array('0'=> 'Pilih Jenis Gudang','1' => 'Gudang PKG', '2' => 'Gudang Petroganik'),null,['class'=>'from-control asalfilter','id'=>'asalfilters'])}}
    </div>
</div>
<!-- <div class="form-group row">
    <label class="col-md-2 col-form-label text-md-right">Type Gudang</label>
    <div class="col-md-6">
        {{ Form::radio('result','gudangPKG',false,['class'=>'from-control gudangs','id'=>'gudangs'])}}
        <label class="col-md-6">Gudang PKG</label>
        <br>
        {{ Form::radio('result','gudangPetroganik',true,['class'=>'from-control gudangs','id'=>'gudangs']) }}
        <label class="col-md-6">Gudang Petroganik</label>
    </div>
</div> -->

<div class="form-group row">
    <label class="col-md-2 col-form-label text-md-right">Asal Gudang</label>
    <div class="col-md-3">
    {{Form::select('asal',$asal,null,['class'=>'from-control asalgudang selects','id'=>'asalgudang'])}}
        
        <!-- <select class="form-control gudang disable" id="gudang"> -->
            <!-- <option value="0">Pilih Jenis Gudang </option>
            <option value="1">Gudang PKG</option>
            <option value="2">
                Gudang Petroganik</option> -->
            <!-- <select> -->
    </div>
</div>

<!-- <h5><b><label class="col-md-5 col-form-label text-md-center">TUJUAN</label></b></h5>
<div class="form-group row">
    <label class="col-md-2 col-form-label text-md-right">Jenis Gudang</label>
    <div class="col-md-6">
        {{Form::select('jenis_gudang',array('0'=> 'Pilih Jenis Gudang','1' => 'Gudang PKG', '2' => 'Gudang Petroganik'),null,['class'=>'from-control tujuanfilter','id'=>'tujuanfilters'])}}
    </div>
</div> -->

<div class="form-group row">
    <label class="col-md-2 col-form-label text-md-right">Jenis Gudang Tujuan</label>
    <div class="col-md-6">
        {{Form::select('jenisgudangt',array('0'=> 'Pilih Jenis Gudang','1' => 'Gudang PKG', '2' => 'Gudang Petroganik'),null,['class'=>'from-control tujuanfilter','id'=>'tujuanfilters'])}}
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label text-md-right">Tujuan Gudang</label>
    <div class="col-md-3">
    {{Form::select('tujuan',$tujuan,null,['class'=>'from-control tujuangudang selects','id'=>'tujuangudang'])}}
        
        <!-- <select class="form-control gudang disable" id="gudang"> -->
            <!-- <option value="0">Pilih Jenis Gudang </option>
            <option value="1">Gudang PKG</option>
            <option value="2">
                Gudang Petroganik</option> -->
            <!-- <select> -->
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label text-md-right">Tarif</label>
    <div class="col-md-6">
        {{ Form::text('tarif',null,['class'=>'from-control','placeholder'=>'tarif'])}}
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label text-md-right">Wilayah</label>
    <div class="col-md-6">
        {{ Form::select('wilayah',$wilayah,null,['class'=>'from-control','placeholder'=>'wilayah'])}}
    </div>
</div>

@push('scripts')
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(function() {
            $('select').select2();
        });    
    </script>
@endpush
           