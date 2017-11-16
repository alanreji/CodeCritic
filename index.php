<?php
    session_start();
    if(isset($_SESSION['u_id']))
        header("Location: contests.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Codecritic Home</title>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1" name="viewport">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <link href="css/bootstrap.min.css"
                rel="stylesheet">
        <link href="css/styles.css"
              rel="stylesheet">
    </head>
    <body>
        <div class="text-center">
            <h1>
                <a href="index.php">
                    <b>&ltCODE&gtcritic</b>
                </a>
            </h1>
            <p>
                <b>"Talk is cheap, Show me the code!" -Linus Torvalds</b>
            </p>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 justify-content-center col-sm-12 col-lg-8 col-md-12 align-content-center">
                        <img style="margin: auto !important;" width="70%" src="assets/img/Coder-PNG-Clipart.png">
                </div>
                <div class="col-12 col-sm-12 col-lg-4 col-md-12">
                    <form>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" name="email" class="form-control" id="email"  placeholder="Enter email" required>
                            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                        </div>
                        <div class="loginmsg" id="loginmsg"></div>
                        <button type="submit" name="submit" class="btn btn-primary">Sign in</button>
                        <div class="indtext">
                            <a href="signup.php">Create an account</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="footer">
            <p>
                <a target="blank" href="http://cs19.club/history.php">Cs19.Club</a> © 2017 <br> Powered By CSE B
            </p>
        </div>
        <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script>
            $(function () {
                $('form').on('submit', function (event) {
                    event.preventDefault();
                    var email = $('#email').val();
                    var password = $('#password').val();
                    $.post('loginprocess.php', {'email': email, 'password': password}, function(gog) {
                        var msg = '';
                        if(gog == '-2')
                            msg = 'Operation failed - Contact admin';
                        else if(gog == '-1')
                            msg = 'Email not found';
                        else if(gog == '0')
                            msg = 'Incorrect password';
                        else
                            window.location.replace("contests.php");
                        $("#loginmsg").html(msg);
                    });
                });
            });
        </script>
    </body>
</html>
