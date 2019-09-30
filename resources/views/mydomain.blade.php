<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <title>MY DOMAIN</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.15.4/dist/bootstrap-table.min.css">
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

        <!-- data table  -->
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

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

          /*show hidden text*/
          .field-icon {
            float: right;
            margin-left: -25px;
            margin-top: -25px;
            position: relative;
            z-index: 2;
          }

          #MainTable {
              width: 100%;
              background-color: #FFFFFF;
              border: 1px;
              min-width: 100%;
              position: relative;
              opacity: 0.97;
              background: transparent;
          }
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
                <li class="nav-item">
                  <a class="nav-link" style="font-size: 17px;" href="{{ url('/') }}">Home
                    <span class="sr-only">(current)</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" style="font-size: 17px;" href="{{ url('/getstarted') }}">Getting started</a>
                </li>
                <li class="nav-item dropdown active" style="font-size: 17px;">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" >
                    Domain
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ url('/userregisdomain') }}">Domain register</a>
                    <a class="dropdown-item" href="{{ url('/mydomain') }}">My domain</a>
                  </div>
                </li>
                <li class="nav-item">
                  <a class="nav-link" style="font-size: 17px;" href="{{ url('/requestpermission') }}">Request quota</a>
                </li>
                <li class="nav-item" style="font-size: 17px;">
                  <a class="nav-link" href="{{ url('/news') }}">Contact us</a>
                </li>
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

                <li class="nav-item">
                  <a href="https://github.com/mdbootstrap/bootstrap-material-design" class="nav-link border border-light rounded"
                    target="_blank">
                    <i class="fab fa-github mr-2"></i>MECA GitHub
                  </a>
                </li>

              </ul>

            </div>

          </div>
        </nav>
        <!-- Navbar -->


        <!-- Full Page Intro -->
        <div class="view full-page-intro" style="background-image: url('8.jpg'); background-repeat: no-repeat; background-size: cover;">
          <!-- Mask & flexbox options-->
          <div class="mask rgba-black-light d-flex justify-content-center align-items-center ">
            <!-- Content -->
            <div class="container">
              <!--Grid row-->
              <div class="row wow fadeIn">
                 <!--Grid column-->
                <div class="col-md-12 mb-4 text-white text-center text-md-center">
                  <br><br><br><br>
                    <h1 class="dark-grey-text text-center">
                      <font color="#FFA500"><strong>My domain</strong></font>
                    </h1>
                    <br>
                    <table id="example" class="table table-striped table-bordered table-dark" style="width:100%">
                      <thead>
                          <tr>
                            <th><font size="4px" color="white">Domain</font></th>
                            <th><font size="4px" color="white">Description</font></th>
                            <th><font size="4px"color="white">Region</font></th>
                            <th><font size="4px" color="white">Registration date</font></th>
                            <th><font size="4px" color="white">Token</font></th>
                            <th><font size="4px" color="white">Reclam token</font></th>
                            <th><font size="4px" color="white">Action</font></th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($alluserdomain as $alluserdomains) 
                          <tr>
                            <td>
                              <a href="https://{{$alluserdomains->name}}" target="_blank"><font size="3px" color="#00BFFF"><p align="left">{{$alluserdomains->name}}</p></a></font>
                            </td>    
                            <td>
                              <font size="3px" color="white">{{$alluserdomains->description}}</font>
                            </td>
                            <td>
                              <font size="3px" color="white">{{$alluserdomains->continent}}</font>
                            </td>
                            <td>
                              <font size="3px" color="white">{{date('d/m/Y', $alluserdomains->timestamp)}}</font>
                            </td>
                            <td>
                              <a tabindex="0" class="btn btn-warning" data-placement="top" role="button" data-toggle="popover" data-trigger="focus" title="Token" data-content="{{$alluserdomains->token}}"><span class="fas fa-eye"></span></a>
                            </td>
                            <td>

                              <a tabindex="0" class="btn btn-warning" data-placement="top" role="button" data-toggle="popover" data-trigger="focus" title="Reclam token" data-content="{{$alluserdomains->reclamation_token}}"><span class="fas fa-eye"></span></a>
                            </td>
                            <td>
                              <a href="{{ route('domaindelete',$alluserdomains->id) }}"><button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure to delete this domain ?')"><span class="fas fa-trash-alt"></span></button>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                  </table>
                    <br>
                    <!-- </div>  -->
                    <br></br>
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

        <!-- data table -->
        <script type="text/javascript">
          $(document).ready(function() {
              $('#example').DataTable();
          } );
        </script>
        <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script> -->
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

        <!-- popup -->
        <script>
          $(document).ready(function(){
              $('[data-toggle="popover"]').popover();   
          });
        </script>

        <!-- popiver dissmiss -->
        <script type="text/javascript">
          $('.popover-dismiss').popover({
            trigger: 'focus'
          })
        </script>


    </body> 
</html>



<!-- graphic icon bootstrap -->
<!-- https://www.w3schools.com/bootstrap/bootstrap_ref_comp_glyphs.asp -->
<!-- https://glyphicons.bootstrapcheatsheets.com -->