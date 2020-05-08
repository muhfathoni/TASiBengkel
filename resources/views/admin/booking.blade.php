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
          <table class="table">
            <thead class=" text-primary">
              <th>ID</th>
              <th>Nama</th>
              <th>Jenis Service</th>
              <th>Jadwal Booking</th>
              <th>Action</th>
            </thead>
            <tbody>
              @foreach ($tb_booking as $row)


              <tr>
                <td>{{ $row->id }}</td>
                <td>{{ $row->namabengkel->name }}</td>
                <td>{{ $row->namaservis->nama_servis }} </td>
                <td>{{ $row->jadwal }}</td>
                <td>
                  <a href="#" class="btn btn-danger">DELETE</a>
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

@endsection

