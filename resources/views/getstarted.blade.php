<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.15.4/dist/bootstrap-table.min.css">
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

        <!-- silide getstarted -->
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

        <title>GETTING STARTED</title>

        <!-- Styles -->
        <style>
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
                    @foreach(Session::get('roles') as $roles)
                      @if($roles ==env('NAME_SPACE'))
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

        <!-- Full Page Intro -->
        <div class="view full-page-intro" style="background-image: url('5.jpg'); background-repeat: no-repeat; background-size: cover;">
          <!-- Mask & flexbox options-->
          <div class="mask rgba-black-light d-flex justify-content-center align-items-center">
            <!-- Content -->
            <div class="container">
              <!--Grid row-->
              <div class="row wow fadeIn">
                 <!--Grid column-->
                <div class="col-md-12 mb-4 text-dark text-center text-md-center">
                  <br><br><br><br>

                  <strong><h2><font style="color:darkred"><p align="center">Getting started with MECAs WoT Service</p></font></h2></strong>
                  <hr class="hr-light">

                  <!--Accordion wrapper-->
                  <div class="accordion md-accordion accordion-1" id="accordionEx23" role="tablist">

                    <div class="card">
                      <div class="card-header blue lighten-3 z-depth-1" role="tab" id="heading96">
                        <h5 class="text-uppercase mb-0 py-1">
                          <a class="text-info font-weight-bold" data-toggle="collapse" href="#collapse96" aria-expanded="true"
                            aria-controls="collapse96">
                            Subdomain registration
                          </a>
                        </h5>
                      </div>
                      <div id="collapse96" class="collapse show" role="tabpanel" aria-labelledby="heading96"
                        data-parent="#accordionEx23">
                        <div class="card-body">
                          <div class="row my-4">
                            <div class="col-md-7">
                              <h2 class="font-weight-bold mb-3 black-text">Domain register</h2>
                              <p class="text-md-left">1. Click the "Domain register" dropdown then select "Domain register" menu. <br>2. Domain register page will show on the screen.<br>3. Please enter the following data for domain registration.<br>
                              &emsp;3.1 Enter your subdomain name in name textbox (number 3.1).<br>
                              &emsp;Note : <br>
                              &emsp;&emsp;- Please input only subdomain name.<br>
                              &emsp;&emsp;- Subdomain must be unique.<br>
                              &emsp;&emsp;- Can't be leave blank.<br>
                              &emsp;3.2 Enter description in the description textbox (number 3.2).<br>
                              &emsp;3.3 Select relay server nearest to your area.<br>
                              &emsp;3.4 Verify all filed then click "Register" button.<br></p>
                              <p class="mb-0"></p>
                            </div>
                            <div class="col-md-5 mt-3 pt-2">
                              <div class="view z-depth-1">
                                <br>
                                <a href="domain register.png" data-size="1600x1067" target="_blank">
                                <img src="domain register.png" alt="placeholder" class="img-fluid" />
                                <br><br>
                                <button class="btn btn-danger"><i class="fas fa-search-plus"> Zoomin</i></button>
                                </a> 
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="card">
                      <div class="card-header blue lighten-3 z-depth-1" role="tab" id="heading97">
                        <h5 class="text-uppercase mb-0 py-1">
                          <a class="collapsed font-weight-bold text-info" data-toggle="collapse" href="#collapse97"
                            aria-expanded="false" aria-controls="collapse97">
                            Show all of your subdomain list
                          </a>
                        </h5>
                      </div>
                      <div id="collapse97" class="collapse" role="tabpanel" aria-labelledby="heading97"
                        data-parent="#accordionEx23">
                        <div class="card-body">
                          <div class="row my-4">
                            <div class="col-md-7">
                              <h2 class="font-weight-bold mb-3 black-text">My domain</h2>
                              <p class="">"My domain" is the page to show all of your domains that you have registered.</p>
                            </div>
                            <div class="col-md-5 mt-3 pt-2">
                              <div class="view z-depth-1">
                                <br>
                                <a href="mydomain.png" data-size="1600x1067" target="_blank">
                                <img src="mydomain.png" alt="placeholder" class="img-fluid" />
                                <br><br>
                                <button class="btn btn-danger"><i class="fas fa-search-plus"> Zoomin</i></button>
                                </a> 
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="card">
                      <div class="card-header blue lighten-3 z-depth-1" role="tab" id="heading98">
                        <h5 class="text-uppercase mb-0 py-1">
                          <a class="collapsed font-weight-bold text-info" data-toggle="collapse" href="#collapse98"
                            aria-expanded="false" aria-controls="collapse98">
                            Request quota for subdomain registration
                          </a>
                        </h5>
                      </div>
                      <div id="collapse98" class="collapse" role="tabpanel" aria-labelledby="heading98"
                        data-parent="#accordionEx23">
                        <div class="card-body">
                          <div class="row my-4">
                            <div class="col-md-7">
                              <h2 class="font-weight-bold mb-3 black-text">Request quota</h2>
                              <p class="text-md-left">This page you can request more domain quota.<br>
                                        &emsp;1. At navigation bar click "Quota" then select "Request more quota".<br>
                                        &emsp;2. Inout quota amount on textbox then click on "Send request" to request more quota amount.<br>
                                        &emsp;3. You can check used quota and all of quota amount by circle bar right side.</p>
                            </div>
                            <div class="col-md-5 mt-3 pt-2">
                              <div class="view z-depth-1">
                                <br>
                                <a href="requestquota.png" data-size="1600x1067" target="_blank">
                                <img src="requestquota.png" alt="placeholder" class="img-fluid" />
                                <br><br>
                                <button class="btn btn-danger"><i class="fas fa-search-plus"> Zoomin</i></button>
                                </a> 
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="card">
                      <div class="card-header blue lighten-3 z-depth-1" role="tab" id="heading99">
                        <h5 class="text-uppercase mb-0 py-1">
                          <a class="collapsed font-weight-bold text-info" data-toggle="collapse" href="#collapse99"
                            aria-expanded="false" aria-controls="collapse98">
                            How to checking all of your request
                          </a>
                        </h5>
                      </div>
                      <div id="collapse99" class="collapse" role="tabpanel" aria-labelledby="heading99"
                        data-parent="#accordionEx23">
                        <div class="card-body">
                          <div class="row my-4">
                            <div class="col-md-7">
                              <h2 class="font-weight-bold mb-3 black-text">Sent box</h2>
                              <p class="">This page you can view submitted request domain quota status.</p>
                            </div>
                            <div class="col-md-5 mt-3 pt-2">
                              <div class="view z-depth-1">
                                <br>
                                <a href="sent box.png" data-size="1600x1067" target="_blank">
                                <img src="sent box.png" alt="placeholder" class="img-fluid" />
                                <br><br>
                                <button class="btn btn-danger"><i class="fas fa-search-plus"> Zoomin</i></button>
                                </a> 
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="card">
                      <div class="card-header blue lighten-3 z-depth-1" role="tab" id="heading100">
                        <h5 class="text-uppercase mb-0 py-1">
                          <a class="collapsed font-weight-bold text-info" data-toggle="collapse" href="#collapse100"
                            aria-expanded="false" aria-controls="collapse98">
                            Log out
                          </a>
                        </h5>
                      </div>
                      <div id="collapse100" class="collapse" role="tabpanel" aria-labelledby="heading100"
                        data-parent="#accordionEx23">
                        <div class="card-body">
                          <div class="row my-4">
                            <div class="col-md-7">
                              <h2 class="font-weight-bold mb-3 black-text">Logout</h2>
                              <p class="">When you want to logout you can click at your name in the right side of navigation bar then select logout.</p>
                            </div>
                            <div class="col-md-5 mt-3 pt-2">
                              <div class="view z-depth-1">
                                <br>
                                <a href="Logout.png" data-size="1600x1067" target="_blank">
                                <img src="Logout.png" alt="placeholder" class="img-fluid" />
                                <br><br>
                                <button class="btn btn-danger"><i class="fas fa-search-plus"> Zoomin</i></button>
                                </a> 
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
                  <!--Accordion wrapper-->
                </div>
                <!--Grid column-->
              </div>
              <!--Grid row-->
            </div>
            <!-- Content -->
          </div>
          <!-- Mask & flexbox options-->
        </div>
        <!-- Full Page Intro -->
          
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
