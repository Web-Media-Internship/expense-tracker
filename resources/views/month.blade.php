@extends('layouts.head')

@section('container')
<div class="row">
  <div class="col-xl-8 col-lg-7">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">{{ $m }} Transaction</h6>
      </div>
      <div class="card-body">
      <nav class="navbar navbar-expand navbar-light bg-light mb-4">
        <a class="navbar-brand" href="#">Monthly Data</a>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
              role="button" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false">
              Dropdown
            </a>
            <div class="dropdown-menu dropdown-menu-right animated--grow-in"
            aria-labelledby="navbarDropdown">
              @foreach($mlink as $mn)
              <div>
                <form method="POST" action="/">
                  @csrf
                  <input type="hidden" value="{{ $mn->bln }}" name="bulan">
                  <button type="submit" class="btn">{{ $mn->bln }}</button>
                </form>
              </div>
              @endforeach
            </div>
          </li>
        </ul>
      </nav>
      <hr>
      <table class="mb-3" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Name</th>
            <th>code</th>
            <th>mutation</th>
            <th>action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($trn as $post)
          <tr>
            <td>{{ $post->name }}</td>
            <td>#{{ $post->code }}</td>
            <td>
              @if($post->mutation == 1)
              income
              @else
              expense
              @endif
            </td>
            <td>
            <a href="/transaction/{{ $post->id }}" class="btn btn-secondary btn-icon-split btn-sm mb-1">
              <span class="text dark">Detail</span>
              <span class="icon text-white-50"><i class="fas fa-arrow-right"></i></span>
            </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      </div>
    </div>
  </div>

  <!-- Donut Chart -->
  <div class="col-xl-4 col-lg-5">
    <div class="card shadow mb-4">
      <!-- Card Header - Dropdown -->
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">{{ $m }} Chart</h6>
      </div>
      <!-- Card Body -->
      <div class="card-body">
        <div class="chart-pie pt-4">
          <canvas id="myPieChart"></canvas>
        </div>
        <hr>
      </div>
    </div>
  </div>
</div>


<script src="{{ asset('template/vendor/chart.js/Chart.min.js') }}"></script>


<!-- pie script -->
<script>
    // Set new default font family and font color to mimic Bootstrap's default styling
  Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
  Chart.defaults.global.defaultFontColor = '#858796';

  // Pie Chart Example
  var ctx = document.getElementById("myPieChart");
  var myPieChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: [
        @foreach($mt as $m)
          @if($m->mt == 0)
          "expense",
          @else
          "income",
          @endif
        @endforeach
      ],
      datasets: [{
        data: {!! json_encode($tl) !!},
        backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
        hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
        hoverBorderColor: "rgba(234, 236, 244, 1)",
      }],
    },
    options: {
      maintainAspectRatio: false,
      tooltips: {
        backgroundColor: "rgb(255,255,255)",
        bodyFontColor: "#858796",
        borderColor: '#dddfeb',
        borderWidth: 1,
        xPadding: 15,
        yPadding: 15,
        displayColors: false,
        caretPadding: 10,
      },
      legend: {
        display: false
      },
      cutoutPercentage: 80,
    },
  });
</script>
@endsection