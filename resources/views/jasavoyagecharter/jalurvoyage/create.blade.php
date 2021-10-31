@extends('layouts.app')
@section('title', 'Input Data Rute')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Input data Jalur Voyage Charter</div>
                <div class="card-body">
                @include('validation_error')
                    {{ Form::open(['url'=>'jalur-voyage']) }}
            
                        @csrf
                        
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label text-md-right">Kode Rute</label>
                            <div class="col-md-6">
                                {{ Form::text('kode_rute',null,['class'=>'from-control','placeholder'=>'Kode Rute'])}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label text-md-right">Asal</label>
                            <div class="col-md-6">
                                {{ Form::select('asal',$asal,null,['class'=>'from-control','placeholder'=>'Asal'])}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label text-md-right">Tujuan</label>
                            <div class="col-md-6">
                                {{ Form::select('tujuan',$tujuan,null,['class'=>'from-control','placeholder'=>'Tujuan'])}}
                            </div>
                        </div>
                @include('jasavoyagecharter.jalurvoyage.form')
                        

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-2">
                            {{ Form::submit('Simpan Data',['class'=>'btn btn-primary btn-sm'])}}
                            <a href="/jalur-voyage" class="btn btn-primary btn-sm">Kembali </a>    
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