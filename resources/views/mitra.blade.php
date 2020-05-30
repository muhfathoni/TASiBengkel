
@extends('layout.main')

@section('title')
Mitra
@endsection

@section('content')

<section style="background: url('img/background-mitra.jpg'); height: 300px;">
	<div class="text-center text-white" style="text-shadow: #0b0b0b 3px 3px">
		<h1 class="text-uppercase">
			<strong>Our Dearest Partner</strong>
		</h1>
	</div>

</section>


<div class="container">
	<div class="row">
		@foreach($inputmitra as $mitras)
		<div class="col-lg-6 col-md-6 text-center " style="padding-top: 50pt">

			<img src="{{url($mitras->gambar)}}" class="img-fluid">
		</div>
		<div class="col-lg-6 col-md-6">
			<div class="service-box mt-5 mx-auto">
				<h2> {{$mitras->nama}}</h2> <br>
				<p style="font-family: Montserrat-Regular; font-size: 15px;">
					{{$mitras->deskripsi}} 
				</p>
			</div>
		</div>
		@endforeach
	</div>
</div>

@endsection

@section ('css')
<link href="{{ asset ('css/creative.min.css') }}" rel="stylesheet">
@endsection