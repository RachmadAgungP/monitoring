@extends('layouts.app')
@section('title', 'Edit Data Vendor')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit data Vendor kapal layar</div>
                <div class="card-body">
                @include('validation_error')

                    {{ Form::model($vendor_Inbag,['url'=>'vendor-Inbag/'.$vendor_Inbag->id,'method'=>'PUT']) }}
            
                        @csrf
                        
                        @include('jasa_ppmemkl_inbag.vendorinbag.form')

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-2">
                            {{ Form::submit('Simpan Data',['class'=>'btn btn-primary btn-sm'])}}
                            <a href="/jasa-ppmemkl-inbag" class="btn btn-primary btn-sm">Kembali </a>    
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
