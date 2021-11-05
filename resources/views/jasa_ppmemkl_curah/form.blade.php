   <div class="form-group row">
       <label class="col-md-2 col-form-label text-md-right">Tujuan</label>
       <div class="col-md-6">
           {{ Form::select('tujuan',$tujuan,null,['class'=>'from-control selects','placeholder'=>'tujuan'])}}
       </div>
   </div>
   <div class="form-group row">
       <label class="col-md-2 col-form-label text-md-right">Tujuan</label>
       <div class="col-md-6">
           {{ Form::select('wilayah',$provinsi,null,['class'=>'from-control selects','placeholder'=>'wilayah'])}}
       </div>
   </div>
   <div class="form-group row">
       <label class="col-md-2 col-form-label text-md-right">Tarif PBM</label>
       <div class="col-md-6">
           {{ Form::number('tarif_PBM',null,['class'=>'from-control tarif_PBM','id'=>'tarif_PBM','placeholder'=>'tarif PBM'])}}
       </div>
   </div>
   <div class="form-group row">
       <label class="col-md-2 col-form-label text-md-right">Tarif EMKL</label>
       <div class="col-md-6">
           {{ Form::number('tarif_EMKL',null,['class'=>'from-control tarif_EMKL','id'=>'tarif_EMKL','placeholder'=>'tarif EMKL'])}}
       </div>
   </div>
   <div class="form-group row">
       <label class="col-md-2 col-form-label text-md-right">Total PBM EMKL</label>
       <div class="col-md-6">
           {{ Form::number('total_PBM_EMKL',null,['class'=>'from-control total','id'=>'total','readonly','placeholder'=>'total'])}}
       </div>
   </div>
   <div class="form-group row">
       <label class="col-md-2 col-form-label text-md-right">Crane</label>
       <div class="col-md-6">
           {{ Form::number('crane',null,['class'=>'from-control','placeholder'=>'Crane'])}}
       </div>
   </div>
   <div class="form-group row">
       <label class="col-md-2 col-form-label text-md-right">Vendor</label>
       <div class="col-md-6">
           {{ Form::select('pemegang_kontrak',$vendor_curah,null,['class'=>'from-control selects','placeholder'=>'pilih vendor'])}}
       </div>
   </div>

   <div class="form-group row">
       <label class="col-md-2 col-form-label text-md-right">Status Pemenang</label>
       <div class="col-md-6">
           {{ Form::select('status_pemenang',$statuspemenang,null,['class'=>'from-control selects','placeholder'=>'status pemenang'])}}
       </div>
   </div>

   <div class="form-group row">
       <label class="col-md-2 col-form-label text-md-right">Kontrak</label>
       <div class="col-md-6">
           {{ Form::text('kontrak',null,['class'=>'from-control','placeholder'=>'No Kontrak'])}}
       </div>
   </div>

   <div class="form-group row">
       <label class="col-md-2 col-form-label text-md-right">Tanggal Kontrak</label>
       <div class="col-md-6">
           {{ Form::date('tgl_kontrak',null,['class'=>'from-control','placeholder'=>'Tgl Kontrak'])}}
       </div>
   </div>

   <div class="form-group row">
       <label class="col-md-2 col-form-label text-md-right">Mulai</label>
       <div class="col-md-6">
           {{ Form::date('mulai',null,['class'=>'from-control','placeholder'=>'Mulai'])}}
       </div>
   </div>

   <div class="form-group row">
       <label class="col-md-2 col-form-label text-md-right">Akhir</label>
       <div class="col-md-6">
           {{ Form::date('akhir',null,['class'=>'from-control','placeholder'=>'Akhir'])}}
       </div>
   </div>

   <div class="form-group row">
       <label class="col-md-2 col-form-label text-md-right">Keterangan</label>
       <div class="col-md-6">
           {{ Form::text('keterangan',null,['class'=>'from-control','placeholder'=>'Keterangan'])}}
       </div>
   </div>

   <!-- @section('style')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@stop -->

   @push('scripts')
   <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
   <script>
       $(function() {
           $('select').select2();
       });
   </script>
   @endpush