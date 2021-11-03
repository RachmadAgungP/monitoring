@extends('layouts.app')
@section('title', 'Edit Data Vendor')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit data Jasa PPM/EMKL Curah</div>
                <div class="card-body">
                    @include('validation_error')

                    {{ Form::model($jasa_ppmemkl_curah,['url'=>'jasa-ppmemkl-curah/'.$jasa_ppmemkl_curah->id,'method'=>'PUT']) }}

                    @csrf
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label text-md-right">Tujuan</label>
                        <div class="col-md-6">
                            {{ Form::select('tujuan',$tujuan,null,['class'=>'from-control selects','disabled','placeholder'=>'tujuan'])}}
                        </div>
                    </div>
                    @include('jasa_ppmemkl_curah.form')

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-2">
                            {{ Form::submit('Simpan Data',['class'=>'btn btn-primary btn-sm'])}}
                            <a href="/jasa-ppmemkl-curah" class="btn btn-primary btn-sm">Kembali </a>
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
    var tarif_PBM = $("#tarif_PBM").val()
    var tarif_EMKL = $("#tarif_EMKL").val()

    let total = $("#total").val()
    $(".tarif_PBM").on('change', function() {
        tarif_PBM = $("#tarif_PBM").val()
        total = Number(tarif_PBM) + Number(tarif_EMKL);
        document.getElementById("total").value = Number(total);
        console.log(total)
    });

    $(".tarif_EMKL").on('change', function() {
        tarif_EMKL = $("#tarif_EMKL").val()
        total = Number(tarif_PBM) + Number(tarif_EMKL);
        document.getElementById("total").value = Number(total);
        console.log(total)
    });

</script>
@endpush