@extends('layouts.app')
@section('title','Jalur Tarip Franco')
@section('content')
<div class="container">
    <div class="justify-content-center">
        <div class="col-md-14">
        <a href="/rekap-tarip-franco" class="btn btn-primary btn-sm">Kembali </a> 
        <hr> 
            <div class="card">
                <div class="card-header">@yield('title')</div>
                <div class="card-body">
                    <a href="/jalur-taripfranco/create" class = "btn btn-danger btn-sm">Input Data Baru </a>
                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-import">Import data Excel</button>
                    <a href="/kabupaten" class = "btn btn-primary btn-sm">Kabupaten </a>
                  <div class="modal fade" id="modal-import">
            <div class="modal-dialog modal-lg">
              <form method="post" id="form-import" action="{{route('importdatajalurtaripfranco')}}" enctype="multipart/form-data" class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Import Data jalur Tarip Franco nama file harus sama</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  {{csrf_field()}}
                  <div class="row">
                    <div class="col-md-12">
                      <p>Import data jalur Tarip Franco sesuai format contoh berikut.<br /><a href="{{url('')}}/jalur-taripfranco.xlsx"><i class="fas fa-download"></i> File Contoh Excel jalur Tarip Franco</a></p>
                    </div>
                    <div class="col-md-12">
                      <label>File Excel jalur Tarip Franco</label>
                      <input type="file" name="jalur-taripfranco" required>
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
                                <th width = 70>Kode Rute</th>
                                <th>Asal</th>
                                <th>Tujuan</th>
                                <th>tarif</th>
                                <th>wilayah</th>
                                
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
        ajax: '/jalur-taripfranco/json',
        dom: '<"html5buttons">Blfrtip',
    language: {
      buttons: {
        colvis: 'show / hide', // label button show / hide
        colvisRestore: "Reset Kolom" //lael untuk reset kolom ke default
      }
    },
    buttons: [{
        extend: 'colvis',
        postfixButtons: ['colvisRestore']
      },
      {
        extend: 'csv'
      },
      // {
      //   extend: 'pdf',
      //   title: 'Contoh File PDF Datatables'
      // },
      {
        extend: 'excel',
        title: 'Contoh File Excel Datatables'
      },
      {
        extend: 'print',
        title: 'Contoh Print Datatables'
      },
    ],
        columns: [
            { data: 'kode_rute', name: 'kode_rute'},
            { data: 'asal', name: 'asal'},
            { data: 'tujuan', name: 'tujuan'},
            { data: 'tarif', name: 'tarif'},
            { data: 'wilayah', name: 'wilayah'},
            { data: 'action', name: 'action'}
        ]
    }
    );
});
</script>
@endpush