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
            <a class="navbar-brand" href="">
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
    <!-- slider section -->
    <section class="slider_section long_section">
        <div id="customCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container ">
                <div class="row">
                    <div class="col-md-5">
                    <div class="detail-box">
                        <h1>
                        For All Your <br>
                        Furniture Needs
                        </h1>
                        <p>
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Minus quidem maiores perspiciatis, illo maxime voluptatem a itaque suscipit.
                        </p>
                        <div class="btn-box">
                        <a href="" class="btn1">
                            Nous Contactez
                        </a>
                        <a href="" class="btn2">
                            À propos
                        </a>
                        </div>
                    </div>
                    </div>
                    <div class="col-md-7">
                    <div class="img-box">
                        <img src="{{ asset('storage/images/burger01.png') }}" alt="">
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container ">
                <div class="row">
                    <div class="col-md-5">
                    <div class="detail-box">
                        <h1>
                        For All Your <br>
                        Furniture Needs
                        </h1>
                        <p>
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Minus quidem maiores perspiciatis, illo maxime voluptatem a itaque suscipit.
                        </p>
                        <div class="btn-box">
                        <a href="" class="btn1">
                            Nous Contactez
                        </a>
                        <a href="" class="btn2">
                            À propos
                        </a>
                        </div>
                    </div>
                    </div>
                    <div class="col-md-7">
                    <div class="img-box">
                        <img src="{{ asset('storage/images/burger02.png') }}" alt="">
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container ">
                <div class="row">
                    <div class="col-md-5">
                    <div class="detail-box">
                        <h1>
                        For All Your <br>
                        Furniture Needs
                        </h1>
                        <p>
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Minus quidem maiores perspiciatis, illo maxime voluptatem a itaque suscipit.
                        </p>
                        <div class="btn-box">
                        <a href="" class="btn1">
                            Nous Contactez
                        </a>
                        <a href="" class="btn2">
                            À propos
                        </a>
                        </div>
                    </div>
                    </div>
                    <div class="col-md-7">
                    <div class="img-box">
                        <img src="{{ asset('storage/images/burger03.png') }}" alt="">
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
            <ol class="carousel-indicators">
                <li data-target="#customCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#customCarousel" data-slide-to="1"></li>
                <li data-target="#customCarousel" data-slide-to="2"></li>
            </ol>
        </div>
    </section>
    <!-- end slider section -->
  </div>

  <!-- furniture section -->

    <section class="furniture_section layout_padding">
        <div class="container">
            <div class="heading_container">
                <h2>Nos Burgers</h2>
                <p>
                which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't an
                </p>
            </div>

            <form class="row" action="{{ route('commandes.store') }}" method="POST">
                @csrf
                @foreach ($burgers as $burger)
                    <div class="col-md-6 col-lg-4">
                        <div class="box">
                            <div class="img-box">
                            <img src="{{ asset('storage/'.$burger->image) }}" alt="">
                            </div>
                            <div class="detail-box">
                            <h5>
                                {{ $burger->nom }}
                                <input type="checkbox" name="burgers[]" value="{{ $burger->id }}">
                            </h5>
                            <div class="price_box">
                                <h6 class="price_heading">
                                    {{ $burger->prix }} <span>f</span>
                                </h6>
                                <div class="btn-box">
                                    <input type="number" name="quantites[{{ $burger->id }}]" class="form-input" min="1" max="{{ $burger->stock }}" value="1">

                                    <button type="submit" class="bnt-btn1">Commander</button>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            
            </form>


        </div>

    </section>

  <!-- end furniture section -->


  <!-- about section -->

  <section class="about_section layout_padding long_section">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="img-box">
            <img src="{{ asset('storage/images/burger05.png') }}" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                A propos de nous
              </h2>
            </div>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti dolorem eum consequuntur ipsam repellat dolor soluta aliquid laborum, eius odit consectetur vel quasi in quidem, eveniet ab est corporis tempore.
            </p>
            <a href="">
              Voir plus
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->

  <!-- blog section -->

  <section class="blog_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          Notre derniere blog
        </h2>
      </div>
      <div class="row">
        <div class="col-md-6 col-lg-4 mx-auto">
          <div class="box">
            <div class="img-box">
              <img src="images/b1.jpg" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Look even slightly believable. If you are
              </h5>
              <p>
                alteration in some form, by injected humour, or randomised words which don't look even slightly believable.
              </p>
              <a href="">
                Lire plus
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 mx-auto">
          <div class="box">
            <div class="img-box">
              <img src="images/b2.jpg" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Anything embarrassing hidden in the middle
              </h5>
              <p>
                alteration in some form, by injected humour, or randomised words which don't look even slightly believable.
              </p>
              <a href="">
                Lire plus
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 mx-auto">
          <div class="box">
            <div class="img-box">
              <img src="images/b3.jpg" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Molestias magni natus dolores odio commodi. Quaerat!
              </h5>
              <p>
                alteration in some form, by injected humour, or randomised words which don't look even slightly believable.
              </p>
              <a href="">
                Lire plus
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end blog section -->

  <!-- client section -->

  <section class="client_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container">
        <h2>
          Testimonial
        </h2>
      </div>
      <div id="carouselExample2Controls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="row">
              <div class="col-md-11 col-lg-10 mx-auto">
                <div class="box">
                  <div class="img-box">
                    <img src="images/client.jpg" alt="" />
                  </div>
                  <div class="detail-box">
                    <div class="name">
                      <i class="fa fa-quote-left" aria-hidden="true"></i>
                      <h6>
                        Siaalya
                      </h6>
                    </div>
                    <p>
                      Découvrez un univers de saveurs authentiques
                       avec nos burgers faits maison, préparés à partir
                       d’ingrédients frais et de qualité.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="row">
              <div class="col-md-11 col-lg-10 mx-auto">
                <div class="box">
                  <div class="img-box">
                    <img src="images/client.jpg" alt="" />
                  </div>
                  <div class="detail-box">
                    <div class="name">
                      <i class="fa fa-quote-left" aria-hidden="true"></i>
                      <h6>
                        Siaalya
                      </h6>
                    </div>
                    <p>
                      Que vous soyez amateur de recettes classiques ou
                       d’innovations gourmandes, nous avons le 
                       burger parfait pour vous ! 
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="row">
              <div class="col-md-11 col-lg-10 mx-auto">
                <div class="box">
                  <div class="img-box">
                    <img src="images/client.jpg" alt="" />
                  </div>
                  <div class="detail-box">
                    <div class="name">
                      <i class="fa fa-quote-left" aria-hidden="true"></i>
                      <h6>
                        Siaalya
                      </h6>
                    </div>
                    <p>
                       Commandez en quelques clics et savourez un délicieux repas, livré chaud et prêt à être dégusté. Chez ISI BURGER, chaque bouchée est une expérience unique. 
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel_btn-container">
          <a class="carousel-control-prev" href="#carouselExample2Controls" role="button" data-slide="prev">
            <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExample2Controls" role="button" data-slide="next">
            <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- end client section -->

  <!-- contact section -->
  <section class="contact_section  long_section">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="form_container">
            <div class="heading_container">
              <h2>
                Nous Contactez
              </h2>
            </div>
            <form action="">
              <div>
                <input type="text" placeholder="Votre nom" />
              </div>
              <div>
                <input type="text" placeholder="Téléphone" />
              </div>
              <div>
                <input type="email" placeholder="Email" />
              </div>
              <div>
                <input type="text" class="message-box" placeholder="Message" />
              </div>
              <div class="btn_box">
                <button>
                  ENVOYER
                </button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-6">
          <div class="map_container">
            <div class="map">
              <div id="googleMap"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end contact section -->

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
                Liens
              </h4>
              <div class="info_links_menu">
                <a class="" href="index.html">Acceuil <span class="sr-only">(current)</span></a>
                <a class="" href="about.html"> A propos</a>
                <a class="" href="furniture.html">Furniture</a>
                <a class="" href="blog.html">Blog</a>
                <a class="" href="contact.html">Nous Contactez</a>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3 mx-auto">
            <div class="info_post">
              <h5>
                INSTAGRAM 
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
                Rejoignez-nous
              </h4>
              <form action="">
                <input type="text" placeholder="Enter Your Email" />
                <button type="submit">
                  S'inscrire
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