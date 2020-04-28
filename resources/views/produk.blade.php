<!-- Title Page -->

@extends('layout.main')

@section('content')


<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(images/heading-pages-02.jpg);">
	<h2 class="l-text2 t-center">
		Women
	</h2>
	<p class="m-text13 t-center">
		New Arrivals Women Collection 2018
	</p>
</section>


<!-- Content page -->
<section class="bgwhite p-t-55 p-b-65">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
				<div class="leftbar p-r-20 p-r-0-sm">
					<!--  -->
					<h4 class="m-text14 p-b-7">
						Apparel
					</a>
				</h4>

				<ul class="p-b-54">

					<li class="p-t-4">
						<a href="?f=1" class="s-text13">
							Helmet
						</a>
					</li>

					<li class="p-t-4">
						<a href="?f=2" class="s-text13">
							Jacket
						</a>
					</li>

					<li class="p-t-4">
						<a href="?f=3" class="s-text13">
							Gloves
						</a>
					</li>
				</ul>

				<h4 class="m-text14 p-b-7">
					Sparepart
				</h4>

				<ul class="p-b-54">

					<li class="p-t-4">
						<a href="?f=4" class="s-text13">
							Tires
						</a>
					</li>

					<li class="p-t-4">
						<a href="?f=9" class="s-text13">
							Lamp
						</a>
					</li>

					<li class="p-t-4">
						<a href="?f=6" class="s-text13">
							Belt
						</a>
					</li>
				</ul>

				<h4 class="m-text14 p-b-7">
					Acessoris
				</h4>

				<ul class="p-b-54">
					<li class="p-t-4">
						<a href="?f=7" class="s-text13">
							Windshield
						</a>
					</li>

					<li class="p-t-4">
						<a href="?f=8" class="s-text13">
							Exhaust
						</a>
					</li>

					<li class="p-t-4">
						<a href="?f=9" class="s-text13">
							Lamp
						</a>
					</li>
				</ul>
			</div>
		</div>

		<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">

			<!-- Product -->
			<div class="row">
				@foreach ($produk as $prod)
				<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
							<img src="{{url($prod->gambar_b)}}" alt="IMG-PRODUCT">

							<div class="block2-overlay trans-0-4">
								<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
									<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
									<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
								</a>

								<div class="block2-btn-addcart w-size1 trans-0-4">
									<!-- Button -->
									<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4 addToCart" id="{{$prod->id}}">
										Add to Cart
									</button>
								</div>
							</div>
						</div>

						<div class="block2-txt p-t-20">
							<a href="{{route('produkdetail', ['id'=>$prod->id])}}" class="block2-name dis-block s-text3 p-b-5">
								{{$prod->nama}}
							</a>

							<span class="block2-price m-text6 p-r-5">
								Rp{{number_format($prod->harga)}}
							</span>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</section>



@endsection

@push('script')

	<script type="text/javascript" src="vendor/sweetalert/sweetalert.min.js"></script>
	<script type="text/javascript">
		$('.block2-btn-addcart').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});
	</script>



<script type="text/javascript">
	$(document).ready(function(){
		// alert('test')
		$(".addToCart").on('click',function(){
			// alert('berhasil')
			let id = $(this).attr('id');
			$.get('cart/'+id, function(response){
				// alert(response.user_id)
			});
		});
	})
</script>

@endpush