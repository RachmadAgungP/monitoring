@extends('layouts.app')
@section('title', 'Edit Data Rute')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit data Jalur tarip franco</div>
                <div class="card-body">
                    @include('validation_error')

                    {{ Form::model($jalur_taripfranco,['url'=>'jalur-taripfranco/'.$jalur_taripfranco->kode_rute,'method'=>'PUT']) }}

                    @csrf

                    <div class="form-group row">
                        <label class="col-md-2 col-form-label text-md-right">Kode Rute</label>
                        <div class="col-md-6">
                            {{ Form::text('kode_rute',null,['class'=>'from-control','disabled','placeholder'=>'Kode Rute','readonly'=>''])}}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label text-md-right">Jenis Gudang Asal</label>
                        <div class="col-md-6">
                            {{Form::select('jenisgudanga',array('0'=> 'Pilih Jenis Gudang','1' => 'Gudang PKG', '2' => 'Gudang Petroganik'),null,['class'=>'from-control asalfilter','id'=>'asalfilters'])}}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 col-form-label text-md-right">Asal Gudang</label>
                        <div class="col-md-3">
                            {{Form::select('asal',$asal ,$val_asal,['class'=>'from-control asalgudang selects','id'=>'asalgudang'])}}

                        </div>
                    </div>
                    @include('rekaptaripfranco.jalurtaripfranco.form')

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-2">
                            {{ Form::submit('Simpan Data',['class'=>'btn btn-primary btn-sm'])}}
                            <a href="/jalur-taripfranco" class="btn btn-primary btn-sm">Kembali </a>
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
</script>
@endpush