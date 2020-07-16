@extends('layout.main')

@section('title')
Booking
@endsection

@section('content')

<div class="container-fluid">
	<section style="background: url('img/background-mitra.jpg'); height: 300px;">
		<div class="text-center text-white" style="text-shadow: #0b0b0b 3px 3px"
		">
		<h1 class="text-uppercase">
			<strong>Booked Service</strong>
		</h1>
	</div>
</section>
</div>
<!-- @if(count($errors)>0)
<div class="alert alert-danger">
	<ul>
		@foreach($errors->all() as $error)
		<li>
			{{$error}}
		</li>
		@endforeach
	</ul>
</div>
@endif
@if(\Session::has('success'))
<div class="alert alert-success">
	<p>
		{{\Session::get('success') }}
	</p>
</div>
@endif -->

<center>
	<div class="">
		<div class="container"> 
			<table class="">
			<tr>
				<td>Syarat dan Ketentuan Booking</td>
			</tr>
			<tr>
				<td>1. Booking paling lambat dilakukan 2 jam sebelum waktu booking</td>
			</tr>
			<tr>
				<td>2. Uang muka wajib dibayarkan 1 jam sebelum waktu booking</td>
			</tr>
			<tr>
				<td>3. Jika tidak datang pada waktu yang ditentukan maka uang muka hangus</td>
			</tr>
			<tr>
				<td>4. Uang muka berjumlah Rp.10.000</td>
			</tr>
			<tr>
				<td>5. Agar Booking berhasil, silahkan upload bukti pembayaran uang muka pada halaman booking</td>
			</tr>
			</table>
		</div>
	</div>
</center>

@endsection

@section ('css')
<link href="{{ asset ('css/creative.min.css') }}" rel="stylesheet">

@endsection

@push('script')

@endpush