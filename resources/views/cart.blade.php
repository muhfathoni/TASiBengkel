@extends('layout.main')

@section('title')
Cart
@endsection

@section('content')

<!-- Title Page -->
<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(images/heading-pages-01.jpg);">
	<h2 class="l-text2 t-center">
		Cart
	</h2>
</section>

<!-- Cart -->
<section class="cart bgwhite p-t-70 p-b-100">
	<div class="container">
		<!-- Cart item -->
		<div class="container-table-cart pos-relative">
			<div class="wrap-table-shopping-cart bgwhite">
				<table class="table-shopping-cart">
					<tr class="table-head">
						<th class="column-1"></th>
						<th class="column-2">Product</th>
						<th class="column-3">Price</th>
						<th class="column-4" colspan="2">Action</th>
					</tr>
					
					@php
					/*
					* Inisialisai variable
					* $harga (int) -> buat nampung total yang harus dibayar
					* $id_barang (array) -> buat nampung id-id barang yang mau dibayar
					*/
					$harga = 0;

					@endphp

					@foreach ($carts as $key => $cart)
						<tr class="table-row">
							<td class="column-1">
								<div class="cart-img-product b-rad-4 o-f-hidden">
									<img src="{{url($cart->produk->gambar_b)}}" alt="IMG-PRODUCT">
								</div>
							</td>
							<td class="column-2">{{$cart->produk->nama}}</td>
							<td class="column-3">Rp{{number_format($cart->produk->harga,2,',','.')}}</td>
							<td class="column-4">
								<input type="checkbox" onclick="updateTotal()" class="cb-item" value="{{$cart->produk->id}}" data-harga="{{$cart->produk->harga}}" checked>
							</td>
							<td class="column-5">
								<button class="btn btn-sm btn-danger hapus-barang" type="button" id="{{$cart->produk->id}}" onclick="deleteFunction({{$cart->produk->id}})">
									<i class="fa fa-trash" aria-hidden="true"></i> Hapus
								</button>
							</td>
						</tr>

						@php

						$harga = $cart->produk->harga + $harga;

						@endphp

					@endforeach

					<tr>
						<td class="column-1">Total</td>
						<td class="column-2" id="total-bayar">Rp{{number_format($harga,2,',','.')}}</td>
						<td class="column-3" colspan="2"><div class="size15 trans-0-4">
							<!-- Button -->
							<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" id="pay-button">
								Checkout
							</button>
						</div></td>
					</tr>

				</table>
			</div>
		</div>

		<!-- Total -->
	<!-- 	<div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
			<h5 class="m-text20 p-b-24">
				Cart Totals
			</h5>


			<div class="flex-w flex-sb-m p-b-12">
				<span class="s-text18 w-size19 w-full-sm">
					Subtotal:
				</span>

				<span class="m-text21 w-size20 w-full-sm">
					{{$harga}}
				</span>
			</div>


			<div class="flex-w flex-sb-m p-t-26 p-b-30">
				<span class="m-text22 w-size19 w-full-sm">
					Total:
				</span>

				<span class="m-text21 w-size20 w-full-sm">
					$39.00
				</span>
			</div> -->


		</div>
	</div>
</section>


<!-- Back to top -->
<div class="btn-back-to-top bg0-hov" id="myBtn">
	<span class="symbol-btn-back-to-top">
		<i class="fa fa-angle-double-up" aria-hidden="true"></i>
	</span>
</div>

<!-- Container Selection -->
<div id="dropDownSelect1"></div>
<div id="dropDownSelect2"></div>



<!--===============================================================================================-->
<script type="text/javascript" src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="vendor/bootstrap/js/popper.js"></script>
<script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="vendor/select2/select2.min.js"></script>
<script type="text/javascript">
	$(".selection-1").select2({
		minimumResultsForSearch: 20,
		dropdownParent: $('#dropDownSelect1')
	});

	$(".selection-2").select2({
		minimumResultsForSearch: 20,
		dropdownParent: $('#dropDownSelect2')
	});
</script>
<!--===============================================================================================-->

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-KnVZ_xgXBMNq9Usl"></script>
<script type="text/javascript">
	var cb = document.getElementsByClassName('cb-item');
	var formatter = new Intl.NumberFormat('id-ID', {
		style: 'currency',
		currency: 'IDR',
		});
	var total = document.getElementById('total-bayar')

	function updateTotal() {
		var harga = 0
		for (let index = 0; index < cb.length; index++) {
			if (cb[index].checked) {
				harga += parseInt(cb[index].getAttribute('data-harga'))
			}
		}
		total.innerHTML = formatter.format(harga)
	}

	document.getElementById('pay-button').onclick = function(){
		var id_barang = []
		var harga = 0
		
		for (let index = 0; index <cb.length; index++) {
			if (cb[index].checked) {
				id_barang.push(cb[index].value)
				harga = harga + parseInt(cb[index].getAttribute('data-harga'))
			}
			
		}

		if (harga > 0) {
			console.log(harga)
			$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			})

			// SnapToken acquired from previous step
			$.post('/payment', {id_barang:id_barang,harga:harga}, function(response){
				snap.pay(response);
			})
		} else {
			swal("Error", "Pilih minimal 1 (satu) barang", "warning");
		}
    };

    //hapus

	// $('.hapus-barang').on('click', function(){
	// 		swal({
	// 		title: "Are you sure?",
	// 		text: "Once deleted, you will not be able to recover this product",
	// 		icon: "warning",
	// 		buttons: true,
	// 		dangerMode: true,
	// 	})
	// 	.then((willDelete) => {
	// 		if (willDelete) {
	// 			$.get('viewcart/'+id, function(response){
	// 				swal("Your cart has been deleted!", {
	// 				icon: "success",

	// 				tr_id.fadeOut(1000, function(){
	// 					tr_id.remove;
	// 				});
	// 			});
	// 			});
	// 		} else {
	// 			swal("Your imaginary file is safe!");
	// 		}
	// 	});
	// })

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
				$.get('viewcart/'+id, function(response){
					swal("Your cart has been deleted!",{
						icon: "success", 
						buttons: true,
					})
					.then((deleted)=>{
						window.location.reload();
					});
				})
			} else {
				swal("Your cart has not been deleted");
			}
		})
	}


</script>


</body>
</html>

@endsection