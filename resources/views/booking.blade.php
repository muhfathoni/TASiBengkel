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
	<div class="table-responsive">
		<div class="container"> 
			<table class="table">
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
						<button class="btn btn-sm btn-danger hapus-barang" type="button" id="{{$booking->id}}" onclick="deleteFunction({{$booking->id}})">
							<i class="fa fa-trash" aria-hidden="true"></i> Hapus
						</button>
					</td>
				</tr>

				@endforeach
			</table>
		</div>
	</div>
</center>

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

	function deleteFunction(id){
		swal({
			title: "Are you sure?",
			text: "Once deleted, you will not be able to recover this product",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		})
		.then((willDelete) => {
			if (willDelete) {
				$.get('booking/'+id, function(response){
					swal("Your booking has been deleted!",{
						icon: "success", 
						buttons: true,
					})
					.then((deleted)=>{
						window.location.reload();
					});
				})
			} else {
				swal("Your booking has not been deleted");
			}
		})
	}
</script>

@endpush