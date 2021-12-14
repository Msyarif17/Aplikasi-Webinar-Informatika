@extends('front-end.layout.master')
@section('content')
<section class="absen">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        {!! Form::open(['route' => 'admin.manage-jadwal.store', 'method' => 'post', 'autocomplete' => 'false','enctype'=>'multipart/form-data']) !!}
                        <div class="form-group">
                            {!! Form::label('token', 'Masukan Token') !!}
                            {!! Form::text('token', @$User->token, $errors->has('token') ? ['class' => 'form-control is-invalid'] : ['class' => 'form-control']) !!}
                            {!! $errors->first('token', '<p class="help-block invalid-feedback">:message</p>') !!}
                            {!! Form::submit('Absen', ['class' => 'btn btn-primary btn-block', 'id' => 'save']) !!}
                            
                        </div>
                        {!! Form::close() !!}
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>
@endsection