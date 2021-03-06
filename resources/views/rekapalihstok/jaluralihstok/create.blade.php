@extends('layouts.app')
@section('title', 'Input Data Rute')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Input Data Rute alih stok </div>
                <div class="card-body">
                    @include('validation_error')
                    {{ Form::open(['url'=>'jalur-alihstok']) }}

                    @csrf

                    <div class="form-group row">
                        <label class="col-md-2 col-form-label text-md-right">Kode Rute</label>
                        <div class="col-md-6">
                            {{ Form::text('kode_rute',null,['class'=>'from-control','placeholder'=>'Kode Rute'])}}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label text-md-right">Jenis Gudang Asal</label>
                        <div class="col-md-6">
                            {{Form::select('jenisgudanga',array('0'=> 'Pilih Jenis Gudang','1' => 'Gudang Penyangga', '2' => 'Gudang Petroganik'),null,['class'=>'from-control asalfilter','id'=>'asalfilters'])}}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 col-form-label text-md-right">Asal Gudang</label>
                        <div class="col-md-8">
                            {{Form::select('asal',$asal ,null,['class'=>'from-control asalgudang selects','id'=>'asalgudang'])}}

                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 col-form-label text-md-right">Jenis Gudang Tujuan</label>
                        <div class="col-md-6">
                            {{Form::select('jenisgudangt',array('0'=> 'Pilih Jenis Gudang','1' => 'Gudang Penyangga', '2' => 'Gudang Petroganik'),null,['class'=>'from-control tujuanfilter','id'=>'tujuanfilters'])}}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 col-form-label text-md-right">Tujuan Gudang</label>
                        <div class="col-md-8">
                            {{Form::select('tujuan',$tujuan,null,['class'=>'from-control tujuangudang selects','id'=>'tujuangudang'])}}
                        </div>
                    </div>
                    @include('rekapalihstok.jaluralihstok.form')


                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-2">
                            {{ Form::submit('Simpan Data',['class'=>'btn btn-primary btn-sm'])}}
                            <a href="/jalur-alihstok" class="btn btn-primary btn-sm">Kembali </a>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>

    $(".asalfilter").on('change', function() {
        let categorys = $("#asalfilters").val()
        // console.log(categorys)
        $("#asalgudang").children().remove();
        $("#asalgudang").val('');
        $("#asalgudang").append('<option value="0">Pilih Gudang </option>');
        $("#asalgudang").prop('disable', true);

        if (categorys != '0' && categorys != 0) {
            $.ajax({
                url: "/jalur-alihstok/categoryasalgudang/" + categorys,
                type: "GET",
                // data: {'statuscategorys':statuscategorys},
                success: function(data) {
                    var dataObj = Object.values(data)[0];
                    var dataObjVal = Object.values(dataObj);
                    // console.log(dataObjVal);
                    var dataObjKey = Object.keys(dataObj);
                    $("#asalgudang").prop('disable', false);
                    let tampilan_option = '';
                    for (let i = 0; i < dataObjVal.length; i++) {
                        tampilan_option += "<option value=" + "'" + dataObjVal[i] + "'" + ">" + dataObjVal[i] + "</option>";
                        // console.log(Object.values(dataObj).length)
                    }
                    $("#asalgudang").append(tampilan_option)
                }
            });
        }
    });

    $(".asalgudang").on('change', function() {
        let gedungpilih = $("#asalgudang").val()
        console.log(gedungpilih)
    });

    $(".tujuanfilter").on('change', function() {
        let categorys = $("#tujuanfilters").val()
        // console.log(categorys)
        $("#tujuangudang").children().remove();
        $("#tujuangudang").val('');
        $("#tujuangudang").append('<option value="0">Pilih Gudang </option>');
        $("#tujuangudang").prop('disable', true);

        if (categorys != '0' && categorys != 0) {
            $.ajax({
                url: "/jalur-alihstok/categorytujuangudang/" + categorys,
                type: "GET",
                // data: {'statuscategorys':statuscategorys},
                success: function(data) {
                    var dataObj = Object.values(data)[0];
                    var dataObjVal = Object.values(dataObj);

                    var dataObjKey = Object.keys(dataObj);
                    $("#tujuangudang").prop('disable', false);
                    let tampilan_option = '';
                    for (let i = 0; i < dataObjVal.length; i++) {
                        tampilan_option += "<option value=" + "'" + dataObjVal[i] + "'" + ">" + dataObjVal[i] + "</option>";
                        // console.log(Object.values(dataObj).length)
                    }
                    $("#tujuangudang").append(tampilan_option)
                    // console.log(tampilan_option)
                }
            });
        }
    });

    $(".tujuangudang").on('change', function() {
        let gedungpilih = $("#tujuangudang").val()
        console.log(gedungpilih)
    });
</script>
@endpush