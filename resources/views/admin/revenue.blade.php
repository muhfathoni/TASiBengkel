@extends('layouts.master')


@section('title')
    Revenue | Mitra SiBengkel
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
         {{-- @if (\Auth::user()->usertype == 'superadmin') 
          <div class="col-md-12 mb-3">
            <div class="card">
              testestes
            </div>
          </div>
          @endif --}}
          
          <div class="col-md-12">
            <div class="card-deck mb-3">
              <div class="card">
                <div class="card-body text-center">
                  <h5>Total Pendapatan</h5>
                  <h5 class="font-weight-bold">Rp{{number_format($total_pendapatan,2,',','.')}}</h5>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Pendapatan </h4>
              </div>
              <div class="card-body">
                <div class="form-group mb-5">
                  <select id="filter-year" class="form-control">
                    <option value="">Semua</option>
                    @foreach ($tahun as $key => $value)
                      <option value="{{$value}}">{{$value}}</option>
                    @endforeach
                  </select>
                </div>
                <div id="chart_div" style="width:100%;height:200px;"></div>
              </div>
            </div>
          </div>
        </div>
        
        <!--Div that will hold the dashboard-->
    {{-- <div id="dashboard_div">
      <!--Divs that will hold each control and chart-->
      <div id="filter_div"></div>
      <div id="chart_div"></div>
    </div> --}}

@endsection


@section('scripts')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript"> 
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart(year) {
        var url_ajax = (year != null) ? '/revenue/chart/'+year : '/revenue/chart';
        $.ajax({
          url: url_ajax,
          type: 'GET',
          success: function(response) {
            if (response.length > 1) {
              var data = google.visualization.arrayToDataTable(response);

              var chart = new google.charts.Bar(document.getElementById('chart_div'));

              // var options = {}

              chart.draw(data);
            } else {
              var el = document.getElementById('chart_div')
              el.innerHTML = "No Data"
            }
            

            
          },
          error: function(){
            alert("Terjadi kesalahan saat mengambil data\nSilahkan coba beberapa saat lagi atau kontak penyelia situs")
          }
        })
        
      }

      $(document).ready(function(){
        $('#filter-year').on('click', function(){
          var year = $(this).val()
          if (year != '') {
            drawChart(year)
          } else {
            drawChart()
          }
        });
      });
    </script>
@endsection

