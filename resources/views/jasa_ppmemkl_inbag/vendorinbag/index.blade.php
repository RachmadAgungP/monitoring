@extends('layouts.app')
@section('title','vendor kapal layar')
@section('content')
<div class="container">
    <div class="justify-content-center">
        <div class="col-md-14">
        <a href="/jasa-ppmemkl-inbag" class="btn btn-primary btn-sm">Kembali </a> 
        <hr> 
            <div class="card">
                <div class="card-header">@yield('title')</div>
                
                <div class="card-body">
                   
                    <a href="/vendor-Inbag/create" class = "btn btn-danger btn-sm">Input Data Baru </a>
                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-import">Import data Excel</button>
          <div class="modal fade" id="modal-import">
            <div class="modal-dialog modal-lg">
              <form method="post" id="form-import" action="{{route('importdatavendorvoyage')}}" enctype="multipart/form-data" class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Import Data vendor kapal layar nama file harus sama</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  {{csrf_field()}}
                  <div class="row">
                    <div class="col-md-12">
                      <p>Import data vendor kapal layar sesuai format contoh berikut.<br /><a href="{{url('')}}/vendor-Inbag.xlsx"><i class="fas fa-download"></i> File Contoh Excel vendor kapal layar</a></p>
                    </div>
                    <div class="col-md-12">
                      <label>File Excel vendor kapal layar</label>
                      <input type="file" name="vendor-Inbag" required>
                    </div>
                  </div>
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
              </form>
            </div>
          </div>
                    <hr>
                    @include('alert')
                    
                    <table class="table table-bordered " id="users-table">
                            <thead >
                                <tr>
                                <th width = 70>Id vendor</th>
                                <th>Nama vendor</th>
                                <th>Keterangan vendor</th>  
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
        ajax: '/vendor-Inbag/json',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'nama_vendor', name: 'nama_vendor' },
            { data: 'keterangan_vendor', name: 'keterangan_vendor' },
            { data: 'action', name: 'action' }
        ]
    }
    );
});
</script>
@endpush