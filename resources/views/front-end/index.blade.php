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
<section class="jadwal" style="margin-top:-10px;background-color: #7868E6;background-image: url('/img/Vector 1.svg');background-size:cover; background-repeat:no-repeat;background-position:top left;">
    <div class="container-xl" >
        <div class="row py-5">
            <b><h1 style="font-size: 48px;font-weight:1000;color: white;">Jadwal Terbaru</h1></b>
        </div>
        <div class="row">
                <div class="col-8">
                    <div class="card rounded-lg overflow-hidden" >
                        <img src="{{asset('img/banner.svg')}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p>tanggal</p>
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="col-4 pl-0">
                    <div class="col-12 mb-3">
                        <div class="card rounded-lg overflow-hidden" >
                            <img src="{{asset('img/banner.svg')}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p>tanggal</p>
                                <h5 class="card-title">Card title</h5>
                              
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-3">
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
<section class="jadwal-webinar" style="background-color: #E4FBFF">
    <div class="container-xl" >
        <div class="row py-5">
            <b><h1 style="font-size: 48px;font-weight:1000;color: #7868E6;">Jadwal Webinar</h1></b>
        </div>
        <div class="row">
                <div class="col-4 pb-3">
                    <div class="card rounded-lg overflow-hidden" >
                        <img src="{{asset('img/banner.svg')}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p>tanggal</p>
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="col-4 pb-3">
                    <div class="card rounded-lg overflow-hidden" >
                        <img src="{{asset('img/banner.svg')}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p>tanggal</p>
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="col-4 pb-3">
                    <div class="card rounded-lg overflow-hidden" >
                        <img src="{{asset('img/banner.svg')}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p>tanggal</p>
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="col-4 pb-3">
                    <div class="card rounded-lg overflow-hidden" >
                        <img src="{{asset('img/banner.svg')}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p>tanggal</p>
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="col-4 pb-3">
                    <div class="card rounded-lg overflow-hidden" >
                        <img src="{{asset('img/banner.svg')}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p>tanggal</p>
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="col-4 pb-3">
                    <div class="card rounded-lg overflow-hidden" >
                        <img src="{{asset('img/banner.svg')}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p>tanggal</p>
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
        </div>
        <div class="row">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                  </li>
                </ul>
            </nav>
        </div>
    </div>
</section>
<section class="narasumber" style="margin-top:100px">
    <div class="container">
        <div class="row text-center">
            <b><h1 style="font-size: 48px;font-weight:1000;color: #7868E6;">Para Narasumber</h1></b>
        </div>
        <div class="row">
            <div class="col-4">
                <div class="d-flex">
                    <img src="{{asset('img/banner.svg')}}" alt="" class="img-fluid rounded-circle">
                    <h3>Syarif</h3>
                    <p class="text-secondary"></p>
                </div>
            </div>
        </div>
    </div>
</section>
@stop