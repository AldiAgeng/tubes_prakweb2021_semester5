@extends('layouts.main')
@section('container')
<div class="container card-pembungkus mt-3">
  <div class="row isi">
    <div class="gambar">
      <img src="../img/sriasih.jpg" class="float-start" alt="">
    </div>
    <div class="col-sm-6 keterangan">
      <h1 class="fw-bold">Sri Asih</h1>
      <ul class="mt-4 fw-bold">
        <li><i class="bi bi-calendar3"></i> 05 January 2021</li>
        <!-- <li><i class="bi bi-eye"></i> 15k Views</li>
        <li><i class="bi bi-heart-fill"></i> 3,5 Likes</li> -->
      </ul>
      <p class="mt-4 mb-4">Sri Asih adalah sebuah film laga hidup pahlawan super 
      Indonesia yang disutradarai oleh Upi Avianto. Film ini 
      diadaptasi dari seri buku komik klasik Indonesia, 
      Sri Asih karya R. A. Kosasih. Film kedua dari Jagat Sinema 
      Bumilangit setelah Gundala (2019), biasanya dijadwalkan 
      rilis pada tahun 2020, tetapi ditunda hingga tahun 2022 
      karena pandemi COVID-19.</p>
      <button type="button" class="button">Read More</button>
    </div>
  </div>
</div>

<!-- Body -->
<div class="container mt-5">
<div class="row body">
  <h1 class="title">Browse by category</h1>
  <div class="col-sm-6 category mt-3">
    <button type="button" class="btn">Animated</button>
    <button type="button" class="btn">Classic</button>
    <button type="button" class="btn">Documentary</button>
    <button type="button" class="btn">Family</button>
    <button type="button" class="btn">Serial</button>
  </div>
  <div class="team-area mt-5">
    <div class="single-team">
      <img src="../img/Danurposter.jpg" alt="">
      <div class="team-text">
        <h2>Danur</h2>
        <p>Serial</p>
        <button type="button" class="button">Read More</button>
      </div>
    </div>
    <div class="single-team">
      <img src="../img/MV5BMjM2ZmJmNGQtODY4Ny00YmEwLThlNzItOTllMzk3NDEyMzFhXkEyXkFqcGdeQXVyMTAyNDYyNzcw._V1_.jpg" alt="">
      <div class="team-text">
        <h2>Kafir</h2>
        <p>Serial</p>
        <button type="button" class="button">Read More</button>
      </div>
    </div>
    <div class="single-team">
      <img src="../img/Pengabdi_Setan_poster.jpg" alt="">
      <div class="team-text">
        <h2>Pengabdi setan</h2>
        <p>Documentary</p>
        <button type="button" class="button">Read More</button>
      </div>
    </div>
  </div>
</div>
</div>

<!-- Footer -->
<div class="d-flex justify-content-center py-4 my-4 border-top">
  <p>&copy; 2021 Company, Inc. All rights reserved.</p>
</div>
@endsection