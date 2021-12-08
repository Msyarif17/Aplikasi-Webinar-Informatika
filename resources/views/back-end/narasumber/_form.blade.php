<div class="box-body">
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="form-group">
                {!! Form::label('name', 'Kategori Pekerjaan') !!}
                {!! Form::text('name', @$categoryJobVacancy->name, $errors->has('name') ? ['class' => 'form-control is-invalid'] : ['class' => 'form-control']) !!}
                {!! $errors->first('name', '<p class="help-block invalid-feedback">:message</p>') !!}
            </div>
        </div>
        <div class="col-sm-12 col-md-12">
            <div class="form-group">
                {!! Form::label('logo', 'Logo Ukuran max 250px x 250px') !!}
                {!! Form::file('logo', $errors->has('logo') ? ['class'=>'form-control is-invalid','accept'=>"image/png, image/gif, image/jpeg"] : ['class'=>'form-control','accept'=>"image/png, image/gif, image/jpeg"]) !!}
                {!! $errors->first('logo', '<p class="help-block invalid-feedback">:message</p>') !!}
                @include('layouts.warning_file')
            </div>
        </div>
    </div>
</div>
<!-- /.box-body -->

<div class="box-footer">
    {!! Form::submit(isset($categoryJobVacancy) ? 'Update' : 'Save', ['class' => 'btn btn-primary btn-block', 'id' => 'save']) !!}
</div>
