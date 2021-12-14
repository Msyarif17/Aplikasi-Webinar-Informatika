<div class="box-body">
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="form-group">
                {!! Form::label('name', 'Nama Narasumber') !!}
                {!! Form::text('name', @$narasumber->name, $errors->has('name') ? ['class' => 'form-control is-invalid'] : ['class' => 'form-control']) !!}
                {!! $errors->first('name', '<p class="help-block invalid-feedback">:message</p>') !!}
            </div>
        </div>
        <div class="col-sm-12 col-md-12">
            <div class="form-group">
                {!! Form::label('institusi', 'Institusi') !!}
                {!! Form::text('institusi', @$narasumber->institusi, $errors->has('institusi') ? ['class' => 'form-control is-invalid'] : ['class' => 'form-control']) !!}
                {!! $errors->first('institusi', '<p class="help-block invalid-feedback">:message</p>') !!} 
            </div>
        </div>
        <div class="col-sm-12 col-md-12">
            <div class="form-group">
                {!! Form::label('motivation', 'Motivasi') !!}
                {!! Form::text('motivation', @$narasumber->motivation, $errors->has('motivation') ? ['class' => 'form-control is-invalid'] : ['class' => 'form-control']) !!}
                {!! $errors->first('motivation', '<p class="help-block invalid-feedback">:message</p>') !!} 
            </div>
        </div>
        
        
    </div>
</div>
<!-- /.box-body -->

<div class="box-footer">
    {!! Form::submit(isset($narasumber) ? 'Update' : 'Save', ['class' => 'btn btn-primary btn-block', 'id' => 'save']) !!}
</div>
