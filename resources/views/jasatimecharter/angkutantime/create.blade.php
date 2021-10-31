@extends('layouts.app')
@section('title', 'Input Data Rute')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Input data Angkutan Jasa Time Charter</div>
                <div class="card-body">
                @include('validation_error')
                    {{ Form::open(['url'=>'angkutan-time']) }}
            
                        @csrf
                        

                @include('jasatimecharter.angkutantime.form')
                        

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-2">
                            {{ Form::submit('Simpan Data',['class'=>'btn btn-primary btn-sm'])}}
                            <a href="/angkutan-time" class="btn btn-primary btn-sm">Kembali </a>    
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
