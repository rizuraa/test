@extends('layouts.app')

@section('content')
  <h3 class="mt-5">Data Pendaftaran</h3>

  <table class="table mt-3">
    <thead>
      <tr>
        <th>Nama</th>
        <th>Email</th>
        <th>Nomor HP</th>
        <th>Semester</th>
        <th>IPK</th>
        <th>Beasiswa</th>
        <th>Berkas</th>
        <th>Status Ajuan</th>
      </tr>
    </thead>
    <tbody>
      <!-- memanggil data table pendaftaran -->
      @foreach ($pendaftaran as $data)
        <tr>
          <td>{{ $data->nama }}</td>
          <td>{{ $data->email }}</td>
          <td>{{ $data->nomor_hp }}</td>
          <td>{{ $data->semester }}</td>
          <td>{{ $data->ipk }}</td>
          <td>{{ $data->beasiswa }}</td>
          <td>{{ $data->berkas }}</td>
          <td>{{ $data->status_ajuan }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
  <h3>Data Chart</h3>
  <div id="chartContainer">
    <canvas id="ipkChart"></canvas>
  </div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Mendapatkan data IPK dari variabel $pendaftaran
    var ipkData = {!! json_encode($pendaftaran->pluck('ipk')) !!};

    // Membuat objek untuk menghitung jumlah masing-masing IPK
    var ipkCount = {};
    ipkData.forEach(function(ipk) {
      ipkCount[ipk] = (ipkCount[ipk] || 0) + 1;
    });

    // Membuat array nilai IPK (sumbu X)
    var ipkLabels = Object.keys(ipkCount);

    // Membuat array jumlah yang memiliki IPK (sumbu Y)
    var ipkValues = Object.values(ipkCount);

    // Mendapatkan elemen canvas grafik
    var ipkChartCanvas = document.getElementById('ipkChart').getContext('2d');

    // Membuat objek grafik dengan Chart.js
    var ipkChart = new Chart(ipkChartCanvas, {
      type: 'bar',
      data: {
        labels: ipkLabels,
        datasets: [{
          label: 'Jumlah',
          data: ipkValues,
          backgroundColor: 'rgba(75, 192, 192, 0.8)',
          borderColor: 'rgba(75, 192, 192, 1)',
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  });
</script>
@endsection
