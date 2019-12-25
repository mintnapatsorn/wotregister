<!doctype html>
<html>
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
                <li class="nav-item dropdown active" style="font-size: 17px;">
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

                <li class="nav-item active" target="_blank">
                  <a href="https://portal.meca.in.th" class="nav-link border border-light rounded">
                    <img src="opendistro.png" width="20" height="20"> Data storage dashboard
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
                    <table id="example" class="table table-striped table-bordered table-dark" style="width:105%">
                      <thead>
                          <tr>
                            <th><font size="4px" color="white">Domain</font></th>
                            <!-- <th><font size="4px" color="white">Description</font></th> -->
                            <th><font size="4px"color="white">Region</font></th>
                            <th><font size="4px" color="white">Registration date</font></th>
                            <!-- <th><font size="4px" color="white">Token</font></th> -->
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
                              <font size="3px" color="white">{{$alluserdomains->continent}}&emsp;</font>
                            </td>
                            <td>
                              <font size="3px" color="white">{{date('d/m/Y', $alluserdomains->timestamp)}}</font>
                            </td>
                            <td>
                              <div class="form-row">

                                <div class="col-md-8 mb-2 text-dark text-center text-md-center">
                                    
                                  <input type="hidden" name="domain" value="{{$alluserdomains->name}}" required>
                                
                                    <input id="{{$alluserdomains->name}}" type="password" class="form-control" name="reclamtoken" value="{{$alluserdomains->reclamation_token}}" required>
                                    <span toggle="#password-field" class="fa fa-fw field-icon toggle-password"><i id="{{$alluserdomains->name}}"  name="{{$alluserdomains->name}}" onclick="openeye(this.id)" class="fa fa-eye" aria-hidden="true"></i></span>
                                    
                                    </div>

                                    <div class="col-md-4 mb-1 text-dark text-center text-md-center">
                                    <!-- <button value="{{$alluserdomains->name}}" name="btnRegenToken" type="button" class="btn btn-info refresh" onclick="uuid(this.value)"><i class="fas fa-sync-alt"></i></button> -->
                                    <button value="{{$alluserdomains->name}}" onclick="update(this.value)" name="btnRegenToken" type="button" class="btn btn-info refresh" data-toggle="tooltip" data-placement="top" title="Refresh token"><i class="fas fa-sync-alt"></i></button>

                                    <!-- <a href="{{ route('updatereclamtoken',$alluserdomains->id) }}"><button value="{{$alluserdomains->name}}" name="btnRegenToken" type="button" class="btn btn-info refresh" data-toggle="tooltip" data-placement="top" title="Refresh token"><i class="fas fa-sync-alt"></i></button></a> -->

                                    <!-- The button used to copy the text -->
                                    <button id="{{$alluserdomains->name}}" type="button" class="btn btn-success" onclick="copyText(this.id)" data-toggle="tooltip" data-placement="top" title="Copy token"><i class="fas fa-copy"></i></button>

                                  </div>
                                </div>      
                            </td>

                            <td>
                              <a href="{{ route('domaindelete',$alluserdomains->id) }}"><button class="btn btn-danger" onclick="return confirm('Are you sure to delete this domain ?')" data-toggle="tooltip" data-placement="top" title="Delete domain"><span class="fas fa-trash-alt"></span></button></a>

                              <button class="btn btn-light" type="submit" data-toggle="modal" data-target="#myModal-{{$alluserdomains->id}}"><span class="fas fa-edit" data-toggle="tooltip" data-placement="top" title="Change relay server"></span></button></font>
                              <!-- Modal Bootstrap for add new relayserver data -->
                              <div class="container">
                                <!-- Trigger the modal with a button -->
                                <div class="modal fade" id="myModal-{{$alluserdomains->id}}" role="dialog">
                                  <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                                        <h4 class="modal-title text-dark">CHANGE RELAY SERVER : </h4>
                                      </div>
                                      <form action="/updaterelayservermydomain" method="post">
                                        {{csrf_field()}}
                                        <div class="modal-body">
                                          <!-- <p>Some text in the modal.</p> -->
                                          <div class="form-row">
                                            <div class="col-md-12 mb-3 text-dark text-left text-md-left">
 
                                              <input type="hidden" rows="4" cols="50" maxlength="2" name="domainid" class="form-control" id="validationServer033" readonly="true" value="{{$alluserdomains->id}}" required>
                                            </div>
                                          </div>
                                          <div class="form-row">
                                            <div class="col-md-12 mb-3 text-dark text-left text-md-left">
                                              <label for="validationServer033" name="domainname" style="color:black">Subdomain name : {{$alluserdomains->name}}</label>
                                            </div>
                                            <div class="col-md-12 mb-3 text-dark text-left text-md-left">
                                              <label for="validationServer033" name="domainname" style="color:black">Description : {{$alluserdomains->description}}</label>
                                            </div>
                                          </div>

                                          <div class="form-row">
                                            <div class="col-md-12 mb-3 text-dark text-left text-md-left">
                                              <label for="validationServer033">Relay server : </label>
                                              <select class="form-control" id="exampleFormControlSelect1" name="changeserverlistbox"> 
                                                <option value="{{$alluserdomains->continent}}">{{$alluserdomains->continent}}</option>
                                                @foreach($interserverlist as $interserverlists)
                                                  @if($alluserdomains->continent!==$interserverlists->relayserver_code)
                                                    <!-- <option value="{{$interserverlists->relayserver_code}}">{{$interserverlists->relayserver_code}} ({{$interserverlists->description}})</option> -->
                                                    <option value="{{$interserverlists->relayserver_code}}">{{$interserverlists->relayserver_code}}</option>
                                                  @endif
                                                @endforeach 
                                              </select>
                                            </div>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="submit" class="btn btn-success" onclick="return confirm('Are you sure to change relay server ? ')">Change</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                          </div>
                                      </form>
                                    </div>
                                  </div>
                                </div>   
                              </div>

                            </td>

                          </tr>
                        @endforeach
                      </tbody>
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

        <!--Main layout-->
        <script>
          new WOW().init();
        </script>

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

        <!-- show and hide text in textbox (reclam token) -->
        <script>
          function openeye(id) {
              var x = document.getElementById(id);
              var y = document.getElementsByName(id)[0];
              // alert(y.className);
              if (x.type === "password") {
                x.type = "text";
                y.className='fa fa-eye-slash';
              } else {
                x.type = "password";
                y.className='fa fa-eye';
              }
          }
        </script>

        <!-- create uuid v4 -->
        <script>
          function uuid(str) {
            function guid() {
              function s4() {
                return Math.floor((1 + Math.random()) * 0x10000)
                  .toString(16)
                  .substring(1);
              }
              return s4() + s4() + '-' + s4() + '-' + s4() + '-' +s4() + '-' + s4() + s4() + s4();
            }

            var y = document.getElementsByName(str)[0];
            y = guid();
            document.getElementById(str).value = y;

          }
        </script>

        <script>
          function copyText(idcp) {
            /* Get the text field */
            var copyText = document.getElementById(idcp);

            /* Select the text field */
            copyText.select();

            copyText.setSelectionRange(0, 99999)

            /* Copy the text inside the text field */
            document.execCommand("copy");

            /* Alert the copied text */
            alert("Reclam token: " + copyText.value);
          }
        </script>


        <!-- ajax -->
        <script>
          function update(updateid){

                var domain = updateid;
                var reclam = document.getElementById(updateid);
                var reclamtoken = reclam.value;

                var eyeid = document.getElementsByName(updateid)[0];

                $.ajax({
                    method: "get",
                    dataType: "json",
                    url: "{{url('updatereclamtokentest')}}",
                    data: {
                      domain: domain
                    },
                    success: function (d) {
                      reclam.value = d.token
                      reclam.type = 'text'
                      eyeid.className='fa fa-eye-slash'
                    }
                });

          }
        </script>


        <!-- button description tooltip -->
        <script>
        $(document).ready(function(){
          $('[data-toggle="tooltip"]').tooltip();
        });
        </script>


    </body> 
</html>