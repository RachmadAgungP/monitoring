@extends('layouts.app')
@section('title','Gudang PKG ')
@section('content')
<div class="container">
  <div class="justify-content-center">
    <div class="col-md-14">
      <div class="card">
        <div class="card-header">@yield('title')</div>

        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif

          <a href="/gudang-pkg/create" class="btn btn-danger btn-sm">Input Data Baru </a>
          <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-import">Import data Excel</button>
          <div class="modal fade" id="modal-import">
            <div class="modal-dialog modal-lg">
              <form method="post" id="form-import" action="{{route('importDataGudangPKG')}}" enctype="multipart/form-data" class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Import Data Gudang PKG nama file harus sama</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  {{csrf_field()}}
                  <div class="row">
                    <div class="col-md-12">
                      <p>Import data Gudang PKG sesuai format contoh berikut.<br /><a href="{{url('')}}/gudang-pkg.xlsx"><i class="fas fa-download"></i> File Contoh Excel Gudang PKG </a></p>
                    </div>
                    <div class="col-md-12">
                      <label>File Excel Gudang PKG </label>
                      <input type="file" name="gudang-pkg" required>
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
          <a class="btn btn-primary btn-sm" href="/provinsi">Provinsi</a>
          <hr>
          <div>
            <div>
              <h4>Hari ini</h4>
              <?php

              echo now()->format('Y-m-d')
              ?>
            </div>
            <hr>
            <label><b>Filter status Category</b></label>
            <select class="form-control filter" id="filters">
              <option value="0">Pilih Status Ketegory </option>
              <option value="1">Masih Lama</option>
              <option value="2">
                < 1 tahun</option>
              <option value="3">
                < 6 bulan</option>
              <option value="4">
                < 3 bulan</option>
              <option value="5">Perlu dipantau</option>
              <select>
          </div>
          <!-- <div class="pt-2">
            <button type="submit" class=" btn btn-danger btn-sm "><i class="fas fa-plus-square"></i> Refresh Data</button>
          </div> -->
          <hr>
          <table class="table table-bordered " id="users-table">
            <thead>
              <tr>
                <th>id</th>
                <th>lokasi gudang</th>
                <th width = 65>alamat gudang</th>
                <th>provinsi</th>
                <th>nama rekanan</th>
                <th>kap GP Ton </th>
                <th>Kapasitas Anper Lain</th>
                <th>sewa Gudang Rp/bulan</th>
                <th>pengelolan Stock Rp/bulan</th>
                <th>B/M Rp/Ton </th>
                <th>rebag Rp/Ton</th>
                <th>lembur Rp/Ton</th>
                <th>restapel Rp/Ton </th>
                <th>nomor surat</th>
                <th>tgl kontrak</th>
                <th>mulai</th>
                <th>akhir</th>
                <th>jenis surat</th>
                <th>keterangan</th>
                <th>status</th>
                <th>statuscategory</th>
                <th>action</th>
              </tr>

            </thead>
            <tbody>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
  let statuscategorys = $("#filters").val()

  const table = $('#users-table').DataTable({
    processing: true,
    serverSide: true,
    // "scrollY": 200,
    "scrollX": true,
    ajax: {

      url: "/gudang-pkg/json",
      // type:"POST"
      data: function(d) {
        d.statuscategorys = statuscategorys;
        return d;
      }
    },
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
    columnDefs: [{
        targets: '_all',
        visible: true
      },
      {
        "targets": 0,
        "class": "text-nowrap",
        "render": function(data, type, row, meta) {
          return row.id;
        }
      },
      {
        "targets": 1,
        "class": "text-nowrap",
        "render": function(data, type, row, meta) {
          return row.lokasi_gudang;
        }
      },
      {
        "targets": 2,
        "class": "text-nowrap",
        "render": function(data, type, row, meta) {
          return row.alamat_gudang;
        }
      },
      {
        "targets": 3,
        "class": "text-nowrap",
        "render": function(data, type, row, meta) {
          return row.provinsi;
        }
      },
      {
        "targets": 4,
        "class": "text-nowrap",
        "render": function(data, type, row, meta) {
          return row.nama_rekanan;
        }
      },
      {
        "targets": 5,
        "class": "text-nowrap",
        "render": function(data, type, row, meta) {
          return row.kap_GP_Ton;
        }
      },
      {
        "targets": 6,
        "class": "text-nowrap",
        "render": function(data, type, row, meta) {
          return row.Kapasitas_Anper_Lain;
        }
      },
      {
        "targets": 7,
        "class": "text-nowrap",
        "render": function(data, type, row, meta) {
          return row.sewa_Gudang_Rpbulan;
        }
      },

      {
        "targets": 8,
        "class": "text-nowrap",
        "render": function(data, type, row, meta) {
          return row.pengelolan_Stock_Rpbulan;
        }
      },
      {
        "targets": 9,
        "class": "text-nowrap",
        "render": function(data, type, row, meta) {
          return row.BM_RpTon;
        }
      },
      {
        "targets": 10,
        "class": "text-nowrap",
        "render": function(data, type, row, meta) {
          return row.rebag_RpTon;
        }
      },
      {
        "targets": 11,
        "class": "text-nowrap",
        "render": function(data, type, row, meta) {
          return row.lembur_RpTon;
        }
      },
      {
        "targets": 12,
        "class": "text-nowrap",
        "render": function(data, type, row, meta) {
          return row.restapel_RpTon;
        }
      },
      {
        "targets": 13,
        "class": "text-nowrap",
        "render": function(data, type, row, meta) {
          return row.nomor_surat;
        }
      },
      {
        "targets": 14,
        "class": "text-nowrap",
        "render": function(data, type, row, meta) {
          return row.tgl_kontrak;
        }
      },
      {
        "targets": 15,
        "class": "text-nowrap",
        "render": function(data, type, row, meta) {
          return row.mulai;
        }
      },
      {
        "targets": 16,
        "class": "text-nowrap",
        "render": function(data, type, row, meta) {
          return row.akhir;
        }
      },
      {
        "targets": 17,
        "class": "text-nowrap",
        "render": function(data, type, row, meta) {
          return row.jenis_surat;
        }
      },
      {
        "targets": 18,
        "class": "text-nowrap",
        "render": function(data, type, row, meta) {
          return row.keterangan;
        }
      },
      {
        "targets": 19,
        "class": "text-nowrap",
        "render": function(data, type, row, meta) {
          return row.status;
        }
      },
      {
        "targets": 20,
        "class": "text-nowrap",
        "render": function(data, type, row, meta) {
          return row.statuscategory;
        }
      },
      {
        "targets": 21,
        "class": "text-nowrap",
        "render": function(data, type, row, meta) {
          return row.action;
        }
      },
    ]

  });


  $(function() {
    table.ajax.reload(null, false)
  })

  $(".filter").on('change', function() {
    statuscategorys = $("#filters").val()
    // console.log([tanggal])
    table.ajax.reload(null, false)
  })
</script>
@endpush