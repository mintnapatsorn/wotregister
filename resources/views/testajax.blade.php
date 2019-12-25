<html>
    <head>
        <title>Inserting Form Data Into MySQL Using PHP and AJAX</title>
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        
    </head>
    <body background="21.png">
        <!--The "message" id will be display via PHP and AJAX-->
        <p id="message"></p>     
            <form id="my-for" action="" method="post">
                {{csrf_field()}}

                <input type="hidden" name="domain" placeholder="Name" value="test2.gw.meca.in.th" required>
                <!-- <input type="text" name="reclamtoken" placeholder="Email" required> -->
                <input id="test2.gw.meca.in.th" type="text" name="reclamtoken" value="mint :)" placeholder="Email" required>
                <button  type="submit">Insert</button>
            </form>

        <!--AJAX-->
        <!-- <script>
            $(document).ready(function() {
                $("#my-for").submit(function(e) {
                    e.preventDefault();
                    $.ajax( {
                        url: "{{url('updatereclamtokentest')}}",
                        method: "post",
                        dataType: "text",
                        data: $("form").serialize(),

                        success: function(strMessage) {
                            $("#message").text(strMessage);
                            $("#my-form")[0].reset();
                        }
                    });
                });
            });
        </script> -->

        <script>
            $(document).ready(function() {
                $("#my-for").submit(function(e) {

                    var domain = "test2.gw.meca.in.th";
                    var reclamtoken = "mint naka :)";

                    e.preventDefault();
                    $.ajax({
                        url: "{{url('updatereclamtokentest')}}",
                        method: "post",
                        dataType: "text",
                            
                        data: {
                          domain: domain,
                          reclamtoken: reclamtoken
                        },

                        success: function(strMessage) {
                            $("#message").text(strMessage);
                            $("#my-form")[0].reset();
                        }
                    });

                });
            }
        </script>

    </body>
</html>