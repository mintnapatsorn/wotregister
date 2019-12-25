<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
      <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.15.4/dist/bootstrap-table.min.css">
      <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

      <title>GETTING STARTED</title>

      <style>
        /*slide bar*/
        html,
          body,
          header,
          .view {
            height: 100%;
          }

          @media (max-width: 740px) {
            html,
            body,
            header,
            .view {
              height: 1000px;
            }
          }

          @media (min-width: 800px) and (max-width: 850px) {
            html,
            body,
            header,
            .view {
              height: 650px;
            }
          }
          @media (min-width: 800px) and (max-width: 850px) {
            .navbar:not(.top-nav-collapse) {
               background: #1C2331!important;
            }
          }
          /* Navbar animation */
          .navbar {
            background-color: rgba(0, 0, 0, 0.3); }

          .top-nav-collapse {
            background-color: #1C2331; }

          /* Adding color to the Navbar on mobile */
          @media only screen and (max-width: 768px) {
            .navbar {
              background-color: #1C2331; } }

          /* Footer color for sake of consistency with Navbar */
          .page-footer {
            background-color: #1C2331; }


          .mySlides {display:none}
      </style>
    </head>
    <body>
      <!-- Navbar -->
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
          <div class="container">

            <!-- Brand -->
            <a class="navbar-brand" href="{{ url('/') }}" target="_blank">
              <img src="2.png" width="48" height="35">
            </a>

            <!-- Collapse -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Links -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

              <!-- Left -->
              <ul class="navbar-nav mr-auto">
                <li class="nav-itema">
                  <a class="nav-link" style="font-size: 17px;" href="{{ url('/') }}">Home
                    <span class="sr-only">(current)</span>
                  </a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" style="font-size: 17px;" href="{{ url('/getstarted') }}">Getting started</a>
                </li>
                <li class="nav-item dropdown" style="font-size: 17px;">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" >
                    Domain
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ url('/mydomain') }}">My domain</a>
                    <a class="dropdown-item" href="{{ url('/userregisdomain') }}">Domain register</a>
                    <a class="dropdown-item" href="{{ url('/requestpermission') }}">Requested quota</a>
                  </div>
                </li>
                <li class="nav-item" style="font-size: 17px;">
                  <a class="nav-link" href="{{ url('/opendistro') }}">Data storage token</a>
                </li>
                <li class="nav-item" style="font-size: 17px;">
                  <a class="nav-link" href="{{ url('/news') }}">Contact us</a>
                </li>
                <!-- <li class="nav-item" style="font-size: 17px;">
                  <a class="nav-link" href="{{ url('/opendistro') }}">Data storage token</a>
                </li> -->
              </ul>

              <!-- Right -->
              <ul class="navbar-nav nav-flex-icons">

                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle nav-link rounded" href="#" id="navbarDropdown" target="_blank" role="button" data-toggle="dropdown" aria-haspopup="true">
                    <i class="fas fa-user mr-2"></i><?php echo session('preferred_username'); ?>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @foreach(Session::get('groups') as $groups)
                      @if($groups ==env('NAME_SPACE'))
                        <a class="dropdown-item" href="{{ url('/adminmanagement') }}">Manage system data</a>
                      @endif
                    @endforeach
                    <a class="dropdown-item" href="{{ url('/logout') }}">Logout</a>
                  </div>
                </li>

                <li class="nav-item">
                  <a href="https://www.facebook.com/" class="nav-link" target="_blank">
                    <i class="fab fa-facebook-f"></i>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="https://twitter.com/" class="nav-link" target="_blank">
                    <i class="fab fa-twitter"></i>
                  </a>
                </li>

                <li class="nav-item active">
                  <a href="https://portal.meca.in.th" class="nav-link border border-light rounded" target="_blank">
                    <img src="opendistro.png" width="20" height="20"> Data storage dashboard
                  </a>
                </li>

              </ul>

            </div>

          </div>
        </nav>
        <!-- Navbar -->

      <div class="view full-page-intro" style="background-image: url('16.jpg'); background-repeat: no-repeat; background-size: cover;">
        <br><br><br><br>
        <div class="w3-container">
          <strong><h2><font color="#F0B27A"><p align="center">Getting started with MECAs WoT Service</p></font></h2></strong>
        </div>



        <div class="w3-center">
          <button class="w3-button demo" onclick="currentDiv(1)"><font color="white">Subdomain list</font></button>
          <button class="w3-button demo" onclick="currentDiv(2)"><font color="white">Subdomain registration</font></button> 
          <button class="w3-button demo" onclick="currentDiv(3)"><font color="white">Request quota</font></button> 
          <button class="w3-button demo" onclick="currentDiv(4)"><font color="white">Data storage token</font></button> 
          <button class="w3-button demo" onclick="currentDiv(5)"><font color="white">Logout</font></button> 
        </div>
        <br>

        <div class="w3-content" style="max-width:800px">
          <a href="my domain info.png" data-size="1600x1067" target="_blank">
            <img class="mySlides" src="my domain info.png" style="width:100%">
          </a>

          <a href="domain register info.png" data-size="1600x1067" target="_blank">
            <img class="mySlides" src="domain register info.png" style="width:100%">
          </a>

          <a href="requested quota info.png" data-size="1600x1067" target="_blank">
            <img class="mySlides" src="requested quota info.png" style="width:100%">
          </a>

          <a href="data storage token management info.png" data-size="1600x1067" target="_blank">
            <img class="mySlides" src="data storage token management info.png" style="width:100%">
          </a>

          <a href="logout info.png" data-size="1600x1067" target="_blank">
            <img class="mySlides" src="logout info.png" style="width:100%">
          </a>
        </div>
      </div>

      <script>
        var slideIndex = 1;
        showDivs(slideIndex);

        function plusDivs(n) {
          showDivs(slideIndex += n);
        }

        function currentDiv(n) {
          showDivs(slideIndex = n);
        }

        function showDivs(n) {
          var i;
          var x = document.getElementsByClassName("mySlides");
          var dots = document.getElementsByClassName("demo");
          if (n > x.length) {slideIndex = 1}    
          if (n < 1) {slideIndex = x.length}
          for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";  
          }
          for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" w3-red", "");
          }
          x[slideIndex-1].style.display = "block";  
          dots[slideIndex-1].className += " w3-red";
        }
      </script>


      <!--Main layout-->
        <script>
          new WOW().init();
        </script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
        <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>

      <!-- image zoom -->
        <script type="text/javascript">
          // MDB Lightbox Init
          $(function () {
           $("#mdb-lightbox-ui").load("mdb-addons/mdb-lightbox-ui.html");
          });
        </script>
    </body>
</html>
