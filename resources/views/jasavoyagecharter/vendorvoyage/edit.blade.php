@extends('layouts.app')
@section('title', 'Edit Data Vendor')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit data Vendor Voyage Charter</div>
                <div class="card-body">
                @include('validation_error')

                    {{ Form::model($vendor_voyage,['url'=>'vendor-voyage/'.$vendor_voyage->id_vendor,'method'=>'PUT']) }}
            
                        @csrf
                        
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label text-md-right">Id Vendor</label>
                            <div class="col-md-6">
                                {{ Form::text('id_vendor',null,['class'=>'from-control','placeholder'=>'Id Vendor','readonly'=>''])}}
                            </div>
                        </div>

                        @include('jasavoyagecharter.vendorvoyage.form')

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-2">
                            {{ Form::submit('Simpan Data',['class'=>'btn btn-primary btn-sm'])}}
                            <a href="/vendor-voyage" class="btn btn-primary btn-sm">Kembali </a>    
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
