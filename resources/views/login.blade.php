<!DOCTYPE html>
<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Login - PekPok Coffe</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('../assets/img/pekpok/pekpok.png') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('../assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('../assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('../assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('../assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('../assets/vendor/css/pages/page-auth.css') }}" />
    <!-- Helpers -->
    <script src="{{ asset('../assets/vendor/js/helpers.js') }}"></script>

    <script src="{{ asset('../assets/js/config.js') }}"></script>
  </head>

  <body style="background-color: #000;">
    <!-- Content -->

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a href="index.html" class="app-brand-link gap-2">
                  <img src="{{ asset('../assets/img/pekpok/pekpok.png') }}" alt class="w-px-60 h-auto rounded-circle" />
                </a>
              </div>
              <!-- /Logo -->
              <h5 class="mb-2">Selamat Datang di <span class="fw-bold">PekPok Coffe</span>! 👋</h5>

              <form class="mb-3" method="POST" action="{{ route('login') }}">
                @csrf

                <div class="login-form">

                </div>
              </form>

            </div>
          </div>
          <!-- /Register -->
        </div>
      </div>
    </div>

    <!-- / Content -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js') }} -->
    <script src="{{ asset('../assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('../assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('../assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('../assets/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="{{ asset('../assets/js/main.js') }}"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <script>

        // const setCheckbox = `
        //   <div class="form-check">
        //     <input class="form-check-input js-checkbox" type="checkbox" id="remember-me" />
        //     <label class="form-check-label" for="remember-me"> Remember Me </label>
        //   </div>
        // `;

        // document.querySelector('.js-checkthebox').innerHTML = setCheckbox;

        // const jsCheckBox = document.querySelector('.js-checkbox');

        // jsCheckBox.addEventListener('click', () => {
        //   console.log('aa')
        // })

        function setEmail() {
          const getArr = JSON.parse(localStorage.getItem('email'));
          let result = '';
          let setEmail = '';
        
            if (getArr !== null && getArr[0].status === true) {
              result = 'checked';
              setEmail = getArr[0].email;
            }
      
            const setHTML = `
            <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input
                    type="text"
                    class="form-control @error('email') is-invalid @enderror js-email"
                    id="email"
                    name="email"
                    placeholder="Enter your email"
                    value="${setEmail}"
                    required
                    autocomplete="email"
                    autofocus
                  />
      
                  @error('email')
                    <div class="alert alert-danger mt-3" role="alert">{{ $message }}</div>
                  @enderror
      
                </div>
                <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Password</label>
                  </div>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password"
                      class="form-control @error('password') is-invalid @enderror"
                      name="password"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      required
                      autocomplete="current-password"
                      aria-describedby="password"
                    />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
      
                    @error('password')
                        <div class="alert alert-danger mt-3" role="alert">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="mb-3 js-checkthebox">
                <div class="form-check">
                  <input class="form-check-input js-checkbox" type="checkbox" id="remember-me" ${result} />
                  <label class="form-check-label" for="remember-me"> Remember Me </label>
                </div>
                </div>
                <div class="mb-3">
                  <button class="btn btn-primary d-grid w-100 js-button" type="submit">Sign in</button>
                </div>
            `;
  
            document.querySelector('.login-form').innerHTML = setHTML;

            const email = document.querySelector('.js-email');
            const jsBtn = document.querySelector('.js-button');
            const setArr = [];

            const jsCheckBox = document.querySelector('.js-checkbox');
            
            let setStatus = false;
            
           if (getArr !== null) {
             setStatus = getArr[0].status;
           }

            jsCheckBox.addEventListener("click", () => {
              setStatus += 1;
              
                if (setStatus % 2) {
                    setStatus = true
                } else {
                    setStatus = false
                }

                console.log(setStatus)
                
              })
            
            jsBtn.addEventListener("click", () => {

              setArr.push({
                email: email.value,
                status: setStatus
              })
          
             localStorage.setItem('email', JSON.stringify(setArr));

             if (setStatus === false) {
              localStorage.removeItem('email')
             }
              
            })
        }

        setEmail();
    </script>

  </body>
</html>
