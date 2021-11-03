@extends('layouts.app')
@section('title', 'Edit Data Gudang Petroganik')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit data Gudang Penyangga</div>
                <div class="card-body">
                @include('validation_error')

                    {{ Form::model($gudangpenyangga,['url'=>'gudang-penyangga/'.$gudangpenyangga->id,'method'=>'PUT']) }}
            
                        @csrf
                        
                        @include('gudangpenyangga.form')

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-2">
                            {{ Form::submit('Simpan Data',['class'=>'btn btn-primary btn-sm'])}}
                            <a href="/gudang-penyangga" class="btn btn-primary btn-sm">Kembali </a>    
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
