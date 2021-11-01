@extends('layouts.app')
@section('title', 'Edit Data Vendor')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit data jasa container</div>
                <div class="card-body">
                    @include('validation_error')

                    {{ Form::model($jasacontainer,['url'=>'jasa-container/'.$jasacontainer->id,'method'=>'PUT']) }}

                    @csrf

                    <div class="form-group row">
                        <label class="col-md-2 col-form-label text-md-right">rute</label>
                        <div class="col-md-6">
                            {{ Form::select('kode_rutes',$jalur_container,null,['class'=>'from-control selects','disabled','placeholder'=>'pilih rute'])}}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 col-form-label text-md-right">Vendor</label>
                        <div class="col-md-6">
                            {{ Form::select('nama_vendor',$vendor_container,null,['class'=>'from-control selects','placeholder'=>'pilih vendor'])}}
                        </div>
                    </div>
                    @include('jasacontainer.form')

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-2">
                            {{ Form::submit('Simpan Data',['class'=>'btn btn-primary btn-sm'])}}
                            <a href="/jasa-container" class="btn btn-primary btn-sm">Kembali </a>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection