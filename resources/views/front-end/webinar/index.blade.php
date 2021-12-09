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
        <div class="row text-center">
            <nav aria-label="Page navigation">
              <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                  <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                  </a>
                </li>
                <li class="page-item active"><a class="page-link" href="#"></a></li>
                <li class="page-item"><a class="page-link" href="#"></a></li>
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                  </a>
                </li>
              </ul>
            </nav>
        </div>
    </div>
</section>
@endsection