@extends('layout.main')

@section('title')
Booking
@endsection

@section('content')

<section style="background: url('img/background-mitra.jpg'); height: 300px;">
	<div class="text-center text-white" style="text-shadow: #0b0b0b 3px 3px">
	<h1 class="text-uppercase">
		<strong>Booking Service</strong>
	</h1>
</div>

</section>
                            @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

<section>
	<div class="container">
		<div class="form-group mx-auto col-sm-12 col-md-6">
			<table class="table table-responsive col-6 mx-auto px-1 text-center">
				<form method="POST" id="login" action="{{url('bookingservice/insert')}}">
					{{csrf_field()}}
					<tr>
						<td>
							Nama Bengkel
						</td>
						<td>
							:
						</td>
						<td>
							<select id="bengkel" name="bengkel"  class="form-control">
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
							<select id="namaService" name="namaService" class="form-control">
								<option value="Ganti Oli">Nama Servis</option>
							</select>
						</td>
						<tr>
							<td>
								Harga
							</td>
							<td>
								:
							</td>
							<td id='harga' class="text-left">
							
							</td>
						</tr>
						<tr>
							<td>
								Jadwal Servis
							</td>
							<td>
								:
							</td>
							<td>
								<input type="date" name="jadwalService" class="form-control">
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
								<select id="jamService" name="jamService" class="form-control">
									<option value="09.00 - 12.00">09.00 - 12.00</option>
									<option value="12.00 - 14.00">12.00 - 14.00</option>
									<option value="14.00 - 17.00">14.00 - 17.00</option>
								</select>
							</td>
						</tr>
						<tr>
							<td colspan="3">
								<input type="submit" name="submitBooking" value="Submit" class="form-control btn btn-primary btn-lg active">
							</td>
						</tr>
						<tr>
							<td colspan="3">
								Already have booked booking slot? 
								<a href="/booking">See your booking list now!</a>
							</td>
						</tr>
				</form>
			</table>
		</div>
	</div>
</section>

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

		$('#namaService').on('click', function(){
			let id = $(this).val()

			if(id != ''){
				$.get('gethargaservcie/'+id, function(response){
					$('#harga').html(response)
				})
			}
		})
	})
</script>

@endpush