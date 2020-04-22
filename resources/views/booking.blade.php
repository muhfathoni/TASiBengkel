
@extends('layout.main')

@section('content')

<section style="background: url('img/background-mitra.jpg'); height: 300px;">
	<div class="text-center text-white" style="text-shadow: #0b0b0b 3px 3px"
	">
	<h1 class="text-uppercase">
		<strong>Booking Service</strong>
	</h1>
</div>

</section>

	@if(count($errors)>0)
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
	@endif

<center>
	<div class="container-mitra"> 
		<table style="padding-top:100pt;">
			<form method="POST" class="register-form" id="login" action="{{url('booking/insert')}}">
				{{csrf_field()}}
				<tr>
					<td>
						Nama Bengkel
					</td>
					<td>
						:
					</td>
					<td>
						<input type="text" placeholder="Nama Bengkel" name="namaBengkel">
					</td>
				</tr>
				<tr>
					<td>
						Jenis Service
					</td>
					<td>
						:
					</td>
					<td>
						<!-- <input type="text" placeholder="   Nama Service" name="namaService"> -->
						<select id="namaService" name="namaService">
							<option value="Ganti Oli">Ganti Oli</option>
							<option value="Servis Rutin">Servis Rutin</option>
							<option value="Servis Lainnya">Servis Lainnya</option>
						</select>
					</td>
					<tr>
						<td>
							Jadwal Servis
						</td>
						<td>
							:
						</td>
						<td>
							<!-- <input type="text" placeholder="   Jadwal Service" name="jadwalService"> -->
						<!-- 	<input id="datepicker" name="jadwalService" width="276" />
							<script>
								$('#datepicker').datepicker({
									uiLibrary: 'bootstrap4'
								});
							</script> -->
							<input type="date" name="jadwalService">
						</td>
					</tr>
					<tr>
						<td>
							Jam Booking
						</td>
						<td>
							:
						</td>
						<td>
							<select id="jamService" name="jamService">
								<option value="09.00 - 12.00">09.00 - 12.00</option>
								<option value="12.00 - 14.00">12.00 - 14.00</option>
								<option value="14.00 - 17.00">14.00 - 17.00</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							<input type="submit" name="submitBooking" value="Submit">
						</td>
					</tr>
				</tr>
			</form>
		</table>
	</center>
</div>

@endsection

@section ('css')
<link href="{{ asset ('css/creative.min.css') }}" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
@endsection