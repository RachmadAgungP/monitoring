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
