@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4><b>OEE Dashboard</b></h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card" style="background:#f1f0f0;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <label for="">Date Range</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <select name="" id="" class="form-control">
                                                <option value="">Select MAchine</option>
                                                <option value="">P1</option>
                                                <option value="">P2</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                       <div class="col-md-12">
                                            <button class="btn btn-primary float-right">Gernate OEE</button>
                                       </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   <div class="row mt-5">
                        <div class="col-md-4">
                                <canvas id="myChart" width="350" height="350"></canvas>
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-4">
                            <canvas id="myChart1" width="350" height="350"></canvas>
                        </div>
                   </div>
                   <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-primary float-right mt-3">Download</button>
                    </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    var data = {
      labels: ['Availability', 'Performance', 'Quality', 'OEE',],
      datasets: [{
        label: 'Values',
        backgroundColor: ['rgba(54, 162, 235)', 'rgba(75, 192, 192)', 'rgba(245, 222, 179)', 'rgba(255, 215, 0)'],
        borderColor: 'rgba(54, 162, 235, 1)',
        borderWidth: 1,
        data: [0.58, 0.63, 0.72, 0.45, 0.8, 1]
      }]
    };

    // Configuration options
    var options = {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true,
            max: 1
          },
          scaleLabel: {
            display: true,
            labelString: 'Column Value'
          }
        }]
      }
    };

    // Get the context of the canvas element we want to select
    var ctx = document.getElementById('myChart').getContext('2d');
    

    // Create the chart
    var myChart = new Chart(ctx, {
      type: 'bar',
      data: data,
      options: options
    });

    var data = {
      labels: ['Availability', 'Performance', 'Quality', 'OEE'],
      datasets: [{
        label: 'Sales',
        backgroundColor: ['rgba(54, 162, 235)', 'rgba(75, 192, 192)', 'rgba(245, 222, 179)', 'rgba(255, 215, 0)'],
        borderColor: ['rgba(54, 162, 235, 1)', 'rgba(75, 192, 192, 1)', 'rgba(245, 222, 179, 1)', 'rgba(255, 215, 0, 1)'],
        borderWidth: 1,
        data: [0.58, 0.63, 0.72, 0.45, 0.8, 1]
      }]
    };

    // Configuration options
    var options = {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true,
            callback: function(value, index, values) {
              return (value * 100) + '%'; // Convert values to percentage
            }
          }
        }]
      }
    };

    // Get the context of the canvas element we want to select
    var ctx = document.getElementById('myChart1').getContext('2d');

    // Create the chart
    var myChart = new Chart(ctx, {
      type: 'bar',
      data: data,
      options: options
    });

  </script>
@endsection