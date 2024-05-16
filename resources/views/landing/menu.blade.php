@extends('layouts.landing')

@section('hero')
    <div
      class="hero page-inner overlay"
      style="background-image: url('assets/landing/images/hero_bg_1.jpg')"
    >
      <div class="container">
        <div class="row justify-content-center align-items-center">
          <div class="col-lg-9 text-center mt-5">
            <h1 class="heading" data-aos="fade-up">Menu</h1>

            <nav
              aria-label="breadcrumb"
              data-aos="fade-up"
              data-aos-delay="200"
            >
              <ol class="breadcrumb text-center justify-content-center">
                <li class="breadcrumb-item"><a href="{{ route('landing.home') }}">Home</a></li>
                <li
                  class="breadcrumb-item active text-white-50"
                  aria-current="page"
                >
                  Menu
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
@endsection

@section('content')
  @if (Route::is('landing.menu'))
  <div class="section bg-custom">
      <div class="container">
        <div class="row mb-5 align-items-center">
          <div class="col-lg-6 text-center mx-auto">
            <h2 class="font-weight-bold text-dark heading">
              Promo
            </h2>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="property-slider-wrap">
              <div class="property-slider">
                @forelse ($getPromo as $item)
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
  @endif

<div class="container">
    <form action="{{ route('landing.search') }}" method="POST">
      @csrf
      <div class="row align-items-center mt-4">
        <div class="col-9 col-md-11">
          <select class="form-control" aria-label="Default select example" name="findcat[]" multiple style="width: 100%;">
            @if (Route::is('landing.search'))
            <?php
              $setArr = ["0" => "Makanan", "1" => "Minuman", "2" => "Best Seller"];
              $getArr = json_decode($setInputArr, true);

              $selectArr = array_diff_key($setArr, array_flip($getArr));
              $selectArr2 = array_intersect_key($setArr, array_flip($getArr));;

            ?>
            @foreach ($selectArr as $number => $cat)
            <option value="{{ $number }}">{{ $cat }}</option>
            @endforeach

            @foreach ($selectArr2 as $number => $cat)
            <option value="{{ $number }}" selected>{{ $cat }}</option>
            @endforeach
            @else
            <option value="0">Makanan</option>
            <option value="1">Minuman</option>
            <option value="2">Best Seller</option>
            @endif
          </select>
        </div>
        <div class="col-3 col-md-1">
          <button type="submit" class="btn btn-dark">Cari</button>
        </div>
      </div>

    </form>
    </div>

    <div class="section section-properties">
      <div class="container">
        <div class="row">
          @forelse ($getMenu as $item)
          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
            <div class="property-item mb-30">
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
          </div>
          @empty

          @endforelse
          

        </div>
        <div class="row align-items-center py-5">
          <div class="col-lg-3">Pagination (1 of 10)</div>
          <div class="col-lg-6 text-center">
            <div class="custom-pagination">
              <a href="#">1</a>
              <a href="#" class="active">2</a>
              <a href="#">3</a>
              <a href="#">4</a>
              <a href="#">5</a>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
      $('.form-control').select2({
        placeholder: "Pilih kategori disini", //placeholder
        tags: true,
        tokenSeparators: ['/',',',';'," "] 
      });
    });
</script>
@endpush
