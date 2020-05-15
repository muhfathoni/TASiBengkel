
@extends('layout.main')

@section('content')

<section style="background: url('img/background-mitra.jpg'); height: 300px;">
	<div class="text-center text-white" style="text-shadow: #0b0b0b 3px 3px"
	">
	<h1 class="text-uppercase">
		<strong>Booked Service</strong>
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


		<table>
			<tr>
				<th>Booked Service</th>
				<th>Nama Bengkel</th>
				<th>Jadwal</th>
				<th>Jam</th>
				<th>Action</th>
			</tr>
			
			@foreach ($booking as $booking)
			
			<tr>
				<td>
					{{$booking->namaservis->nama_servis}}
				</td>
				<td>
					{{$booking->namabengkel->name}}
				</td>
				<td>
					{{$booking->jadwal}}
				</td>
				<td>
					{{$booking->jam}}
				</td>
				<td>
					Delete
				</td>
			</tr>

			@endforeach
		</table>

		<section style="background: url('img/background-mitra.jpg'); height: 300px;">
			<div class="text-center text-white" style="text-shadow: #0b0b0b 3px 3px"
			">
			<h1 class="text-uppercase">
				<strong>Booking Service</strong>
			</h1>
		</div>

	</section>

	<table>
		<form method="POST" id="login" action="{{url('booking/insert')}}">
			{{csrf_field()}}
			<tr>
				<td>
					Nama Bengkel
				</td>
				<td>
					:
				</td>
				<td>
					<select id="bengkel" name="bengkel">
						<option value=''>Pilih bengkel</option>
						@foreach($bengkels as $bengkel)
						<option value="{{$bengkel->id}}">{{$bengkel->name}}</option>
						@endforeach
					</select>
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
						<option value="Ganti Oli">Nama Servis</option>
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

@endsection

@push('script')
<script type="text/javascript">
	$(document).ready(function(){
		$('#bengkel').on('click', function(){
			let id = $(this).val()

			if (id!=''){
				$.get('optionbooking/'+id, function(response){
					$('#namaService').html(response)
				})
			}
		})
	})
</script>

@endpush