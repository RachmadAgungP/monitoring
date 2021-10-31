@extends('layouts.app')

@section('content')
<div class="container">
    <div class="justify-content-center">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Input data Jasa General Cargo</div>
                <div class="card-body">
                    {{ Form::open(['url'=>'jasa-general-cargo']) }}
                    @csrf
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label text-md-right">Rute</label>
                        <div class="col-md-6">
                            {{ Form::select('kode_rute',$jalur_generalcargo,null,['class'=>'from-control selects','placeholder'=>'id Rute'])}}
                        </div>
                    </div>
                    @include('jasageneralcargo.form')
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-2">
                            {{ Form::submit('Simpan Data',['class'=>'btn btn-primary btn-sm'])}}
                            <a href="/jasa-general-cargo" class="btn btn-primary btn-sm">Kembali </a>
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
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(function() {
        $('select').select2();
    });
</script>
@endpush