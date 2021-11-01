@extends('layouts.app')
@section('title', 'Edit Data Vendor')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit data Rekap Alih Stok</div>
                <div class="card-body">
                    @include('validation_error')

                    {{ Form::model($rekaptaripfranco,['url'=>'rekap-tarip-franco/'.$rekaptaripfranco->id,'method'=>'PUT']) }}

                    @csrf
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label text-md-right">Rute</label>
                        <div class="col-md-6">
                            {{ Form::select('kode_rutes',$jalur_taripfranco,null,['class'=>'from-control selects','disabled','placeholder'=>'pilih rute'])}}
                        </div>
                    </div>

                    @include('rekaptaripfranco.form')

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-2">
                            {{ Form::submit('Simpan Data',['class'=>'btn btn-primary btn-sm'])}}
                            <a href="/rekap-tarip-franco" class="btn btn-primary btn-sm">Kembali </a>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection