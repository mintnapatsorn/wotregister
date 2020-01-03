<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.15.4/dist/bootstrap-table.min.css">
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

        <title>RELAY SERVER MANAGEMENT</title>

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
            <a class="navbar-brand" href="{{ url('/adminmanagement') }}">
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
                  <a class="nav-link" style="font-size: 17px;" href="{{ url('/admincheckuserrequestpermission') }}">Quota request
                    <span class="sr-only">(current)</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" style="font-size: 17px;" href="{{ url('/domainmanagement') }}">Domain management</a>
                </li>
                  <li class="nav-item" style="font-size: 17px;">
                    <a class="nav-link" href="{{ url('/relayservermanagement') }}">Relay server management</a>
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
                    @foreach(Session::get('roles') as $roles)
                      @if($roles ==env('NAME_SPACE'))
                        <a class="dropdown-item" href="{{ url('/') }}">Domain register</a>
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
                  <a href="/opendistro" class="nav-link border border-light rounded">
                    <img src="opendistro.png" width="20" height="20"> Open Distro
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
                <div class="col-md-12 mb-4 text-white text-center text-md-center">
                  <br><br><br><br>
                  <div class="content">
                    <font size="6"><p style="color:black" align="center">RELAY SERVER MANAGEMENT</p></font>
                    <p align="center"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">ADD NEW RELAY SERVER</button></p>
                    <table align="center" width="50%">
                        <tr>
                            <th><font size="2px" color="black">ID</font></th>
                            <th><font size="2px" color="black">RELAY SERVER CODE</font></th>
                            <th><font size="2px" color="black">DESCRIPTION</font></th>
                            <th><font size="2px" color="black">ACTION</font></th>
                        </tr>
                          @foreach($serverlist as $serverlist)
                              <tr>
                                  <td><font size="2px" color="black">{{ $serverlist->id}}</font></td>
                                  <td><font size="2px" color="black">{{ $serverlist->relayserver_code}} </font></td>    
                                  <td><font size="2px" color="black">{{ $serverlist->description}}</font></td>
                                  <td>
                                    <a href="{{ route('delete',$serverlist->id) }}"><button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure to delete this record ?')"><font size="2px">DELETE</font></button></a>

                                    <!-- Nomal edit button with next form -->
                                    <a href="{{ route('edit',$serverlist->id) }}"><button class="btn btn-warning" type="submit" value="edit" value="edit"><font size="2px">EDIT</font></button></a> 

                                  </td>
                              </tr>
                          @endforeach 
                    </table>
                    <div class="links"></div>
                  </div>

                    <!-- Modal Bootstrap for add new relayserver data -->
                    <div class="container">
                      <!-- Trigger the modal with a button -->
                      <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">
                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                              <h4 class="modal-title text-dark">ADD NEW RELAY SERVER : </h4>
                            </div>
                            <form action="add" method="post">
                              {{csrf_field()}}  
                              <div class="modal-body">
                                <!-- <p>Some text in the modal.</p> -->
                                  <div class="form-row">
                                    <div class="col-md-12 mb-3 text-dark text-left text-md-left">
                                      <label for="validationServer033">Continent code</label>
                                      <input type="text" rows="4" cols="50" maxlength="2" name="relayservercode" class="form-control" id="validationServer033" placeholder="Enter continent code" required>
                                    </div>
                                  </div> 
                                  <div class="form-row">
                                    <div class="col-md-12 mb-3 text-dark text-left text-md-left">
                                      <label for="validationServer033">Continent name</label>
                                      <input type="text" name="relayservername" class="form-control" id="validationServer033" placeholder="Enter continent name" required>
                                    </div>
                                  </div>
                              </div>
                              <div class="modal-footer">
                                <button type="submit" class="btn btn-success" onclick="return confirm('Are you sure to add new relay server data ? ')">SEND</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">CANCEL</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>   
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
