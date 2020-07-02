@extends('layout.main')

@section('title')
Booking
@endsection

@section('content')

<section style="background: url('img/background-mitra.jpg'); height: 300px;">
	<div class="text-center text-white" style="text-shadow: #0b0b0b 3px 3px">
		<h1 class="text-uppercase">
			<strong>Data Pembelian</strong>
		</h1>
	</div>
</section>


<section>
	<div class="container">
		<div class="form-group mx-auto col-sm-12 col-md-6">
			<table class="table table-responsive col-6 mx-auto px-1 text-center">
				<form method="POST" id="login" action="">
					{{csrf_field()}}
					<tr>
						<td colspan="3">
							Silahkan transfer ke rekening Mandiri 1310013907474 a/n Muhammad Fathoni dan kirimkan bukti transfer ke sibengkel.bandung@gmail.com
						</td>
					</tr>
					<tr>
						<td>
							Nama Penerima
						</td>
						<td>
							:
						</td>
						<td>
							<input type="text" name="namaPenerima" class="form-control">
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
							<input type="text" name="namaPenerima" class="form-control">
						</td>
						<tr>
							<td colspan="3">
								<input type="submit" name="submitAlamat" value="Submit" class="form-control btn btn-primary btn-lg active">
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

	</script>
	@endpush