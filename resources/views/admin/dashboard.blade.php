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
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Daftar Booking </h4>
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
                <div id="chart_div" style="width:100%;height:400px;"></div>
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
        var url_ajax = (year != null) ? '/dashboard/chart/'+year : '/dashboard/chart';
        $.ajax({
          url: url_ajax,
          type: 'GET',
          success: function(response) {
            if (response.length > 1) {
              var data = google.visualization.arrayToDataTable(response);

              var chart = new google.charts.Bar(document.getElementById('chart_div'));

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

