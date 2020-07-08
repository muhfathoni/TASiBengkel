@extends('layouts.master')


@section('title')
Data Customer | Mitra SiBengkel
@endsection



@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title"> Data Customer</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table" id='table' >
            <thead class=" text-primary">
              <th>Nama</th>
              <th>Email</th>
              <th>No Hp</th>
              <th>Alamat</th>
            </thead>
            <tbody>
              @foreach ($alamatpengiriman as $row)
              <tr>
                <td>{{ $row->nama_penerima }}</td>
                <td>{{ $row->alamatcustomer->email }}</td>
                <td>{{ $row->alamatcustomer->phone }} </td>
                <td>{{ $row->alamat }}</td>
              </tr>

              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>

@endsection


@section('scripts')

@endsection

