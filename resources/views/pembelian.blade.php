@extends('layout.main')

@section('title')
History Pembelian Barang
@endsection

@section('content')

<section style="background: url('img/background-mitra.jpg'); height: 300px;">
	<div class="text-center text-white" style="text-shadow: #0b0b0b 3px 3px">
		<h1 class="text-uppercase">
			<strong>Pembelian Barang</strong>
		</h1>
	</div>
	<br>
	<br>


	<section>
		<div class="table-responsive">
			<div class="container"> 
				<table class="table">
					<tr>
						<td colspan="7">Silahkan cek tata cara pembayaran <a href="syaratpembelian">disini</a></td>
					</tr>
					<tr>
						<th>
							No Pembelian
						</th>
						<th>
							Tanggal Pembelian
						</th>
						<th>
							Nama barang
						</th>
						<th>
							Gambar
						</th>
						<th>
							Bukti Pembayaran
						</th>
						<th>
							
						</th>
						<th>
							Status
						</th>
						<th>
							Total
						</th>
					</tr>

					@foreach ($pembelian as $pembelians)
					<tr>
						<td>
							120216{{$pembelians->id}}
						</td>
						<td>
							{{$pembelians->created_at->format('d M y')}}
						</td>
						<td>
							{{$pembelians->dataproduk->nama}}
						</td>
						<td>
							<div class="col-lg-6 col-md-6 text-center">
								<img src="{{$pembelians->dataproduk->gambar_b}}" class="img-fluid">
							</div>
						</td>

						@if(empty($pembelians->bukti_pembayaran))
						<td>
							<form action="{{route('uploadbukti',$pembelians->id)}}" method="POST" enctype="multipart/form-data">
								{{csrf_field()}}
								<input type="file" name ='buktipembayaran' class="form-control" id="customFile">
							</td>
							<td>
								<button type="submit" class="btn btn-primary">Upload</button>
							</form>
						</td>
						@else
						<td>
							<div class="cart-img-product b-rad-4 o-f-hidden">
								<img src="{{url($pembelians->bukti_pembayaran)}}">
							</div>
						</td>
						@endif
						<td>
							{{$pembelians->status}}
						</td>
						<td>
							{!!$pembelians->totalHarga!!}
						</td>
					</tr>

					@endforeach
					
				</table>
			</div>
		</div>
	</section>
	@endsection

	@push('script')


	@endpush