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
						<th>
							Nama barang
						</th>
						<th>
							Gambar
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
							{{$pembelians->dataproduk->nama}}
						</td>
						<td>
							<div class="col-lg-6 col-md-6 text-center">
								<img src="{{$pembelians->dataproduk->gambar_b}}" class="img-fluid">
							</div>

						</td>
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