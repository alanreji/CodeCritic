<?php
    session_start();
    if(isset($_SESSION['u_id']))
        header("Location: contests.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <?php include 'assets/php/headtemplate.php';?>
</head>
<body>
    <div class="row" style="margin-bottom: 40px; padding: 6px">
        <div class="col-4">
            <h2>
                <a href="index.php">
                    <b>&ltCODE&gtcritic</b>
                </a>
            </h2>
        </div>
    </div>
    <div class="container">
        <div class="card card-register mx-auto mt-5">
        <div class="card-header">Register an Account</div>
        <div class="card-body">
            <form>
            <div class="form-group">
                <div class="form-row">
                <div class="col-md-6">
                    <label for="firstname">First name</label>
                    <input class="form-control" id="firstname" type="text" aria-describedby="nameHelp" placeholder="Enter first name">
                </div>
                <div class="col-md-6">
                    <label for="lastname">Last name</label>
                    <input class="form-control" id="lastname" type="text" aria-describedby="nameHelp" placeholder="Enter last name">
                </div>
                </div>
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input class="form-control" id="email" type="email" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="form-group">
                  <label for="username">Username</label>
                  <input class="form-control" id="username" type="text" aria-describedby="usernameHelp" placeholder="Enter username">
            </div>
            <div class="form-group">
                <div class="form-row">
                <div class="col-md-6">
                    <label for="password">Password</label>
                    <input class="form-control" id="password" type="password" placeholder="Password">
                </div>
                </div>
            </div>
            <div class="loginmsg" id="loginmsg"></div>
            <button type="submit" class="btn btn-primary btn-block">Register</button>
            </form>
            <div class="text-center">
            <a class="d-block small mt-3" href="index.php">Login Page</a>
            </div>
        </div>
        </div>
    </div>
    <?php include 'assets/php/tailtemplate.php';?>
    <script>
        $(function () {
            $('form').on('submit', function (event) {
                event.preventDefault();
                var email = $('#email').val();
                var password = $('#password').val();
                var username = $('#username').val();
                var firstname = $('#firstname').val();
                var lastname = $('#lastname').val();
                $.post('registerprocess.php', {'firstname': firstname,'lastname': lastname,'username': username,'email': email, 'password': password}, function(gog) {
                    var msg = '';
                    if(gog == '-3')
                        msg = 'Operation failed - Contact admin';
                    else if(gog == '-2')
                        msg = 'Email ID already registered';
                    else if(gog == '-1')
                        msg = 'Username already taken';
                    else
                        $(".card-body").html("Account has been created successfully. <a href='index.php'>Go to login</a>" );
                    $("#loginmsg").html(msg);
                });
            });
        });
    </script>
</body>
</html>
