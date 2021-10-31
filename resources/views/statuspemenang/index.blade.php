@extends('layouts.app')
@section('title','Status Pemenang')
@section('content')
<div class="container">
    <div class="justify-content-center">
        <div class="col-md-14">
        <a href="/jasa-voyage-charter" class="btn btn-primary btn-sm">Kembali </a> 
        <hr> 
            <div class="card">
                <div class="card-header">@yield('title')</div>
                
                <div class="card-body">
                   
                    <a href="/status-pemenang/create" class = "btn btn-danger btn-sm">Input Data Baru </a>
                    <hr>
                    @include('alert')
                    
                    <table class="table table-bordered " id="users-table">
                            <thead >
                                <tr>
                                <th width = 70>id</th>
                                <th>Status Pemenang</th>
                                <th width = 120>action</th>                                                                                                
                                </tr>                                                                                                 
                            </thead>
                            
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(function() {
    $('#users-table').DataTable(
        {
            processing: true,
            serverSide: true,
        "scrollY": 200,
        "scrollX": true,
        ajax: '/status-pemenang/json',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'status_pemenang', name: 'status_pemenang' },
            { data: 'action', name: 'action' }
        ]
    }
    );
});
</script>
@endpush