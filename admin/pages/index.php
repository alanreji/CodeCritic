<?php
    session_start();
    if(!isset($_SESSION['u_id']))
        header("Location: http://brutecat.me/codecritic");
    if($_SESSION["u_id"]!=7)
        header("Location: http://brutecat.me/codecritic");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Panel</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">CodeCritic Admin Panel</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="http://brutecat.me/codecritic"><i class="fa fa-user fa-fw"></i> Go home</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="http://brutecat.me/codecritic/logoutprocess.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="tables.php"><i class="fa fa-table fa-fw"></i> Tables</a>
                        </li>
                        <li>
                            <a href="forms.php"><i class="fa fa-edit fa-fw"></i> Forms</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row" style="margin-bottom:2%">
                <div class="col-lg-6">
                    <h3 class="page-header">Create contest</h1>
                    <form role="form" id="create_contest">
                        <div class="form-group">
                            <label>Contest Name</label>
                            <input id="c_name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Contest Description</label>
                            <textarea class="form-control" id="c_desc" rows="5" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="date1">Start Date</label>
                            <input id="startdate" type="date" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="date2">End date</label>
                            <input id="enddate" type="date" class="form-control" required>
                        </div>
                        <button type="submit" name="update" class="btn btn-success">Create Contest</button>
                    </form>
                    <div id="add_contest"></div>
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    <h3 class="page-header">Add problem</h1>
                    <form role="form" id="create_prob">
                        <div class="form-group">
                            <label>Contest ID</label>
                            <input id="c_id" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Problem Name</label>
                            <input id="p_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Problem Description</label>
                            <textarea class="form-control" id="p_desc" rows="5" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Max Mark</label>
                            <input id="p_mark" class="form-control" required>
                        </div>
                        <button type="submit" name="update" class="btn btn-primary">Add Problem</button>
                    </form>
                    <div id="add_prob"></div>
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
            <!-- <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-bell fa-fw"></i> Notifications Panel
                    </div>
                    <div class="panel-body">
                        <div class="list-group">
                            <a href="#" class="list-group-item">
                                <i class="fa fa-comment fa-fw"></i> New Comment
                            </a>
                            <a href="#" class="list-group-item">
                                <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                            </a>
                            <a href="#" class="list-group-item">
                                <i class="fa fa-envelope fa-fw"></i> Message Sent
                            </a>
                            <a href="#" class="list-group-item">
                                <i class="fa fa-tasks fa-fw"></i> New Task
                            </a>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>
    <script>
        $('#create_prob').on('submit', function (event) {
                event.preventDefault();
                var c_id = $('#c_id').val();
                var probname = $('#p_name').val();
                var probdesc = $('#p_desc').val();
                var maxmark = $('#p_mark').val()
                $.post('addquestion.php', {'c_id': c_id,'probname': probname,'probdesc': probdesc,'maxmark': maxmark}, function(gog) {
                    $('#add_prob').html(gog);
                });
            });
    </script>
    <script>
        $('#create_contest').on('submit', function (event) {
                event.preventDefault();
                var contestname = $('#c_name').val();
                var contestdesc = $('#c_desc').val();
                var startdate = $('#startdate').val()
                var enddate = $('#enddate').val()
                $.post('addcontest.php', {'contestname': contestname,'contestdesc': contestdesc,'startdate': startdate,'enddate': enddate}, function(gog) {
                    $('#add_contest').html(gog);
                });
            });
    </script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
