@extends('front-end.layout.master')
@section('css')
<style>
    div.scrollNar {
        
        overflow: auto;
        white-space: nowrap;
    }

    div.scrollNar div.col-4{
        display: inline-block;
        
        text-align: center;
        
        text-decoration: none;
    }

    div.scrollNar div.col-4:hover {
        
    }
</style>
@stop
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
                    <a href="{{route('webinar')}}"><button class="btn btn-primary">
                        <p class="p-0 m-0" style="font-weight:1000">Daftar Sekarang!</p>
                    </button></a>
                </div>
            </div>
        </div>
    </div>
</section>
<img src="{{asset('img/Vector 1.svg')}}" alt="" class="w-100" style="z-index:-1;margin-top:-10px;object-fit: cover; position: absolute;">
<section class="jadwal" style=" ">
    <div class="container-xl" >
        <div class="row py-5" style="z-index:10000;">
            <b><h1 style=" font-size: 48px;font-weight:1000;color: white;">Jadwal Webinar</h1></b>
        </div>
        <div class="row">
            
                <div class="col-8">
                    <a href="{{route('webinar.detail',$latest[0]->id)}}"></a>
                    <div class="card rounded-lg overflow-hidden" >
                        <img src="{{asset('img/banner.svg')}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p>tanggal</p>
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            
                        </div>
                    </div>
                </div>
                <div class="col-4 pl-0">
                    <div class="col-12 mb-3 pr-0">
                        <div class="card rounded-lg overflow-hidden" >
                            <img src="{{asset('img/banner.svg')}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p>tanggal</p>
                                <h5 class="card-title">Card title</h5>
                              
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-3 pr-0">
                        <div class="card rounded-lg overflow-hidden" >
                            <img src="{{asset('img/banner.svg')}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p>tanggal</p>
                                <h5 class="card-title">Card title</h5>
                              
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</section>
<section class="jadwal-webinar" style="">
    <div class="container-xl" >
        <div class="row py-5">
            <b><h1 style="font-size: 48px;font-weight:1000;color: #7868E6;">Jadwal Webinar</h1></b>
        </div>
        <div class="row justify-content-center">
            @forelse ($webinar as $w )
            <div class="col-4 pb-3">
                <a href="{{route('webinar.detail',$w->id)}}" style="text-decoration: none">
                    <div class="card rounded-lg overflow-hidden" >
                        <img src="{{asset('storage'.$w->thumbnail)}}" class="card-img-top" alt="..." style="height: 200px;object-fit:cover;">
                        <div class="card-body">
                            <p>{{Carbon\Carbon::parse($w->jadwal)->format('l, d F Y, H:m A');}}</p>
                            <b><h5 class="card-title">{{$w->judul}}</h5></b>
                            <p class="card-text">{{Str::limit($w->deskripsi, 10)}}</p>
                            
                        </div>
                    </div>
                </a>
            </div>
            @empty
            <div class="mx-auto">
                <h1 class="text-secondary py-3 font-weight-bold text-center">Data tidak ditemukan</h1>
            </div>

            @endforelse
                
                
        </div>
        <div class="row text-center">
            <a href="{{route('webinar')}}" class="text-capitalize" style="text-decoration: none; color: #7868E6;">Lihat lebih banyak >></a>
        </div>
    </div>
</section>
<section class="narasumber" style="margin-top:100px">
    <div class="container">
        <div class="row text-center">
            <b><h1 style="font-size: 48px;font-weight:1000;color: #7868E6;">Para Narasumber</h1></b>
        </div>
        <div class="row scrollNar" style="margin-top:100px">
            <div class="owl-carousel owl-theme mt-4 loop">
                @forelse ($narasumber as $nara)
                <div class="item">
                    <div class="col m-0" >
                        <div class="my-auto">
                            <img src="{{asset('storage'.$nara->image)}}" style="width:200px;object-fit: cover;margin-left:auto;margin-right:auto;" width="200px" height="200px" alt="" class=" rounded-circle">
                        
                        </div>                        
                    </div>
                    <h3 class="text-center" >{{$nara->name}}</h3>
                    <p class="text-center">{{$nara->institusi}}</p>
                    <p class="text-center text-secondary text-italic">{{$nara->motivation}}</p>
                </div>
                @empty
                <div class="mx-auto">
                    <h1 class="text-secondary py-3 font-weight-bold text-center">Data tidak ditemukan</h1>
                </div>
                @endforelse
                
            </div>
        </div>
    </div>
</section>
@stop