@extends('layouts.landing')

@section('hero')
<div
      class="hero page-inner overlay"
      style="background-image: url('assets/landing/images/13.jpg')"
    >
      <div class="container">
        <div class="row justify-content-center align-items-center">
          <div class="col-lg-9 text-center mt-5">
            <h1 class="heading" data-aos="fade-up">Contact Us</h1>

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
                  Contact
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
        <div class="row">
          <div class="col-lg-6 text-center mx-auto" data-aos="fade-up" data-aos-delay="200">
            <h2 class="font-weight-bold text-dark heading">
              Hubungi Kami
            </h2>
            <p>Jika anda ingin mengirimkan kritik atau saran, silakan diisi formulir dibawah ini. Terima kasih <span class="text-danger">❤</span></p>
          </div>

          @if ($errors->any())
          <ul class="list-group list-group-numbered">
            @foreach ($errors->all() as $error)
            <li class="list-group-item alert alert-danger bg-danger text-white">{{ $error }}</li>
            @endforeach
          </ul>
          @endif

          @if(session()->has('success'))
          <div class="alert alert-success" role="alert">{{ session()->get('success') }}</div>
          @endif


          <div class="col-lg-12" data-aos="fade-up" data-aos-delay="200">
            <form action="{{ route('customercare.store') }}" method="POST">
              @csrf

              <div class="row">
                <div class="col-6 mb-3">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Your Name"
                    name="nama"
                  />
                </div>
                <div class="col-6 mb-3">
                  <input
                    type="email"
                    class="form-control"
                    placeholder="Your Email"
                    name="email"
                  />
                </div>
                <div class="col-12 mb-3">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Subject"
                    name="subjek"
                  />
                </div>
                <div class="col-12 mb-3">
                  <textarea
                    id=""
                    cols="30"
                    rows="7"
                    class="form-control"
                    placeholder="Message"
                    name="pesan"
                  ></textarea>
                </div>

                <div class="col-12 text-center">
                  <input
                    type="submit"
                    value="Send Message"
                    class="btn btn-primary"
                  />
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection
