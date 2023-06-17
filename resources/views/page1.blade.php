<!-- memanggil halaman app yang ada di folder layout -->
@extends('layouts.app')

<!-- konten -->
@section('content')
  <div class="mt-5">
    <h1 class="display-4">Selamat Datang!</h1>
    <p class="lead">Di halaman beasiswa</p>
    <hr class="my-4">
    <p>Di sini Anda dapat menemukan informasi tentang beasiswa akademik dan non-akademik.</p>
    <p>Pilih salah satu dari opsi di bawah ini untuk mempelajari lebih lanjut:</p>
    <div class="row">
      <div class="col-md-6">
        <h2>Beasiswa Akademik</h2>
        <p>Beasiswa Peningkatan Prestasi Akademik adalah beasiswa yang diberikan untuk peningkatan pemeratan dan kesempatan belajar bagi mahasiswa yang mengalami kesulitan membayar biaya pendidikannya sebagai akibat krisis ekonomi, terutama bagi mahasiswa yang berprestasi akademik.</p>
      </div>
      <div class="col-md-6">
        <h2>Beasiswa Non-Akademik</h2>
        <p>Beasiswa non-akademik diberikan kepada mahasiswa berdasarkan faktor-faktor non-akademik, seperti prestasi dalam bidang olahraga, seni, keterlibatan dalam kegiatan sosial, atau latar belakang kehidupan yang unik. Beasiswa ini bertujuan untuk mendukung pengembangan bakat dan minat di luar bidang akademik.</p>
      </div>
    </div>
  </div>
@endsection
