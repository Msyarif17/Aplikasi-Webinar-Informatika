@extends('front-end.layout.master')
@section('content')
<section class="jumbotron py-0 mb-0 m" style="background-color: #7868E6;height: 700px; margin-top:60px; background-image:url('/img/banner.svg') ; background-size: cover;background-repeat: no-repeat;background-position:top;">
    <div class="container d-flex py-0 h-100">
        <div class="row justify-content-center align-self-center" >
            <div class="row m-0 p-0 ">
                <div class="col-12" style="color: white;font-size:48px;">
                    <b><h1 style="font-size: 70px;font-weight:1000">Webinar</h1></b>
                    <b><h1 style="font-size: 70px;font-weight:1000">Teknik Informatika</h1></b>
                </div>
            </div>
            <div class="row m-0 p-0">
                <div class="col-12" style="color: white;">
                    <p style="font-size: 28px;font-weight:1000">Tempat anda mencari informasi seputar Webinar</p>
                </div>
            </div>
            <div class="row m-0 p-0">
                <div class="col-12">
                    <a href=""><button class="btn btn-primary">
                        <p class="p-0 m-0" style="font-weight:1000">Daftar Sekarang!</p>
                    </button></a>
                </div>
            </div>
        </div>
    </div>
</section>
<img src="{{asset('img/Vector 1.svg')}}" alt="" class="w-100" style="z-index:-1;margin-top:-10px;object-fit: cover; position: absolute;">

<section class="jadwal-webinar" style="">
    <div class="container-xl" >
        <div class="row py-5">
            <b><h1 style="font-size: 48px;font-weight:1000;color: white;">Jadwal Webinar</h1></b>
        </div>
        <div class="row">
            @forelse ($webinar as $w )
            <div class="col-4 pb-3">
                <a href="{{route('webinar.detail',$w->id)}}" style="text-decoration: none">
                    <div class="card rounded-lg overflow-hidden" >
                        <img src="{{asset('storage'.$w->thumbnail)}}" class="card-img-top" alt="..." style="height: 200px;object-fit:cover;">
                        <div class="card-body">
                            <p>{{date('d-m-Y', strtotime($w->jadwal))}}</p>
                            <b><h5 class="card-title">{{$w->judul}}</h5></b>
                            <p class="card-text">{{Str::limit($w->deskripsi, 10)}}</p>
                            
                        </div>
                    </div>
                </a>
            </div>
            @empty
                <H1>DATA TIDAK DITEMUKAN</H1>
            @endforelse
               
                
        </div>
        <div class="row text-center">
            {{$webinar->links()}}
        </div>
    </div>
</section>
@endsection