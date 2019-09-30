<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.15.4/dist/bootstrap-table.min.css">
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

        <!-- data table  -->
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

        <title>REQUEST QUOTA</title>

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

          
          /*piechart (donut) chart*/
          @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,700);

          @keyframes bake-pie {
            from {
              transform: rotate(0deg) translate3d(0,0,0);
            }
          }

          body {
            font-family: "Open Sans", Arial;
          }
          main {
            width: 400px;
            margin: 30px auto;
          }
          section {
            margin-top: 30px;
          }
          .pieID {
            display: inline-block;
            vertical-align: top;
          }
          .pie {
            height: 200px;
            width: 200px;
            position: relative;
            margin: 0 30px 30px 0;
          }
          .pie::before {
            content: "";
            display: block;
            position: absolute;
            z-index: 1;
            width: 100px;
            height: 100px;
            background: #EEE;
            border-radius: 50%;
            top: 50px;
            left: 50px;
          }
          .pie::after {
            content: "";
            display: block;
            width: 120px;
            height: 2px;
            background: rgba(0,0,0,0.1);
            border-radius: 50%;
            box-shadow: 0 0 3px 4px rgba(0,0,0,0.1);
            margin: 220px auto;      
          }
          .slice {
            position: absolute;
            width: 200px;
            height: 200px;
            clip: rect(0px, 200px, 200px, 100px);
            animation: bake-pie 1s;
          }
          .slice span {
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            background-color: black;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            clip: rect(0px, 200px, 200px, 100px);
          }
          .legend {
            list-style-type: none;
            padding: 0;
            margin: 0;
            background: #FFF;
            padding: 15px;
            font-size: 13px;
            box-shadow: 1px 1px 0 #DDD,
                        2px 2px 0 #BBB;
          }
          .legend li {
            width: 110px;
            height: 1.25em;
            margin-bottom: 0.7em;
            padding-left: 0.5em;
            border-left: 1.25em solid black;
          }
          .legend em {
            font-style: normal;
          }
          .legend span {
            float: right;
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
                  <a class="nav-link" style="font-size: 17px;" href="{{ url('/getstarted') }}" >Getting started</a>
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
                <li class="nav-item active">
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
                  <a href="https://www.facebook.com/mecanectec" class="nav-link" target="_blank">
                    <i class="fab fa-facebook-f"></i>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="https://twitter.com/mecanectec" class="nav-link" target="_blank">
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
                <div class="col-md-6 col-xl-7 mb-4">
                  <br><br><br><br><br><br><br>

                  <!--Card-->
                  <div class="card">

                    <!--Card content-->
                    <div class="card-body">

                      <!-- Form -->
                        <strong><font size="8px" style="color:darkred"><p align="center">Sent box</p></font></strong>
                        <table id="example" align="center" width="100%">
                          <thead>
                            <tr>
                                <th><font size="4px" color="#350466"><p align="center">Request Type</p></font></th>
                                <th><font size="4px" color="#350466"><p align="center">Amount</p></font></th>
                                <th><font size="4px" color="#350466"><p align="center">Date</p></font></th>
                                <th><font size="4px" color="#350466"><p align="center">Status</p></font></th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($data as $data)
                              <tr>
                                <td><font size="3px" style="color:black"><p align="center">Permission Request</p></font></td>    
                                <td><font size="3px" style="color:black"><p align="center">{{$data->ammount}}</p></font></td>
                                <td><font size="3px" style="color:black"><p align="center">{{date('d/m/Y', $data->timestamp)}}</p></font></td>
                                @if($data->status == 0)
                                  <td><font size="3px" color="#FA9814"><p align="center">Pending</p></font></td>
                                @endif

                                @if($data->status == 1)
                                  <td><font size="3px" color="#02801F"><p align="center">Accept</p></font></td>
                                @endif

                                @if($data->status == 3)
                                  <td><font size="3px" color="#02801F"><p align="center">Accept</p></font></td>
                                @endif

                                @if($data->status == 2)
                                  <td><font size="3px" color="#C1031D"><p align="center">Reject</p></font></td>
                                @endif

                              </tr>
                            @endforeach 
                          </tbody>
                        </table>  

                      </form>
                      <!-- Form -->
                    </div>
                  </div>
                  <!--/.Card-->
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-4 col-xl-5 mb-4 text-black text-center text-md-middle">
                  <br><br><br><br><br><br>
                  <main>
                    <h2 align="center">Your quota</h2>
                    <p align="center">Also, you can check all your subdomain at <a href="{{ url('/mydomain') }}">"My domain"</a>.</p>
                    <section>
                      <div class="pieID pie">  
                      </div>
                        <ul class="pieID legend">
                          <li>
                            <em>Quota used</em>
                            <span>{{$permission_used}}</span>
                          </li>
                          <li>
                            <em>Total quota</em>
                            <span>{{$allpermission}}</span>
                          </li>
                        </ul>
                    </section>
                    <!-- <p align="center">Time update at 10 September 2019 12.23pm.</p> -->
                      <!-- <p>Time update at <font color="darkred"><span id="datetime"></span></font></p> -->
                    <button type="button" class="btn btn-warning fas fa-cloud-upload-alt" data-toggle="modal" data-target="#myModal"> Request quota</button>
                    <a href="{{ url('/mydomain') }}"><button type="button" class="btn btn-info fas fa-clipboard"> My domain</button></a>

                  </main>
                </div>
                <!--Grid column-->
              </div>
              <!--Grid row-->
            </div>
            <!-- Content -->
          </div>
          <!-- Mask & flexbox options-->
        </div>

        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                  <h4 class="modal-title">Request quota : </h4>
                </div>
                <form action="/keepuserpermissionrequest" method="post" class="needs-validation container" novalidate>
                      {{csrf_field()}}  
                  <div class="modal-body">
                    <!-- <p>Some text in the modal.</p> -->
                      <div class="form-row">
                        <div class="col-md-12 mb-3">
                          <label for="validationServer033">Quota amount</label>
                          <input type="text" name="totalpermission" class="form-control" id="validationServer033" placeholder="Quota amount" required>
                        </div>
                      </div> 
                      <div class="form-row">
                        <div class="col-md-12 mb-3">
                          <label for="validationServer033">Description</label>
                          <input type="text" name="description" class="form-control" id="validationServer033" placeholder="Description" required>
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
        <!-- Full Page Intro -->

        <!--Main layout-->
        <script>
          new WOW().init();
        </script>

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
        <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>

        <script>
          // Material Select Initialization
          $(document).ready(function() {
          $('.mdb-select').materialSelect();
          });
        </script>

        <!-- pie chart (donut) graph java script -->
        <script type="text/javascript">
          function sliceSize(dataNum, dataTotal) {
            return (dataNum / dataTotal) * 360;
          }
          function addSlice(sliceSize, pieElement, offset, sliceID, color) {
            $(pieElement).append("<div class='slice "+sliceID+"'><span></span></div>");
            var offset = offset - 1;
            var sizeRotation = -179 + sliceSize;
            $("."+sliceID).css({
              "transform": "rotate("+offset+"deg) translate3d(0,0,0)"
            });
            $("."+sliceID+" span").css({
              "transform"       : "rotate("+sizeRotation+"deg) translate3d(0,0,0)",
              "background-color": color
            });
          }
          function iterateSlices(sliceSize, pieElement, offset, dataCount, sliceCount, color) {
            var sliceID = "s"+dataCount+"-"+sliceCount;
            var maxSize = 179;
            if(sliceSize<=maxSize) {
              addSlice(sliceSize, pieElement, offset, sliceID, color);
            } else {
              addSlice(maxSize, pieElement, offset, sliceID, color);
              iterateSlices(sliceSize-maxSize, pieElement, offset+maxSize, dataCount, sliceCount+1, color);
            }
          }
          function createPie(dataElement, pieElement) {
            var listData = [];
            $(dataElement+" span").each(function() {
              listData.push(Number($(this).html()));
            });
            var listTotal = 0;
            for(var i=0; i<listData.length; i++) {
              listTotal += listData[i];
            }
            var offset = 0;
            var color = [
              //"olivedrab",
              "crimson",
              "gray",
              "tomato", 
              "cornflowerblue", 
              "orange",  
              "purple", 
              "turquoise", 
              "forestgreen", 
              "navy"
            ];
            for(var i=0; i<listData.length; i++) {
              var size = sliceSize(listData[i], listTotal);
              iterateSlices(size, pieElement, offset, i, 0, color[i]);
              $(dataElement+" li:nth-child("+(i+1)+")").css("border-color", color[i]);
              offset += size;
            }
          }
          createPie(".pieID.legend", ".pieID.pie");
        </script>

        <script type="text/javascript">
          (function() {
            'use strict';
            window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
            }, false);
            });
            }, false);
            })();

            $(document).ready(function() {
            $('.mdb-select').materialSelect();
            $('.mdb-select.select-wrapper .select-dropdown').val("").removeAttr('readonly').attr("placeholder",
            "Choose your country ").prop('required', true).addClass('form-control').css('background-color', '#fff');
          });
        </script>

        <!-- show current date time -->
        <script>
          var dt = new Date();
          document.getElementById("datetime").innerHTML = dt.toLocaleString();
        </script>

        <!-- data table -->
        <script type="text/javascript">
          $(document).ready(function() {
              $('#example').DataTable();
          } );
        </script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    </body>
</html>
