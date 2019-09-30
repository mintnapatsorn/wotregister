<!DOCTYPE html>
<html lang="en">
<head>
  <title>DOMAIN REGISTER</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

  <!-- circle bar -->
  <link rel="stylesheet" href="css/circle.css">

  <style>
    #example2 {
      background-repeat: no-repeat;
      /*background-size: 300px 100px;*/
      /*background-size: auto;*/
      /*background-size: contain,cover;*/ /*คือการกำหนดแบลคกาวน์ตามขนาดภาพดั้งเดิม*/
      background-size:cover; /*คือการปรับภาพแบลคกราวด์ให้สมดุลกับขนาดของหน้าเว็บจริง*/
    }
    .footer {
      position: fixed;
      left: 0;
      bottom: 0;
      width: 100%;
      background-color: #808080;
      color: white;
      text-align: left;
    }
    .nav ul {
      list-style: none;
      background-color: #2C4554;
      text-align: left;
      padding: 0;
      margin: 0;
    }
    .nav li {
      font-family: 'Oswald', sans-serif;
      font-size: 1.2em;
      line-height: 40px;
      text-align: left;
    }
    .nav a {
      text-decoration: none;
      color: #fff;
      display: block;
      padding-left: 15px;
      border-bottom: 1px solid #888;
      transition: .3s background-color;
    }

    .nav a:hover {
      background-color: #005f5f;
    }

    .nav a.active {
      background-color: #365468;
      color: #FFFFFF;
      cursor: default;
    }

    /* Sub Menus */
    .nav li li {
      font-size: .8em;
    }

    /*******************************************
    Style menu for larger screens

    Using 650px (130px each * 5 items), but ems
    or other values could be used depending on other factors
    ********************************************/

    @media screen and (min-width: 650px) {
      .nav li {
        width: 125px;
        border-bottom: none;
        height: 50px;
        line-height: 50px;
        font-size: 1em;
        display: inline-block;
        margin-right: -4px;
      }

      .nav a {
        border-bottom: none;
      }

      .nav > ul > li {
        text-align: center;
      }

      .nav > ul > li > a {
        padding-left: 0;
      }

      /* Sub Menus */
      .nav li ul {
        position: absolute;
        display: none;
        width: inherit;
      }

      .nav li:hover ul {
        display: block;
      }

      .nav li ul li {
        display: block;
      }
    }

    .topnav-right {
      float: right;
    }

    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
              
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 150%;
    }
              
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
              
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }

    /*Bootstrap counter*/
    .counter {
      background-color:#f5f5f5;
      padding: 20px 0;
      border-radius: 5px;
    }
    .count-title {
      font-size: 40px;
      font-weight: normal;
      margin-top: 10px;
      margin-bottom: 0;
      text-align: center;
    }
    .count-text {
      font-size: 13px;
      font-weight: normal;
      margin-top: 10px;
      margin-bottom: 0;
      text-align: center;
    }
    .fa-2x {
      margin: 0 auto;
      float: none;
      display: table;
      color: #4ad1e5;
    }

    /*check realtime input*/
    input {
      -webkit-appearance: none;
      -moz-appearance: none;
      appearance: none;
      outline: none;
      border: 1px solid black;
    }

    input.valid {
      border: 1px solid green;
    }

    input.invalid {
      border: 1px solid red;
    }

    input.invalid + .error-message {
      display: initial;
    }

    .error-message {
      display: none;
    }

    /*circle bar*/
    .progress{
      width: 150px;
      height: 150px;
      line-height: 150px;
      background: none;
      margin: 0 auto;
      box-shadow: none;
      position: relative;
    }
    .progress:after{
      content: "";
      width: 100%;
      height: 100%;
      border-radius: 50%;
      border: 12px solid #fff;
      position: absolute;
      top: 0;
      left: 0;
    }
    .progress > span{
      width: 50%;
      height: 100%;
      overflow: hidden;
      position: absolute;
      top: 0;
      z-index: 1;
    }
    .progress .progress-left{
      left: 0;
    }
    .progress .progress-bar{
      width: 100%;
      height: 100%;
      background: none;
      border-width: 12px;
      border-style: solid;
      position: absolute;
      top: 0;
    }
    .progress .progress-left .progress-bar{
      left: 100%;
      border-top-right-radius: 80px;
      border-bottom-right-radius: 80px;
      border-left: 0;
      -webkit-transform-origin: center left;
      transform-origin: center left;
    }
    .progress .progress-right{
      right: 0;
    }
    .progress .progress-right .progress-bar{
      left: -100%;
      border-top-left-radius: 80px;
      border-bottom-left-radius: 80px;
      border-right: 0;
      -webkit-transform-origin: center right;
      transform-origin: center right;
      animation: loading-1 1.8s linear forwards;
    }
    .progress .progress-value{
      width: 90%;
      height: 90%;
      border-radius: 50%;
      background: #44484b;
      font-size: 24px;
      color: #fff;
      line-height: 135px;
      text-align: center;
      position: absolute;
      top: 5%;
      left: 5%;
    }
    .progress.blue .progress-bar{
      border-color: #049dff;
    }
    .progress.blue .progress-left .progress-bar{
      animation: loading-2 1.5s linear forwards 1.8s;
    }
    .progress.yellow .progress-bar{
      border-color: #fdba04;
    }
    .progress.yellow .progress-left .progress-bar{
      animation: loading-6 1s linear forwards 1.8s;
    }
    .progress.pink .progress-bar{
      border-color: #ed687c;
    }
    .progress.pink .progress-left .progress-bar{
      animation: loading-4 0.4s linear forwards 1.8s;
    }
    .progress.green .progress-bar{
      border-color: #1abc9c;
    }
    .progress.green .progress-left .progress-bar{
      animation: loading-5 1.2s linear forwards 1.8s;
    }
    @keyframes loading-1{
      0%{
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg);
      }
      100%{
        -webkit-transform: rotate(180deg);
        transform: rotate(180deg);
      }
    }
    @keyframes loading-2{
      0%{
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg);
      }
      100%{
        -webkit-transform: rotate(144deg);
        transform: rotate(144deg);
      }
    }
    @keyframes loading-3{
      0%{
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg);
      }
      100%{
        -webkit-transform: rotate(90deg);
        transform: rotate(90deg);
      }
    }
    @keyframes loading-4{
      0%{
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg);
      }
      100%{
        -webkit-transform: rotate(36deg);
        transform: rotate(36deg);
      }
    }
    @keyframes loading-5{
      0%{
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg);
      }
      100%{
        -webkit-transform: rotate(126deg);
        transform: rotate(126deg);
      }
    }
    @media only screen and (max-width: 990px){
      .progress{ margin-bottom: 20px; }
    }
  </style>
</head>
<body class="new" background="5.jpg" id="example2">
    <header>
      <div class="nav">
        <ul>         
          <li class="home" href="{{ url('/') }}"><img src="2.png" width="48" height="35"></li>
          <li class="home"><a href="{{ url('/') }}">Home</a></li>
          <li class="home"><a  href="{{ url('/getstarted') }}">Getting started</a></li>
          <li class="tutorials"><a class="active" href="#">Domain</a>
            <ul>
              <li><a class="active" href="{{ url('/userregisdomain') }}">Domain register</a></li>
              <li><a href="{{ url('/mydomain') }}">My domain</a></li>
            </ul>
          </li>
          <li class="news"><a href="#">Quota</a>
            <ul>
              <li><a href="{{ url('/requestpermission') }}">Request quota</a></li>
              <li><a href="{{ url('/requestpermissionsuccessful') }}">Sent box</a></li>
            </ul>
          </li>
          <li class="contact"><a href="{{ url('/news') }}">Contact us</a></li>
          <li class="tutorials topnav-right"><a href="#"><?php echo session('name'); ?></span><span class="caret"></span></a>
            <ul>
              @foreach(Session::get('groups') as $groups)
                @if($groups =='/wot/administrator')
                  <li><a href="{{ url('/adminmanagement') }}">Manage system data</a></li>
                @endif
              @endforeach
              <li><a href="{{ url('/logout') }} ">Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </header>
  

    <div class="container-fluid text-center">    
    <div class="row content">
      <!-- <div class="col-sm-2 sidenav">
            .......
      </div> -->
      <!-- First column -->
      <div class="col-sm-9 text-left"> 
        <br></br><br></br><br></br><br></br>
          <form action="/submit" method="post">
            {{csrf_field()}}          
              <p align="center"><font size="400" style="color:#8B0000">
                Domain register
              </font></p>
              <p align="left"><label for="domaintext" >&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Name : </label>
              &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<input id="some-number" type="text" name="domain" placeholder="domain name"/>
             <!--  <br></br> -->
              <p align="left"><font size="3" style="color:green">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<span id="display">example</span><font size="3" style="color:darkorange"><!-- .meca.in.th --><?php echo $admin_domain_select ?>
              </font></font></p>
              <!-- <font size="3" style="color:black">Domain : 
                <?php echo $admin_domain_select ?>
              </font> -->
              <!-- <p align="left"><font size="3" style="color:blue">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; Example :&emsp;&emsp;&emsp;&emsp;cloudy.wot.meca.in.th
              </font></p> -->
              <p align="left"><label for="descrtiptiontext">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Description : </label>
              &emsp;&emsp;&emsp;<input type="text" name="description" placeholder="description"></p>
              <!-- Build Listbox Server--> 
              <p align="left"><label for="servertext">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Relay server : </label>&emsp;&emsp;&nbsp;
              <select id="serverlistbox" name="serverlistbox">   
                <option value="serverlistbox">-- PLEASE SELECT RELAY SERVER --</option>
                  @foreach($interserverlist as $interserverlists)
                    <option value="{{$interserverlists->relayserver_code}}">{{$interserverlists->relayserver_code}}</option>
                  @endforeach
              </select></p>
              <p align="center"><button type="submit" class="btn btn-success">REGISTER</button></p></form>

              <!-- test input realtime text -->
              <!-- <input type="text" id="name" />
              <span id="display"></span> -->
          </div>


          <!-- Second column -->
          <div class="col-sm-3 sidenav">
            <div class="well">
              <div class="row text-center">
                <div class="col">
                  <div class="counter">
                    <i class="fa fa-code fa-2x"></i>
                      <p align="left"><b>&emsp;My Domain</b></p>
                      <p class="timer count-title count-number" data-to=5 data-speed="1000"></p>
                      <p class="count-text ">domains</p>
                      <a href="{{ url('/mydomain') }}"><button class="btn btn-info">See all domains</button></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="well">
                <!-- start circle bar -->
                <p align="center">
                  <div class="container">
                      <div class="row">
                          <div class="col-md-3 col-sm-6">
                            <div class="progress yellow">
                              <span class="progress-left">
                                <span class="progress-bar"></span>
                              </span>
                              <span class="progress-right">
                                  <span class="progress-bar"></span>
                              </span>
                              <div class="progress-value">50%</div>
                            </div>                                
                          </div> 
                      </div>
                  </div>
                </p>
                <font color="red"><p align="center"><b>Quota used</b></p></font>
                <p align="center">5/10 quotas</p> 
            <!-- end of circle bar -->
            </div>
          </div>
        </div>
      </div>

  
    <br></br>
    <div class="footer">
      <br>
      <p>&emsp;&emsp;&emsp;&emsp;Internet Innovation Research Team (INO)&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<img src="20.png" width="88" height="22">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Email : ino@nectec.or.th
      </p>
      <br>
    </div>   

    <!-- Alert for condition-->
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script>
      @if(Session::has('message'))
        var type="{{Session::get('alert-type','info','positionClass')}}"
        switch(type){
          case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;
          case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;
          case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;
          case 'error':
            toastr.error("{{ Session::get('message') }}");
            toastr.option.positionClass('toast-bottom-full-width');
            break;
        }
      @endif
    </script>  


    <!-- Counter java script -->
    <script type="text/javascript">
          (function ($) {
              $.fn.countTo = function (options) {
                options = options || {};
                
                return $(this).each(function () {
                  // set options for current element
                  var settings = $.extend({}, $.fn.countTo.defaults, {
                    from:            $(this).data('from'),
                    to:              $(this).data('to'),
                    speed:           $(this).data('speed'),
                    refreshInterval: $(this).data('refresh-interval'),
                    decimals:        $(this).data('decimals')
                  }, options);
                  
                  // how many times to update the value, and how much to increment the value on each update
                  var loops = Math.ceil(settings.speed / settings.refreshInterval),
                    increment = (settings.to - settings.from) / loops;
                  
                  // references & variables that will change with each update
                  var self = this,
                    $self = $(this),
                    loopCount = 0,
                    value = settings.from,
                    data = $self.data('countTo') || {};
                  
                  $self.data('countTo', data);
                  
                  // if an existing interval can be found, clear it first
                  if (data.interval) {
                    clearInterval(data.interval);
                  }
                  data.interval = setInterval(updateTimer, settings.refreshInterval);
                  
                  // initialize the element with the starting value
                  render(value);
                  
                  function updateTimer() {
                    value += increment;
                    loopCount++;
                    
                    render(value);
                    
                    if (typeof(settings.onUpdate) == 'function') {
                      settings.onUpdate.call(self, value);
                    }
                    
                    if (loopCount >= loops) {
                      // remove the interval
                      $self.removeData('countTo');
                      clearInterval(data.interval);
                      value = settings.to;
                      
                      if (typeof(settings.onComplete) == 'function') {
                        settings.onComplete.call(self, value);
                      }
                    }
                  }
                  
                  function render(value) {
                    var formattedValue = settings.formatter.call(self, value, settings);
                    $self.html(formattedValue);
                  }
                });
              };
              
              $.fn.countTo.defaults = {
                from: 0,               // the number the element should start at
                to: 0,                 // the number the element should end at
                speed: 1000,           // how long it should take to count between the target numbers
                refreshInterval: 100,  // how often the element should be updated
                decimals: 0,           // the number of decimal places to show
                formatter: formatter,  // handler for formatting the value before rendering
                onUpdate: null,        // callback method for every time the element is updated
                onComplete: null       // callback method for when the element finishes updating
              };
              
              function formatter(value, settings) {
                return value.toFixed(settings.decimals);
              }
            }(jQuery));

            jQuery(function ($) {
              // custom formatting example
              $('.count-number').data('countToOptions', {
              formatter: function (value, options) {
                return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
              }
              });
              
              // start all the timers
              $('.timer').each(count);  
              
              function count(options) {
              var $this = $(this);
              options = $.extend({}, options || {}, $this.data('countToOptions') || {});
              $this.countTo(options);
              }
            });
        </script>

        <!-- alert specialchar for domain input realtime -->
        <script type="text/javascript">
          // Add error message element after input.
          $('#some-number').after('<span class="error-message"><font color="red"><p align="center">Can not input special character ! @ # $ % ^ & 8 ( ) + | / < > , ? [ ] { }</font></span>')

          $('#some-number').on('input', function (evt) {
            var value = evt.target.value
            
            if (value.length === 0) {
              evt.target.className = ''
              return
            }

            // if ($.isNumeric(value)) {
            //   evt.target.className = 'valid'
            // } else {
            //   evt.target.className = 'invalid'
            // }

            if (/^[A-Za-z0-9-.]*$/.test(value)) {
              evt.target.className = 'valid'

              // show input realtime text
              $('#display').text($(this).val());

            } else {
              evt.target.className = 'invalid'
            }

          })
        </script>

        <!-- show domain input realtime -->
        <script type="text/javascript">
          $('#name').keyup(function () {
            $('#display').text($(this).val());
          });
        </script>

</body>
</html>


<!-- circle graph -->
<!-- https://bootsnipp.com/snippets/nrDmZ -->
