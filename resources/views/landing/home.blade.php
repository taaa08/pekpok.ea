@extends('layouts.landing')

@section('hero')
<div class="hero">
    <div class="hero-slide">
      <div
        class="img overlay"
        style="background-image: url('assets/landing/images/Kitchen.jpg')"
      ></div>
    </div>

    <div class="container">
      <div class="row justify-content-center align-items-center">
        <div class="col-lg-9 text-center">
          <h1 class="heading" data-aos="fade-up">
            Selamat Datang di PekPok Coffee!
          </h1>

          <h3 class="heading" data-aos="fade-up">
            Semoga Harimu Menyenangkan</u>
          </h3>

        </div>
      </div>
    </div>
</div>
@endsection

@section('content')
<div class="section bg-custom">
        <div class="container">
          <div class="row mb-5 align-items-center">
            <div class="col-6">
              <h2 class="font-weight-bold text-dark heading">
                Promo
              </h2>
            </div>
            <div class="col-6 text-end">
              <p>
                <a
                  href="{{ route('landing.menu') }}"
                  target="_blank"
                  class="btn btn-dark text-white py-3 px-4"
                  >Lihat Semua Promo</a
                >
              </p>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="property-slider-wrap">
                <div class="promo-slider">

                @forelse ($promo as $item)
                <div class="property-item">
                  <a href="property-single.html" class="img">
                    <img src="{{ url('storage/images/promo/'.$item->gambar) }}" alt="Image" class="img-fluid" />
                  </a>

                <div class="property-content">
                <?php
                  $firstArr = ["2"];

                  $setArr = array_intersect($firstArr, $item->kategori);
                ?>
                @if ($setArr)
                  <div class="p-1 bg-black text-white rounded-pill text-center">Best Seller &#127881;</div>
                @endif

                <span class="city d-block">{{ $item->nama }}</span>
                <div class="price mb-2"><span class="text-decoration-line-through">{{ $item->harga_before }}</span> &#8212; <span>{{ $item->harga_after }}</span></div>
                <span class="d-block mb-2 text-black">Berlaku s/d {{ $item->masa_berlaku }}</span>
                <div>
                  <span class="d-block mb-2" style="color: #878787;"
                    >{{ $item->keterangan }}</span
                  >
                </div>
                <?php
                  $firstArr = ["0", "1"];
                  $secondArr = ["0"];
                  $thirdArr = ["1"];

                  // $setArrDobuleProduct = array_intersect($firstArr, $item->kategori);
                  $setArrMakanan = array_intersect($secondArr, $item->kategori);
                  $setArrMinuman = array_intersect($thirdArr, $item->kategori);
                ?>
                  <div class="specs d-flex mb-4">
                    @if ($setArrMakanan)
                    <span class="d-block d-flex align-items-center me-3">
                      <span class="icon-restaurant me-2"></span>
                      <span class="caption">Makanan</span>
                    </span>
                    @endif
                    @if ($setArrMinuman)
                    <span class="d-block d-flex align-items-center">
                      <span class="icon-coffee me-2"></span>
                      <span class="caption">Minuman</span>
                    </span>
                    @endif
                  </div>

                  </div>

                </div>
                <!-- .item -->
                @empty

                @endforelse

                  <!-- .item -->
                </div>

                <div
                  id="promo-nav"
                  class="controls"
                  tabindex="0"
                  aria-label="Carousel Navigation"
                >
                  <span
                    class="prev"
                    data-controls="prev"
                    aria-controls="property"
                    tabindex="-1"
                    >Prev</span
                  >
                  <span
                    class="next"
                    data-controls="next"
                    aria-controls="property"
                    tabindex="-1"
                    >Next</span
                    >
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="section">
      <div class="container">
        <div class="row mb-5 align-items-center">
          <div class="col-6">
            <h2 class="font-weight-bold text-dark heading">
              Makanan
            </h2>
          </div>
          <div class="col-6 text-end">
            <p>
              <a
                href="{{ route('landing.menu') }}"
                target="_blank"
                class="btn btn-dark text-white py-3 px-4"
                >Lihat Semua Makanan</a
              >
            </p>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="property-slider-wrap">
              <div class="property-slider">

              @forelse ($makanan as $item)
              <div class="property-item">
                  <a href="property-single.html" class="img">
                    <img src="{{ url('storage/images/menu/'.$item->gambar) }}" alt="Image" class="img-fluid" />
                  </a>

                <div class="property-content">
                <?php
                  $firstArr = ["2"];

                  $setArr = array_intersect($firstArr, $item->kategori);
                ?>
                @if ($setArr)
                  <div class="p-1 bg-black text-white rounded-pill text-center">Best Seller &#127881;</div>
                @endif

                <span class="city d-block">{{ $item->nama }}</span>
                <div class="price mb-2"><span>{{ $item->harga }}</span></div>
                <div>
                  <span class="d-block mb-2" style="color: #878787;"
                    >{{ $item->keterangan }}</span
                  >
                </div>
                <?php
                  $firstArr = ["0", "1"];
                  $secondArr = ["0"];
                  $thirdArr = ["1"];

                  // $setArrDobuleProduct = array_intersect($firstArr, $item->kategori);
                  $setArrMakanan = array_intersect($secondArr, $item->kategori);
                  $setArrMinuman = array_intersect($thirdArr, $item->kategori);
                ?>
                  <div class="specs d-flex mb-4">
                    @if ($setArrMakanan)
                    <span class="d-block d-flex align-items-center me-3">
                      <span class="icon-restaurant me-2"></span>
                      <span class="caption">Makanan</span>
                    </span>
                    @endif
                    @if ($setArrMinuman)
                    <span class="d-block d-flex align-items-center">
                      <span class="icon-coffee me-2"></span>
                      <span class="caption">Minuman</span>
                    </span>
                    @endif
                  </div>

                  </div>

                </div>
                <!-- .item -->
                @empty

                @endforelse




              </div>

              <div
                id="property-nav"
                class="controls"
                tabindex="0"
                aria-label="Carousel Navigation"
              >
                <span
                  class="prev"
                  data-controls="prev"
                  aria-controls="property"
                  tabindex="-1"
                  >Prev</span
                >
                <span
                  class="next"
                  data-controls="next"
                  aria-controls="property"
                  tabindex="-1"
                  >Next</span
                >
              </div>
            </div>
          </div>
        </div>
    </div>
</div>

<div class="section bg-custom">
      <div class="container">
        <div class="row mb-5 align-items-center">
          <div class="col-6">
            <h2 class="font-weight-bold text-dark heading">
              Minuman
            </h2>
          </div>
          <div class="col-6 text-end">
            <p>
              <a
                href="{{ route('landing.menu') }}"
                target="_blank"
                class="btn btn-dark text-white py-3 px-4"
                >Lihat Semua Minuman</a
              >
            </p>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="property-slider-wrap">
              <div class="drink-slider">
              @forelse ($minuman as $item)
              <div class="property-item">
                  <a href="property-single.html" class="img">
                    <img src="{{ url('storage/images/menu/'.$item->gambar) }}" alt="Image" class="img-fluid" />
                  </a>

                <div class="property-content">
                <?php
                  $firstArr = ["2"];

                  $setArr = array_intersect($firstArr, $item->kategori);
                ?>
                @if ($setArr)
                  <div class="p-1 bg-black text-white rounded-pill text-center">Best Seller &#127881;</div>
                @endif

                <span class="city d-block">{{ $item->nama }}</span>
                <div class="price mb-2"><span>{{ $item->harga }}</span></div>
                <div>
                  <span class="d-block mb-2" style="color: #878787;"
                    >{{ $item->keterangan }}</span
                  >
                </div>
                <?php
                  $firstArr = ["0", "1"];
                  $secondArr = ["0"];
                  $thirdArr = ["1"];

                  // $setArrDobuleProduct = array_intersect($firstArr, $item->kategori);
                  $setArrMakanan = array_intersect($secondArr, $item->kategori);
                  $setArrMinuman = array_intersect($thirdArr, $item->kategori);
                ?>
                  <div class="specs d-flex mb-4">
                    @if ($setArrMakanan)
                    <span class="d-block d-flex align-items-center me-3">
                      <span class="icon-restaurant me-2"></span>
                      <span class="caption">Makanan</span>
                    </span>
                    @endif
                    @if ($setArrMinuman)
                    <span class="d-block d-flex align-items-center">
                      <span class="icon-coffee me-2"></span>
                      <span class="caption">Minuman</span>
                    </span>
                    @endif
                  </div>

                  </div>

                </div>
                <!-- .item -->
                @empty

                @endforelse

                <!-- .item -->
              </div>

              <div
                id="drink-nav"
                class="controls"
                tabindex="0"
                aria-label="Carousel Navigation"
              >
                <span
                  class="prev"
                  data-controls="prev"
                  aria-controls="property"
                  tabindex="-1"
                  >Prev</span
                >
                <span
                  class="next"
                  data-controls="next"
                  aria-controls="property"
                  tabindex="-1"
                  >Next</span
                >
              </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="section">
      <div class="container">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-lg-5">
            <h2 class="font-weight-bold heading text-dark mb-4">
              Mari Berkunjung
            </h2>
          </div>
        </div>
        <div class="row">
          <div
            class="col-lg-4 mb-5 mb-lg-0"
            data-aos="fade-up"
            data-aos-delay="100"
          >
            <div class="contact-info">
              <div class="address mt-2">
                <i class="icon-room"></i>
                <h4 class="mb-2">Location:</h4>
                <p>
                  Jl. Kp. Selang Cau, Gg Asem, Kec. Cibitung, Bekasi, Jawa Barat 17520, Bekasi 14520
                </p>
              </div>

              <div class="open-hours mt-4">
                <i class="icon-clock-o"></i>
                <h4 class="mb-2">Open Hours:</h4>
                <p>
                  Setiap Hari:<br />
                  15:00 - 24:00
                </p>
              </div>

              <div class="email mt-4">
                <i class="icon-envelope"></i>
                <h4 class="mb-2">Email:</h4>
                <p>pekpokcoffee@gmail.com</p>
              </div>

              <div class="phone mt-4">
                <i class="icon-phone"></i>
                <h4 class="mb-2">Call:</h4>
                <p>+62 899 946 4214</p>
              </div>
            </div>
          </div>
          <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
            <div class="mapouter"><div class="gmap_canvas"><iframe width="820" height="560" id="gmap_canvas" src="https://maps.google.com/maps?q=PekPok+Coffee&t=k&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.analarmclock.com/">online alarm clock</a><br><a href="https://online.stopwatch-timer.net/"></a><br><style>.mapouter{position: relative;text-align: right;height: 560px;width: 820px;}</style><a href="https://www.mapembed.net">google map net</a><style>.gmap_canvas{overflow: hidden;background: none !important;height: 450px;width: 820px;}</style></div></div>
          </div>
        </div>
    </div>
</div>

<div class="section sec-testimonials bg-custom">
      <div class="container">
        <div class="row mb-5 align-items-center">
          <div class="col-md-6">
            <h2 class="font-weight-bold heading text-dark mb-4 mb-md-0">
              Apa Kata Pengunjung Kami?
            </h2>
          </div>
          <div class="col-md-6 text-md-end">
            <div id="testimonial-nav">
              <span class="prev" data-controls="prev">Prev</span>

              <span class="next" data-controls="next">Next</span>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-4"></div>
        </div>
        <div class="testimonial-slider-wrap">
          <div class="testimonial-slider">

            @forelse ($testimoni as $item)
            <div class="item">
              <div class="testimonial">
                <img
                  src="{{ url('storage/images/testimonial/'.$item->gambar) }}"
                  alt="Image"
                  class="img-fluid rounded-circle w-25 mb-4"
                />
                <div class="rate">
                </div>
                <h3 class="h5 text-dark mb-4">{{ $item->nama }}</h3>
                <blockquote>
                  <p>
                    &ldquo;{{ $item->keterangan }}&rdquo;
                  </p>
                </blockquote>
              </div>
            </div>
            @empty

            @endforelse

        </div>
    </div>
</div>
</div>

@endsection
