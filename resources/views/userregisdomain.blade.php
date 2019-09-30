<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.15.4/dist/bootstrap-table.min.css">
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

        <title>DOMAIN REGISTER</title>

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


          textarea {
              resize: none;
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
                      <form action="/submit" method="post" class="needs-validation container" novalidate>
                      {{csrf_field()}}  
                        <!-- Heading -->
                        <h3 class="dark-grey-text text-center">
                          <strong>Domain register</strong>
                        </h3>
                        <hr>

                        <!-- <div class="from-row"> -->
                          <!-- <div class="col-md-12 mb-3"> -->
                            <!-- <input class="form-control" id="text" name="text" placeholder="Subdomain" rows="5"></input> -->
                            <!-- <h6 class="pull-right" id="count_message"></h6> -->

                            <!-- <label for="validationServer033">Subdomain name</label>
                            <input type="text" class="form-control" id="text" name="text" placeholder="Subdomain" ></input>
                            <span class="pull-right" id="count_message">example</span><font size="3" style="color:darkorange"><?php echo $admin_domain_select ?></font></font> -->
                          <!-- </div> -->
                        <!-- </div> -->

                          <div class="form-row">
                            <div class="col-md-12 mb-3">
                              <label for="validationServer033">Subdomain name</label>
                              <input type="text" name="domain" class="form-control" id="text" placeholder="Subdomain name" required>
                              <font size="3" style="color:darkorange"><span class="pull-right" id="count_message">example</span></font></font><?php echo $admin_domain_select ?>
                            </div>
                          </div>   
                          
                          <div class="form-row">
                            <div class="col-md-6 mb-3">
                              <label for="validationServer033">Description</label>
                              <input type="text" class="form-control" name="description" placeholder="Description" required>
                            </div>

                            <div class="col-md-6 mb-3">
                              <label for="exampleFormControlSelect1">Relay server</label>
                              <select class="form-control" id="exampleFormControlSelect1" name="serverlistbox">   
                                <option value="serverlistbox">-- please select relay server --</option>
                                @foreach($interserverlist as $interserverlists)
                                  <option value="{{$interserverlists->relayserver_code}}">{{$interserverlists->relayserver_code}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>

                          <br>
                          <div class="text-center">
                            <button type="submit" class="btn btn-warning fas fa-cloud-upload-alt"> Send</button>
                            <hr>
                          </div>
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
                    <p align="center">Also, you can check all your subdomain at <a href="{{ url('/mydomain') }}">My domain</a>.</p>
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
                      <p>Time update at <font color="darkred"><span id="datetime"></span></font></p>
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

        <!-- alert special char input -->
        <script type="text/javascript">
          // Add error message element after input.

          $('#some-number').on('input', function (evt) {
            var value = evt.target.value
            
            if (value.length === 0) {
              evt.target.className = ''
              return
            }

            if (/^[A-Za-z0-9-.]*$/.test(value)) {
              evt.target.className = 'valid'

              // show input realtime text
              $('#display').text($(this).val());

            } else {
              evt.target.className = 'invalid'
            }

          })
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


        <!-- count data input -->
        <!-- <script type="text/javascript">
          var text_max = 200;
          $('#count_message').html(text_max + ' remaining');

          $('#text').keyup(function() {
            var text_length = $('#text').val().length;
            var text_remaining = text_max - text_length;
            
            $('#count_message').html(text_remaining + ' remaining');
          });
        </script> -->

        <!-- count data input -->
        <script type="text/javascript">

          $('#text').keyup(function() {
            var text_input = $('#text').val();
            if (/^[A-Za-z0-9-.]*$/.test(text_input)) {
              $('#count_message').html(text_input);
            } else {
              $('#count_message').after('<span class="error-message"><font color="red"><p align="left">Can not input special character</font></span>');
            }
          });

          // $('#text').keyup(function() {
          //   var text_input = $('#text').val();
          //   $('#count_message').html(text_input);
          // });
        </script>

    </body>
</html>
