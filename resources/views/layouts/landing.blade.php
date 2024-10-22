<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="{{ asset('assets/landing/images/pekpok.png') }}" />

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap5" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=EB+Garamond:ital,wght@0,400..800;1,400..800&family=Lugrasimo&family=Pacifico&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/landing/fonts/icomoon/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/landing/fonts/flaticon/font/flaticon.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/landing/css/tiny-slider.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/landing/css/aos.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/landing/css/style.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/css/select2-bootstrap-5-theme.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/select2-bootstrap-5-theme.rtl.min.css') }}" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>

    <title>
      PekPok Coffee
    </title>
  </head>
  <body>
    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close">
          <span class="icofont-close js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

    <nav class="site-nav">
      <div class="container">
        <div class="menu-bg-wrap">
          <div class="site-navigation">
            <a href="{{ route('landing.home') }}" class="logo m-0 float-start"><img src="{{ asset('assets/landing/images/pekpok.png') }}" width="60" alt="Logo PekPok" loading="lazy"></a>

            <ul
              class="js-clone-nav d-none d-lg-inline-block text-start site-menu float-end mt-2"
            >
              <li class="{{ Route::is('landing.home') ? 'active' : '' }}"><a href="{{ route('landing.home') }}">Home</a></li>
              <li class="{{ Route::is('landing.menu') ? 'active' : '' }}"><a href="{{ route('landing.menu') }}">Menu</a></li>
              <li class="{{ Route::is('landing.about') ? 'active' : '' }}"><a href="{{ route('landing.about') }}">About</a></li>
              <li class="{{ Route::is('landing.contact') ? 'active' : '' }}"><a href="{{ route('landing.contact') }}">Contact Us</a></li>
            </ul>

            <button
              class="burger light me-auto float-end mt-1 site-menu-toggle js-menu-toggle d-inline-block d-lg-none mt-3"
              data-toggle="collapse"
              data-target="#main-navbar"
              style="background-color: transparent;border: none;"
            >
              <span></span>
          </button>
          </div>
        </div>
      </div>
    </nav>

    <!-- HERO -->

    @yield('hero')

    <!-- CONTENT -->

    @yield('content')

    <div class="position-fixed bottom-0 end-0 p-3 back-to-top" style="z-index: 100;">
      <a href="https://gofood.link/u/5mmBz2" class="btn pt-0 pb-0" style="background-color: #ee2737; color: #000000">
        <img src="{{ url('assets/img/pekpok/Gofood.png') }}" alt="" width="100">
      </a>
    </div>

    <div class="position-fixed end-0 p-3 back-to-top" style="z-index: 100;bottom: 80px">
      <a href="https://wa.me/08999424214" class="btn" style="background-color: #25D366; color: #000000">
        <img src="{{ url('assets/img/pekpok/whatsapp.png') }}" alt="" width="100">
      </a>
    </div>


    <!-- FOOTER -->

    <div class="site-footer">
      <div class="container">

        <div class="text-center">
          <p style="margin-top: 1rem;">
            Copyright &copy;
            <script>
              document.write(new Date().getFullYear());
            </script>
            . All Rights Reserved. Designed with love by <a href="{{ route('landing.home') }}" class="text-decoration-none"><i class="fw-bolder">PekPok Coffe</i> ❤</a>
          </p>
        </div>

      </div>
      <!-- /.container -->
    </div>
    <!-- /.site-footer -->

    <!-- Preloader -->
    <div id="overlayer"></div>
    <div class="loader">
      <div class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>
    </div>

    <script src="{{ asset('assets/landing/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/landing/js/tiny-slider.js') }}"></script>
    <script src="{{ asset('assets/landing/js/aos.js') }}"></script>
    <script src="{{ asset('assets/landing/js/navbar.js') }}"></script>
    <script src="{{ asset('assets/landing/js/counter.js') }}"></script>
    <script src="{{ asset('assets/landing/js/custom.js') }}"></script>


    @stack('scripts')

    <script>
    $(document).ready(function() {
      $(window).scroll(function () {
        if ($(this).scrollTop() > 0) {
          $('.back-to-top').css('display', 'block');
        }
      });
    });
    </script>
    </body>
</html>
