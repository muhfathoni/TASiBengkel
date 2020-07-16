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
				<td>Tata cara Pembelian Barang</td>
			</tr>
			<tr>
				<td>1. Pembayaran dilakukan dengan metode transfer ke rekening Mandiri 1310013907474 a/n Muhammad Fathoni</td>
			</tr>
			<tr>
				<td>2. Barang akan dikirimkan setelah pembayaran sukses dilakukan</td>
			</tr>
			<tr>
				<td>3. Ketika barang dikirimkan, akan ada pemberitahuan melalui email terkait pengiriman barang</td>
			</tr>
			<tr>
				<td>4. Resi pengiriman barang akan dikirim melalui email</td>
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