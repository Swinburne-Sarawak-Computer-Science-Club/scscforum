<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SCSC Forum</title>

         <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

 <!-- Google Fonts -->
 <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">

<!-- Bootstrap CSS File -->
<link href="/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Libraries CSS Files -->
<link href="/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link href="/lib/animate/animate.min.css" rel="stylesheet">
<link href="/lib/venobox/venobox.css" rel="stylesheet">
<link href="/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
<style>img[alt="www.000webhost.com"]{display:none;}</style>

<!-- Main Stylesheet File -->
<link href="/css/style.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="/css/style3.css" />

</head>

<body>
         
  

  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <!-- Uncomment below if you prefer to use a text logo -->
        <!-- <h1><a href="#main">C<span>o</span>nf</a></h1>-->
        <a href="http://scscsarawak.ml/" target="_blank"><img src="img/logo.png" alt="" title=""></a>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
            @if (Route::has('login'))
                
                    @auth
                    <li class="menu-active"><a href="{{ url('/forum') }}">Home</a></li>

                    @else
                    <li><a href="{{ route('login') }}">Login</a></li>

                    @if (Route::has('register'))
                    <li class="register"><a href="{{ route('register') }}">Register Now</a></li>
                    @endif
                    
                @endauth
               
            @endif
       
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  
  <!--==========================
    Intro Section
  ============================-->

  <section id="intro">

  <ul class="cb-slideshow">
      <li><span>Image 01</span></li>
      <li><span>Image 02</span></li>
      <li><span>Image 03</span></li>
    </ul>

    <div class="intro-container">

    
    <h1 class="mb-4 pb-0"> SCSC Forum  </h1><span style="color:#fff;">Beta Version 1.0.2</span>
   
    <p>
      <div class="typewrite" style="color:#fff; text-decoration: none; font-size: 30px;" data-period="2000 " data-type='[ "A place where Swinburne CS students meet and discuss.", "Sign up now!", "Observe the rules and regulation when login.", "Post any academic related question you like." ]'>
      <span class="wrap"></span>
      </div>
    </p>

        <div class="links">
          
            <a href="{{ route('social.auth', ['provider'=>'github']) }}"><i class="fa fa-github	fa-4x text-white"></i></a> &nbsp;  &nbsp;
            <a href="{{ route('social.auth', ['provider'=>'facebook']) }}"><i class="fa fa-facebook-official text-white  fa-4x"></i></a>  &nbsp;  &nbsp;
            <a href="/login"><i class="fa fa-envelope  text-white fa-4x"></i></a>

    </div>

      
 

</div>
  </section>    


      
   <!-- JavaScript Libraries -->
   <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/venobox/venobox.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>


  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>
  <script type="text/javascript" src="js/modernizr.custom.86080.js"></script>

  <script>

var TxtType = function(el, toRotate, period) {
        this.toRotate = toRotate;
        this.el = el;
        this.loopNum = 0;
        this.period = parseInt(period, 10) || 2000;
        this.txt = '';
        this.tick();
        this.isDeleting = false;
    };

    TxtType.prototype.tick = function() {
        var i = this.loopNum % this.toRotate.length;
        var fullTxt = this.toRotate[i];

        if (this.isDeleting) {
        this.txt = fullTxt.substring(0, this.txt.length - 1);
        } else {
        this.txt = fullTxt.substring(0, this.txt.length + 1);
        }

        this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';

        var that = this;
        var delta = 200 - Math.random() * 100;

        if (this.isDeleting) { delta /= 2; }

        if (!this.isDeleting && this.txt === fullTxt) {
        delta = this.period;
        this.isDeleting = true;
        } else if (this.isDeleting && this.txt === '') {
        this.isDeleting = false;
        this.loopNum++;
        delta = 500;
        }

        setTimeout(function() {
        that.tick();
        }, delta);
    };

    window.onload = function() {
        var elements = document.getElementsByClassName('typewrite');
        for (var i=0; i<elements.length; i++) {
            var toRotate = elements[i].getAttribute('data-type');
            var period = elements[i].getAttribute('data-period');
            if (toRotate) {
              new TxtType(elements[i], JSON.parse(toRotate), period);
            }
        }
        // INJECT CSS
        var css = document.createElement("style");
        css.type = "text/css";
        css.innerHTML = ".typewrite > .wrap { border-right: 0.2em solid #fff}";
        document.body.appendChild(css);
    };


  </script>

</html>
