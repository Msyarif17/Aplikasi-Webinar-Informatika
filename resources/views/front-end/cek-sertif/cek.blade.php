@extends('front-end.layout.master')
@section('content')
<section class="absen" style="margin-top:100px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-6 col-md-6 ">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title text-center">
                            <h3>Sertifikat {{$webinar->judul}}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="col-6">
                            <div class="card-title">
                                <h3 class="text-bold">Nama</h3>
                            </div>
                            <p class="text-secondary">{{$user->name}}</p>
                            <div class="card-title">
                                <h3 class="text-bold">Email</h3>
                            </div>
                            <p class="text-secondary">{{$user->email}}</p>
                            <div class="card-title">
                                <h3 class="text-bold">Terdaftar Pada</h3>
                            </div>
                            <p class="text-secondary">{{$regist->created_at}}</p>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>
@endsection