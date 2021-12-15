@extends('front-end.layout.master')
@section('content')
<section class="absen" style="margin-top:100px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-6 col-md-6 ">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title text-center">
                            <h3>Absensi</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        
                        {!! Form::open(['route' => ['absen.create',$id], 'method' => 'post', 'autocomplete' => 'false','enctype'=>'multipart/form-data']) !!}
                        <div class="form-group">
                            {!! Form::label('token', 'Masukan Token') !!}
                            {!! Form::text('token', @$User->token, $errors->has('token') ? ['class' => 'form-control is-invalid'] : ['class' => 'form-control']) !!}
                            {!! $errors->first('token', '<p class="help-block invalid-feedback">:message</p>') !!}
                            
                            
                        </div>
                        {!! Form::submit('Absen', ['class' => 'btn btn-primary btn-block', 'id' => 'save']) !!}
                        {!! Form::close() !!}
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>
@endsection