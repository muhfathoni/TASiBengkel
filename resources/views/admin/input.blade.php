@extends('layouts.master')


@section('title')
    Input
@endsection



@section('content')

<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Mitra SiBengkel </h4>
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
                          {{\Auth::user()->name}}
                        </td>
                        <td>
                          {{\Auth::user()->id}}
                        </td>
                        <td>
                          {{\Carbon\Carbon::parse(\Auth::user()->created_at)->format('d F Y')}}
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
                  

@endsection


@section('scripts')

@endsection

