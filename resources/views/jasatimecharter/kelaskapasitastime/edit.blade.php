@extends('layouts.app')
@section('title', 'Edit Data kelas kapasitas')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit data kelas kapasitas time Charter</div>
                <div class="card-body">
                @include('validation_error')

                    {{ Form::model($kelaskapasitas_time,['url'=>'kelaskapasitas-time/'.$kelaskapasitas_time->id_kelaskapasitas,'method'=>'PUT']) }}
            
                        @csrf
                        
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label text-md-right">Id kelas kapasitas</label>
                            <div class="col-md-6">
                                {{ Form::text('id_kelas_kapasitas',null,['class'=>'from-control','placeholder'=>'Id kelas kapasitas','readonly'=>''])}}
                            </div>
                        </div>

                        @include('jasatimecharter.kelaskapasitastime.form')

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-2">
                            {{ Form::submit('Simpan Data',['class'=>'btn btn-primary btn-sm'])}}
                            <a href="/kelaskapasitas-time" class="btn btn-primary btn-sm">Kembali </a>    
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
