
@extends('layout.main')

@section('content')

<section style="background: url('img/background-mitra.jpg'); height: 300px;">
	<div class="text-center text-white" style="text-shadow: #0b0b0b 3px 3px"
	">
	<h1 class="text-uppercase">
		<strong>Booking Service</strong>
	</h1>
</div>

<table>
	<tr>
		<th>Booked Service</th>
		<th>Nama Bengkel</th>
		<th>Jadwal</th>
		<th>Jam</th>
	</tr>

	@foreach ($booking as $booking)

	<tr>
		<td>
			{{$booking->jenis_service}}
		</td>
		<td>
			{{$booking->nama}}
		</td>
		<td>
			{{$booking->jadwal}}
		</td>
		<td>
			{{$booking->jam}}
		</td>
	</tr>

	@endforeach
</table>

<a class="nav-link js-scroll-trigger" href="/booking" style="color: #000000">Booking Now!</a>

</center>
</div>

@endsection

@section ('css')
<link href="{{ asset ('css/creative.min.css') }}" rel="stylesheet">

@endsection