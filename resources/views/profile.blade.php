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

<section>
	<div class="container">
		<div class="form-group mx-auto col-sm-12 col-md-6">
			<table class="table table-responsive col-6 mx-auto px-1 text-center">

				@foreach ($alamat as $alamats)
				<tr>
					<td>
						Nama
					</td>
					<td>
						:
					</td>
					<td>
						{{$alamats->nama_penerima}}
					</td>
				</tr>
				<tr>
					<td>
						Email
					</td>
					<td>
						:
					</td>
					<td>
						{{$alamats->alamatcustomer->email}}
					</td>
				</tr>
				<tr>
					<td>
						No Hp
					</td>
					<td>
						:
					</td>
					<td>
						{{$alamats->alamatcustomer->phone}}
					</td>
				</tr>
				<tr>
					<td>
						Alamat
					</td>
					<td>
						:
					</td>
					<td>
						{{$alamats->alamat}}
					</td>
				</tr>

				@endforeach

				@if(empty($alamats))
				<tr>
					<td colspan="3">Anda belum melengkapi data pengguna, klik 
						<a href="/alamat">Disini</a> untuk melengkapi data
					</td>
				</tr>
				@endif
			</table>
		</div>
	</div>
</section>

@endsection

@section ('css')
<link href="{{ asset ('css/creative.min.css') }}" rel="stylesheet">

@endsection

@push('script')
<script type="text/javascript">

</script>

@endpush