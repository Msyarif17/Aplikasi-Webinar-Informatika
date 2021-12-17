@extends('layouts.dashboard')
@section('content')
<section class="content pt-4">
    <div class="row">
        <div class="col-md-4 col-sm-12 pb-4 box-size-1">
			<a href="#">
				<div class="card bg-warning text-light border-0  overflow-hidden shadow">
					<div class="card-header border-0 bg-transparent text-light text-capitalize">
						<h4 class="">Pengunjung Webiste</h4>
					</div>
					<div class="card-body">
						<div class="text-left text-light">
							<h1>{{$pengunjung->count}}</h1>
						</div>
						<div class="text-right" style="margin-top: -20px;">
							
							<i class="fa fa-eye logo-dashboard" aria-hidden="true"></i>
						</div>

					</div>
				</div>
			</a>
		</div>
        <div class="col-md-4 col-sm-12 pb-4 box-size-1">
			<a href="{{route('admin.manage-jadwal.index')}}">
				<div class="card bg-primary text-light border-0  overflow-hidden shadow">
					<div class="card-header border-0 bg-transparent text-light text-capitalize">
						<h4 class="">Jumlah Webinar</h4>
					</div>
					<div class="card-body">
						<div class="text-left text-light">
							<h1>{{$webinar}}</h1>
						</div>
						<div class="text-right" style="margin-top: -20px;">
							
							<i class="fa fa-video logo-dashboard" aria-hidden="true"></i>
						</div>
					</div>
				</div>
			</a>
		</div>
		
		<div class="col-md-4 col-sm-12 pb-4 box-size-1">
			<a href="#">
				<div class="card bg-secondary text-light border-0  overflow-hidden shadow">
					<div class="card-header border-0 bg-transparent text-light text-capitalize">
						<h4 class="">Sertifikat</h4>
					</div>
					<div class="card-body">
						<div class="text-left text-light">
							<h1>{{$sertif}}</h1>
						</div>
						<div class="text-right" style="margin-top: -20px;">
							
							<i class="fa fa-file logo-dashboard" aria-hidden="true"></i>
						</div>

					</div>
				</div>
			</a>
		</div>
        <div class="col-md-4 col-sm-12 pb-4 box-size-1">
			<a href="{{route('admin.manage-peserta.index')}}">
				<div class="card bg-dark text-light border-0  overflow-hidden shadow">
					<div class="card-header border-0 bg-transparent text-light text-capitalize">
						<h4 class="">Peserta</h4>
					</div>
					<div class="card-body">
						<div class="text-left text-light">
							<h1>{{$peserta}}</h1>
						</div>
						<div class="text-right" style="margin-top: -20px;">
							
							<i class="fa fa-users logo-dashboard" aria-hidden="true"></i>
						</div>

					</div>
				</div>
			</a>
		</div>
        
        <div class="col-md-4 col-sm-12 pb-4 box-size-1">
			<a href="{{route('admin.manage-narasumber.index')}}">
				<div class="card bg-success text-light border-0  overflow-hidden shadow">
					<div class="card-header border-0 bg-transparent text-light text-capitalize">
						<h4 class="">Narasumber</h4>
					</div>
					<div class="card-body">
						<div class="text-left text-light">
							<h1>{{$narasumber}}</h1>
						</div>
						<div class="text-right" style="margin-top: -20px;">
							
							<i class="fa fa-users logo-dashboard" aria-hidden="true"></i>
						</div>

					</div>
				</div>
			</a>
		</div>
        <div class="col-md-4 col-sm-12 pb-4 box-size-1">
			<a href="{{route('admin.manage-admin.index')}}">
				<div class="card text-light border-0  overflow-hidden shadow" style="background-color: #7868E6">
					<div class="card-header border-0 bg-transparent text-light text-capitalize">
						<h4 class="">Admin</h4>
					</div>
					<div class="card-body">
						<div class="text-left text-light">
							<h1>{{$admin}}</h1>
						</div>
						<div class="text-right" style="margin-top: -20px;">
							
							<i class="fa fa-user logo-dashboard" aria-hidden="true"></i>
						</div>

					</div>
				</div>
			</a>
		</div>
    </div>
</section>
@stop