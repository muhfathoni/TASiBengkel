@extends('layouts.master')


@section('title')
    Dashboard | Mitra SiBengkel
@endsection



@section('content')

<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Profile </h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        Nama Bengkel
                      </th>
                      <th>
                        ID 
                      </th>
                      <th>
                        Tanggal Join
                      </th>
                      <th>
                        Lokasi
                      </th>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          VSD
                        </td>
                        <td>
                          0001
                        </td>
                        <td>
                          17 April 2020
                        </td>
                        <td>
                          Cikoneng, Bojongsoang
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="card card-plain">
              <div class="card-header">
                <h4 class="card-title"> VSD</h4>
                <p class="category"> Mitra SiBengkel</p>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      {{-- <th>
                        Nama Item
                      </th>
                      <th>
                        No Seri
                      </th>
                      <th>
                        Jumlah
                      </th>
                      <th>
                        Tanggal Pengambilan
                      </th> --}}
                    {{-- </thead>
                    <tbody>
                      <tr>
                        <td>
                          Knalpot
                        </td>
                        <td>
                          001
                        </td>
                        <td>
                          1
                        </td>
                        <td>
                          10 Maret 2020
                        </td>
                      </tr>
                    </tbody> --}}
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection


@section('scripts')
    
@endsection

