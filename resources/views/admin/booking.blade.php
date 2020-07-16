@extends('layouts.master')


@section('title')
Daftar Booking | Mitra SiBengkel
@endsection



@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title"> Daftar Booking</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table" id='table' >
            <thead class=" text-primary">
              <th>ID</th>
              <th>Nama</th>
              <th>Jenis Service</th>
              <th>Jadwal Booking</th>
              <th>Bukti DP</th>
              <th>Income</th>
            </thead>
            <tbody>
              @foreach ($tb_booking as $row)


              <tr>
                <td>120216{{ $row->id }}</td>
                <td>{{ $row->namabengkel->name }}</td>
                <td>{{ $row->namaservis->nama_servis }} </td>
                <td>{{ $row->jadwal }}</td>
                <td>
                  @if ($row->revenue > 0)
                  {{-- Rp{{number_format($row->revenue,2,',','.')}} --}}
                  {{$row->revenue}} 
                  @else
                  <div class="input-group mb-3">
                    <input type="number" class="form-control" placeholder="Contoh: 100000" aria-label="Income" aria-describedby="basic-addon2" id="{{ 'revenue'.$row->id }}">
                    <div class="input-group-append">
                      <button class="btn primary revenue-enter" id="{{ $row->id }}" type="button">Enter </button>
                    </div>
                  </div>
                  @endif

                  {{-- <input type="text" name="income" class="form-control">
                  <a href="#" class="btn btn-success">Add</a> --}}
                </td>
              </tr>     
              <tr>
                <td>
                  <div class="cart-img-product b-rad-4 o-f-hidden">
                    <img src="{{url($row->bukti_pembayaran)}}">
                 </div>
               </td>
             </tr>
             @endforeach
           </tbody>
         </table>
       </div>
     </div>
   </div>
 </div>
 {{-- <div class="col-md-12">
  <div class="card card-plain">
    <div class="card-header">
      <h4 class="card-title"> Pesanan Barang</h4>
      <p class="category"> Untuk Jenis Barang / Request</p>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table">
          <thead class=" text-primary">
            <th>
              Nama
            </th>
            <th>
              No HP
            </th>
            <th>
              Nama Barang
            </th>
            <th>
              Tanggal Pengambilan
            </th>
          </thead>
          <tbody>
            <tr>
              <td>
                Toni
              </td>
              <td>
                082298099134
              </td>
              <td>
                Knalpot
              </td>
              <td>
                10 Maret 2020
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div> --}}
  </div>
</div>
</div>

@endsection


@section('scripts')

<script type="text/javascript"> 

  $(document).ready(function(){
    $('#table').DataTable(); 
    $('.revenue-enter').on('click',function(){

      var id_booking = $(this).attr('id');
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')

        }   
      })
      var revenue = $('#revenue'+id_booking).val();
      $.post( "/revenue", { id_booking: id_booking, revenue: revenue })
      .done(function( data ) {
        window.location.reload();
      });
    });


  });

</script>

@endsection

