@extends('layouts.landing')

@section('hero')
    <div
      class="hero page-inner overlay"
      style="background-image: url('assets/landing/images/hero_bg_3.jpg')"
    >
      <div class="container">
        <div class="row justify-content-center align-items-center">
          <div class="col-lg-9 text-center mt-5">
            <h1 class="heading" data-aos="fade-up">About</h1>

            <nav
              aria-label="breadcrumb"
              data-aos="fade-up"
              data-aos-delay="200"
            >
              <ol class="breadcrumb text-center justify-content-center">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li
                  class="breadcrumb-item active text-white-50"
                  aria-current="page"
                >
                  About
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
@endsection

@section('content')
    <div class="section">
      <div class="container">
        <div class="row text-left mb-5">
          <div class="col-12">
            <h2 class="font-weight-bold heading text-primary mb-4">Tentang Kami</h2>
          </div>
          @forelse ($getAbout as $item)
          <div class="col-lg-6">
            <p class="text-black-50" style="text-align: justify; text-justify: inter-word;">
              {{ $item->keterangan }}
            </p>
          </div>
          <div class="col-lg-6">
            <img src="{{ url('storage/images/about/'.$item->gambar) }}" alt="Image" class="img-fluid">
          </div>
          @empty

          @endforelse
        </div>
      </div>
    </div>
@endsection