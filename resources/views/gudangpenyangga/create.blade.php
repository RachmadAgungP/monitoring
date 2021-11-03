@extends('layouts.app')

@section('content')
<div class="container">
    <div class="justify-content-center">
        
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Input data Gudang Petroganik</div>
                <div class="card-body">
                    {{ Form::open(['url'=>'gudang-penyangga']) }}
                        @csrf
                        
                        @include('gudangpetroganik.form')
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

@section('style')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@stop

@section('script')
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.selects').select2();
        });    
    </script>
@stop
