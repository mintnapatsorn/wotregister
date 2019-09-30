<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <title>SENT BOX</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.15.4/dist/bootstrap-table.min.css">
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">


        <!-- datatable -->
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
            background-color: #1C2331; }]

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
                <li class="nav-item dropdown" style="font-size: 17px;">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" >
                    Domain
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ url('/userregisdomain') }}">Domain register</a>
                    <a class="dropdown-item" href="{{ url('/mydomain') }}">My domain</a>
                  </div>
                </li>
                <li class="nav-item dropdown active" style="font-size: 17px;">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" >
                    Quota
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ url('/requestpermission') }}">Request quota</a>
                    <a class="dropdown-item" href="{{ url('/requestpermissionsuccessful') }}">Sent box</a>
                  </div>
                  <li class="nav-item" style="font-size: 17px;">
                    <a class="nav-link" href="{{ url('/news') }}">Contact us</a>
                  </li>
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
                    <div class="content">
                      <strong><font size="8px" style="color:darkred"><p align="center">Sent box</p></font></strong>
                      <table align="center" width="50%">
                          <tr>
                              <!-- <th><font size="4px" color="#350466"><p align="center">ID</p></font></th> -->
                              <th><font size="4px" color="#350466"><p align="center">Request Type</p></font></th>
                              <th><font size="4px" color="#350466"><p align="center">Amount</p></font></th>
                              <th><font size="4px" color="#350466"><p align="center">Date</p></font></th>
                              <th><font size="4px" color="#350466"><p align="center">Status</p></font></th>
                              <!-- <th><font size="4px" color="#FAA416"><p align="center">Action</p></font></th> -->
                          </tr>
                          @foreach($data as $data)
                            <tr>
                              <!-- <td><font size="3px" style="color:black"><p align="center">{{$data->id}}</p></font></td> -->
                              <td><font size="3px" style="color:black"><p align="center">Permission Request</p></font></td>    
                              <td><font size="3px" style="color:black"><p align="center">{{$data->ammount}}</p></font></td>
                              <td><font size="3px" style="color:black"><p align="center">{{date('d/m/Y', $data->timestamp)}}</p></font></td>
                              @if($data->status == 0)
                                <td><font size="3px" color="#FA9814"><p align="center">Pending</p></font></td>
                              @endif

                              @if($data->status == 1)
                                <td><font size="3px" color="#02801F"><p align="center">Accept</p></font></td>
                              @endif

                              @if($data->status == 2)
                                <td><font size="3px" color="#C1031D"><p align="center">Reject</p></font></td>
                              @endif

                              <!-- @if($data->status == 2)
                                <td><p align="center"><button class="btn btn-warning"><font size="2">CONFIRM</font></button></p></td>
                              @endif -->
                            </tr>
                          @endforeach 
                      </table>    
                      <br></br>
                    </div>
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

    </body> 
</html>



<!-- graphic icon bootstrap -->
<!-- https://www.w3schools.com/bootstrap/bootstrap_ref_comp_glyphs.asp -->
<!-- https://glyphicons.bootstrapcheatsheets.com -->