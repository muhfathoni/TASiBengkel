
@extends('layout.main')

@section('title')
Produk Detail
@endsection

@section('content')


@foreach ($produk as $prod)

<div class="container bgwhite p-t-35 p-b-80">
    <div class="flex-w flex-sb">
     
        <div class="w-size14 p-t-30 respon5">
            <div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
                <img src="{{url($prod->gambar_b)}}" alt="IMG-PRODUCT">
            </div>
            <h4 class="product-detail-name m-text16 p-b-13">
             {{$prod->nama}}
         </h4>

         <span class="m-text17">
             {{$prod->harga}}
         </span>

         <div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
            <h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
                Description
                <i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
                <i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
            </h5>

            <div class="dropdown-content dis-none p-t-15 p-b-23">
                <p class="s-text8">
                    {{$prod->deskrip}}
                </p>
            </div>
        </div>
    </div>
</div>
</div>
@endforeach