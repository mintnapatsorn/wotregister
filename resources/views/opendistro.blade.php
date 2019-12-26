<!doctype html>
<html>
    <head>
        <title>DATA STORAGE TOKEN</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.15.4/dist/bootstrap-table.min.css">
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

        <!-- data table  -->
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

        <!-- ajax  -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>


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
                  <a class="nav-link active" href="{{ url('/opendistro') }}">Data storage token</a>
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

                <li class="nav-item active">
                  <a href="https://kibana.wot.web.meca.in.th/" class="nav-link border border-light rounded">
                    <img src="opendistro.png" width="20" height="20"> Data storage dashboard
                  </a>
                </li>

              </ul>

            </div>

          </div>
        </nav>
        <!-- Navbar -->


        <!-- Full Page Intro -->
        <div class="view full-page-intro" style="background-image: url('7.jpg'); background-repeat: no-repeat; background-size: cover;">
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
                      <font color="white"><strong>Data storage token management</strong></font>
                    </h1>
                    <br>

                    <p align="right"><button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModal"><span class="fas fa-plus"></span> Generate token</button></p>
                    
                    <!-- <br> -->
                    <table id="example" class="table table-striped table-bordered table-dark" style="width:100%">
                      <thead>
                          <tr>
                            <th><font size="3px" color="white">ID</th>
                            <th><font size="3px"color="white">Token name</font></th>
                            <th><font size="3px" color="white">Request date</font></th>
                            <th><font size="3px" color="white">Expire date</font></th>
                            <th><font size="3px" color="white">Action</font></th>
                            <!-- <th><font size="4px" color="white">Revoke status</font></th> -->
                          </tr>
                      </thead>
                      @foreach($alldtptoken as $alldtptokens)
                      <tbody>
                          <tr>

                            <td>
                              {{$alldtptokens->id}}
                            </td>    

                            <td>
                              {{$alldtptokens->token_name}}
                            </td>

                            <td>
                              {{date('d-M-Y h:i:s',$alldtptokens->timestamp)}}
                            </td>

                            <td>
                              {{date('d-M-Y  h:i:s',$alldtptokens->expire_date)}}
                            </td>

                            <td>
                              @if($alldtptokens->action==0)
                                <a href="{{ route('tokenrevoke',$alldtptokens->id) }}"><button class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Revoke token" onclick="return confirm('Are you sure to revoke this token ?')"><span class="fas fa-user-slash"></span></button></a>
                              @endif

                              @if($alldtptokens->action==1)
                                <button class="btn btn-light btn-sm" disabled><span class="fas fa-user-slash"></span></button>
                              @endif

                              <a href="{{ route('tokendelete',$alldtptokens->id) }}"><button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete" onclick="return confirm('Are you sure to delete this token ?')"><span class="fas fa-trash-alt"></span></button></a>
                            </td>

                            <!-- <td>
                              @if($alldtptokens->action==0)
                                <img src="x.png" width="40" height="40">
                              @endif
                              @if($alldtptokens->action==1)
                                <img src="true.png" width="40" height="40">
                              @endif
                            </td> -->

                          </tr>
                      </tbody>
                      @endforeach
                  </table>
                <!--Grid column-->
              </div>
              <!--Grid row-->
            </div>
            <!-- Content -->
          </div>
          <!-- Mask & flexbox options-->
        </div>
        <!-- Full Page Intro -->

        <div class="container">
          <!-- Trigger the modal with a button -->
          <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                  <h4 class="modal-title text-dark">Confirm password : </h4>
                </div>
                <form action="/curl" method="post">
                  {{csrf_field()}}  
                  <div class="modal-body">
                  <!-- <p>Some text in the modal.</p> -->
                    <div class="form-row">
                      <div class="col-md-12 mb-3 text-dark text-left text-md-left">
                        <label for="validationServer033">username : </label>
                        <input type="text" rows="4" cols="50" name="username" class="form-control" id="validationServer033" value="{{session('preferred_username')}}" readonly="true" required>
                      </div>
                    </div> 
                    <div class="form-row">
                      <div class="col-md-12 mb-3 text-dark text-left text-md-left">
                        <label for="validationServer033"><font color="red">* </font>password : </label>
                        <input type="password" name="password" class="form-control" id="validationServer033" placeholder="Enter password" required>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col-md-12 mb-3 text-dark text-left text-md-left">
                        <label for="validationServer033"><font color="red">* </font>token description : </label>
                        <input type="text" name="tokenname" class="form-control" id="validationServer033" placeholder="Token description" required>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Generate</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                  </div>
                </form>
              </div>
            </div>
          </div>   
        </div> <!--end modal-->

        @if(Session::has('message'))
          <div class="container">
            <!-- Trigger the modal with a button -->
            <div class="modal fade" id="myModalToken" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                    <h4 class="modal-title text-dark">Data storage token : </h4>
                  </div>
                    <div class="modal-body">
                    <!-- <p>Some text in the modal.</p> -->
                      <div class="form-row">
                        <div class="col-md-12 mb-3 text-dark text-left text-md-left">
                          <label for="validationServer033">Token : </label>
                          <input type="text" rows="4" cols="50" name="username" class="form-control" id="validationServer033" value="{{ Session::get('message') }}" readonly="true" required>
                        </div>
                        <font color="red"><label for="validationServer033">***System will not store your token, so you must to keep them.</label></font>
                      </div> 
                    </div>
                    
                    <div class="modal-footer">
                      <button class="copy btn btn-success" data-clipboard-text="{{ Session::get('message') }}">Copy</button>
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
              </div>
            </div>   
          </div> <!--end modal-->
        @endif





        <div id="myModalFirst" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-body">
                <button class="copy btn btn-success" data-clipboard-text="{{ Session::get('message') }}">Copy Text From First Modal</button>
              </div>
            </div>
          </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/clipboard.js/1.6.0/clipboard.min.js"></script>



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

        <!-- copy text to clipboard -->
        <script>
          $(document).ready(function() {
              var client = new Clipboard( '.copy' );
              client.on('success', function(e) {
                  console.log('Copied');
              });
              client.on('error', function(e) {
                  console.log('Error!');
              });
          });
        </script>

        <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script> -->
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

        <!-- Alert for condition-->
        <script>
          @if(Session::has('message'))
            var type="{{Session::get('alert-type','info','positionClass')}}"
            switch(type){
              case 'error':
                alert("{{ Session::get('message') }}");
                break;
              case 'info':
                $(document).ready(function(){
                   $('#myModalToken').modal('show');
                });
                // prompt("Token : ","{{ Session::get('message') }}");
                  // var copyText = {{ Session::get('message') }};
                  // copyText.select();
                  // document.execCommand("copy");
                  // alert("Reclam token: " + copyText.value);
                break;
              case '':
                alert();
                break;
            }
          @endif
        </script>

        <!-- button description tooltip -->
        <script>
        $(document).ready(function(){
          $('[data-toggle="tooltip"]').tooltip();   
        });
        </script>

        <!-- copy text -->
        <script>
          function copyText(idcp) {
            /* Get the text field */
            var copyText = document.getElementById(idcp);
            /* Select the text field */
            copyText.select();
            /* Copy the text inside the text field */
            document.execCommand("copy");
            /* Alert the copied text */
            alert("Data storage token: " + copyText.value);
          }
        </script>

    </body> 
</html>