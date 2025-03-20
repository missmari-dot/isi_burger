
<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <link rel="icon" href="images/fevicon.png" type="image/gif" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>ISI BURGER</title>


  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="{{ asset('storage/assets/css/bootstrap.css') }}" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet" />

  <!-- font awesome style -->
  <link href="{{ asset('storage/assets/css/font-awesome.min.css') }}" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="{{ asset('storage/assets/css/style.css') }}" rel="stylesheet" />
  <!-- responsive style -->
  <link href="{{ asset('storage/assets/css/responsive.css') }}" rel="stylesheet" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">


</head>

<body>

  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section long_section px-0">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="index.html">
            <span>
                ISI BURGER
            </span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex mx-auto flex-column flex-lg-row align-items-center">
                <ul class="navbar-nav  ">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Accueil <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">À propos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Contact</a>
                </li>
                </ul>
            </div>
            
            <div class="quote_btn-container">
                
                <a href="{{ route('login') }}">
                    <span>
                        Se connecter
                    </span>
                    <i class="fa fa-user" aria-hidden="true"></i>
                </a>

                <a href="{{ route('register') }}">
                    <span>
                        S'inscrire
                    </span>
                </a>

                <div class="form-inline">
                    <a class="btn  my-2 my-sm-0 nav_search-btn" href="{{ route('commandes.index') }}">
                        <i class="fa-solid fa-cart-plus"></i>
                        1
                    </a>
                </div>
            </div>
            
            </div>
        </nav>
    </header>
    <!-- end header section -->

    <section class="contact_section long_section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="form_container">
                        <div class="heading_container">
                            <h2>
                                Inscription
                            </h2>
                        </div>

                        <x-guest-layout>
                          <form method="POST" action="{{ route('register') }}">
                              @csrf
                      
                              <!-- Name -->
                              <div>
                                  <x-input-label for="name" :value="__('Name')" />
                                  <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                  <x-input-error :messages="$errors->get('name')" class="mt-2" />
                              </div>
                      
                              <!-- Email Address -->
                              <div class="mt-4">
                                  <x-input-label for="email" :value="__('Email')" />
                                  <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                                  <x-input-error :messages="$errors->get('email')" class="mt-2" />
                              </div>
                      
                              <!-- Password -->
                              <div class="mt-4">
                                  <x-input-label for="password" :value="__('Password')" />
                      
                                  <x-text-input id="password" class="block mt-1 w-full"
                                                  type="password"
                                                  name="password"
                                                  required autocomplete="new-password" />
                      
                                  <x-input-error :messages="$errors->get('password')" class="mt-2" />
                              </div>
                      
                              <!-- Confirm Password -->
                              <div class="mt-4">
                                  <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                      
                                  <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                                  type="password"
                                                  name="password_confirmation" required autocomplete="new-password" />
                      
                                  <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                              </div>
                      
                              <div class="flex items-center justify-end mt-4">
                                  <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                                      {{ __('Already registered?') }}
                                  </a>
                      
                                  <x-primary-button class="ms-4">
                                      {{ __('Register') }}
                                  </x-primary-button>
                              </div>
                          </form>
                      </x-guest-layout>
                      
                    </div>
                </div>
            </div>
        </div>
    </section>
    
  <!-- info section -->
  <section class="info_section long_section">

    <div class="container">
      <div class="contact_nav">
        <a href="">
          <i class="fa fa-phone" aria-hidden="true"></i>
          <span>
            Appeler : +221 77 484 93 07
          </span>
        </a>
        <a href="">
          <i class="fa fa-envelope" aria-hidden="true"></i>
          <span>
            Email : demo@gmail.com
          </span>
        </a>
        <a href="">
          <i class="fa fa-map-marker" aria-hidden="true"></i>
          <span>
            Location
          </span>
        </a>
      </div>

      <div class="info_top ">
        <div class="row ">
          <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="info_links">
              <h4>
                QUICK LINKS
              </h4>
              <div class="info_links_menu">
                <a class="" href="index.html">Home <span class="sr-only">(current)</span></a>
                <a class="" href="about.html"> About</a>
                <a class="" href="furniture.html">Furniture</a>
                <a class="" href="blog.html">Blog</a>
                <a class="" href="contact.html">Nous Contactez</a>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3 mx-auto">
            <div class="info_post">
              <h5>
                INSTAGRAM FEEDS
              </h5>
              <div class="post_box">
                <div class="img-box">
                  <img src="images/f1.png" alt="">
                </div>
                <div class="img-box">
                  <img src="images/f2.png" alt="">
                </div>
                <div class="img-box">
                  <img src="images/f3.png" alt="">
                </div>
                <div class="img-box">
                  <img src="images/f4.png" alt="">
                </div>
                <div class="img-box">
                  <img src="images/f5.png" alt="">
                </div>
                <div class="img-box">
                  <img src="images/f6.png" alt="">
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="info_form">
              <h4>
                SIGN UP TO OUR NEWSLETTER
              </h4>
              <form action="">
                <input type="text" placeholder="Enter Your Email" />
                <button type="submit">
                  Subscribe
                </button>
              </form>
              <div class="social_box">
                <a href="">
                  <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
                <a href="">
                  <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
                <a href="">
                  <i class="fa fa-linkedin" aria-hidden="true"></i>
                </a>
                <a href="">
                  <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end info_section -->


  <!-- footer section -->
  <footer class="footer_section">
    <div class="container">
      <p>
        &copy; <span id="displayYear"></span> Tous droits reserve
        <a href="">ISI BURGER</a>
        Distribution <a href="">ThemeWagon</a>
      </p>
    </div>
  </footer>
  <!-- footer section -->


  <!-- jQery -->
  <script src="{{ asset('storage/assets/js/jquery-3.4.1.min.js') }}"></script>
  <!-- bootstrap js -->
  <script src="{{ asset('storage/assets/js/bootstrap.js') }}"></script>
  <!-- custom js -->
  <script src="{{ asset('storage/assets/js/custom.js') }}"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap"></script>
  <!-- End Google Map -->

</body>

</html>