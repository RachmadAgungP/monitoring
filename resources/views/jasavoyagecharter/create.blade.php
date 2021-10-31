@extends('layouts.app')

@section('content')
<div class="container">
    <div class="justify-content-center">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Input data Jasa Voyage Charter</div>
                <div class="card-body">
                    {{ Form::open(['url'=>'jasa-voyage-charter']) }}
                    @csrf
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label text-md-right">rute</label>
                        <div class="col-md-6">
                            {{ Form::select('kode_rutes',$jalur_voyage,null,['class'=>'from-control selects','placeholder'=>'pilih rute'])}}
                        </div>
                    </div>
                    @include('jasavoyagecharter.form')
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-2">
                            {{ Form::submit('Simpan Data',['class'=>'btn btn-primary btn-sm'])}}
                            <a href="/jasa-voyage-charter" class="btn btn-primary btn-sm">Kembali </a>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

