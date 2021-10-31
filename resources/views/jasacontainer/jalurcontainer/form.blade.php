<div class="form-group row">
    <label class="col-md-2 col-form-label text-md-right">Tarif</label>
    <div class="col-md-6">
        {{ Form::text('tarif',null,['class'=>'from-control','placeholder'=>'tarif'])}}
    </div>
</div>



@push('scripts')
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(function() {
        $('select').select2();
    });
</script>
@endpush