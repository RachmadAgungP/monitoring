@extends('layouts.app')
@section('title','kelas kapasitas time charter')
@section('content')
<div class="container">
  <div class="justify-content-center">
    <div class="col-md-14">
      <a href="/jasa-time-charter" class="btn btn-primary btn-sm">Kembali </a>
      <hr>
      <div class="card">
        <div class="card-header">@yield('title')</div>

        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif

          <a href="/kelaskapasitas-time/create" class="btn btn-danger btn-sm">Input Data Baru </a>
          <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-import">Import data Excel</button>
          <div class="modal fade" id="modal-import">
            <div class="modal-dialog modal-lg">
              <form method="post" id="form-import" action="{{route('importdatakelaskapasitastime')}}" enctype="multipart/form-data" class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Import Data kelas kapasitas time charter nama file harus sama</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  {{csrf_field()}}
                  <div class="row">
                    <div class="col-md-12">
                      <p>Import data kelas kapasitas time charter sesuai format contoh berikut.<br /><a href="{{url('')}}/kelaskapasitas-time.xlsx"><i class="fas fa-download"></i> File Contoh Excel kelas kapasitas time charter</a></p>
                    </div>
                    <div class="col-md-12">
                      <label>File Excel kelas kapasitas time charter</label>
                      <input type="file" name="kelaskapasitas-time" required>
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
            <thead>
              <tr>
                <th width=70>Id kelas kapasitas</th>
                <th>Kelas Kapasitas</th>
                <th>action</th>
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
    $('#users-table').DataTable({
      processing: true,
      serverSide: true,
      "scrollY": 200,
      "scrollX": true,
      ajax: '/kelaskapasitas-time/json',
      columns: [{
          data: 'id_kelas_kapasitas',
          name: 'id_kelas_kapasitas'
        },
        {
          data: 'kelas_kapasitas',
          name: 'kelas_kapasitas'
        },
        {
          data: 'action',
          name: 'action'
        }
      ]
    });
  });
</script>
@endpush