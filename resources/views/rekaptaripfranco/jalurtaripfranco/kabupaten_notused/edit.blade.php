@extends('layouts.app')
@section('title', 'Edit Data kabupaten')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit data kabupaten</div>
                <div class="card-body">
                @include('validation_error')

                    {{ Form::model($kabupaten,['url'=>'kabupaten/'.$kabupaten->id,'method'=>'PUT']) }}
            
                        @csrf
                        
                        @include('kabupaten.form')

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-2">
                            {{ Form::submit('Simpan Data',['class'=>'btn btn-primary btn-sm'])}}
                            <a href="/kabupaten" class="btn btn-primary btn-sm">Kembali </a>    
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
