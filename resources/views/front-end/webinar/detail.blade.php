@extends('front-end.layout.master')
@section('content')
<section class="detil-webinar" style="margin-top:100px;">
    <div class="container">
        <div class="row">
            <div class="col">
                @if ($message = Session::get('failed'))
                    <div class="my-4 alert alert-danger">
                        <p>{{ $message }}</p>
                    </div>
                <div class="card">
                    <div class="card-header">
                        <b><h5 style="font-size: 24px;font-weight:1000;color: #7868E6;">{{$webinar->jadwal}}</h5></b>
                        <b><h1 style="font-size: 48px;font-weight:1000;color: #7868E6;">{{$webinar->judul}}</h1></b>
                        
                    </div>
                    
                    @endif
                    <div class="card-body">
                        <img src="{{asset('storage'.$webinar->thumbnail)}}" class="card-img-top pb-4" alt="...">
                        <div class="row">
            
                            <div class="col-8">
                                <div class="card " >
                                    <div class="card-body">
                                        <b><h3>{{$webinar->judul}}</h3></b>
                                        <p>{{$webinar->deskripsi}}</p>
                                        <b><h3>Narasumber</h3></b>
                                        <p>{{$webinar->narasumber->name}}</p>
                                        <b><h3>Moderator</h3></b>
                                        <p>{{$webinar->moderator->name}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 pl-0">
                                <div class="col-12 mb-3 pr-0">
                                    <div class="card " >
                                        <div class="card-body">
                                            <b><h3>{{$webinar->judul}}</h3></b>
                                            <p>{{$webinar->deskripsi}}</p>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mt-3 pr-0">
                                    <div class="card " >
                                        
                                        <div class="card-body">
                                            <a name="" id="" class="btn btn-primary" href="{{route('reg',$webinar->id)}}" role="button">Daftar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection