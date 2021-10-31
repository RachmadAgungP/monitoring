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

                    {{ Form::model($vendor_kapallayar,['url'=>'vendor-kapal-layar/'.$vendor_kapallayar->id_vendor,'method'=>'PUT']) }}
            
                        @csrf
                        
                        @include('jasakapallayar.vendorkapallayar.form')

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-2">
                            {{ Form::submit('Simpan Data',['class'=>'btn btn-primary btn-sm'])}}
                            <a href="/jasa-kapal-layar" class="btn btn-primary btn-sm">Kembali </a>    
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
