<?php
    session_start();
    if(!isset($_SESSION['u_id']))
        header("Location: http://brutecat.me/codecritic");
    if($_SESSION["u_id"]!=7)
        header("Location: http://brutecat.me/codecritic");
?>
<?php
    include 'dbtemplate.php';
    if(isset($_POST['prob_id'])){
        $p_id = $_POST['prob_id'];
        $p_id = mysqli_real_escape_string($conn, $p_id);
        $p_id = stripslashes($p_id);
        $sql = "SELECT * FROM problemlist WHERE p_id = '$p_id'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }
    if(isset($_POST['prob_id2'])){
        $p_id = $_POST['prob_id2'];
        $p_id = mysqli_real_escape_string($conn, $p_id);
        $p_id = stripslashes($p_id);
        $sql = "SELECT * FROM problemlist WHERE p_id = '$p_id'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CodeCritic Admin Panel</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

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
                            <li><a href="http://brutecat.me/codecritic"><i class="fa fa-user fa-fw"></i> Go Home</a>
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
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Update/Delete problem</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit Problem
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12" id="up_prob">
                                    <form method="post" action="forms.php" role="form" id="get_prob">
                                        <div class="form-group">
                                            <label>Enter problem id</label>
                                            <input name="prob_id" class="form-control">
                                            <p class="help-block">Get the problem id from the table.</p>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Get Data</button>
                                    </form>
                                    <?php 
                                    if(isset($_POST['prob_id'])){
                                        if(mysqli_num_rows($result) > 0)
                                            echo '
                                            <form role="form" id="update_prob">
                                                <div class="form-group">
                                                    <label>Problem id</label>
                                                    <input value="'. $row["p_id"].'" id="p_id" class="form-control" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label>Problem Name</label>
                                                    <input value="'.$row['probname'].'" id="p_name" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlTextarea1">Problem Description</label>
                                                    <textarea class="form-control" id="p_desc" rows="5">'.$row['probdesc'].'</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Max Mark</label>
                                                    <input value="'.$row['maxmark'].'" id="p_mark" class="form-control">
                                                </div>
                                                <button type="submit" name="update" class="btn btn-warning">Update Data</button>
                                            </form>
                                            ';
                                        else
                                            echo 'No matches for the given problem id. Please check with the table.';
                                    }
                                    ?>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Delete problem
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12" id="del_prob">
                                    <form method="post" action="forms.php" role="form" id="get_prob">
                                        <div class="form-group">
                                            <label>Enter problem id</label>
                                            <input name="prob_id2" class="form-control">
                                            <p class="help-block">Get the problem id from the table.</p>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Get Data</button>
                                    </form>
                                    <?php 
                                    if(isset($_POST['prob_id2'])){
                                        if(mysqli_num_rows($result) > 0)
                                            echo '
                                            <form role="form" id="delete_prob">
                                                <div class="form-group">
                                                    <label>Problem id</label>
                                                    <input value="'. $row["p_id"].'" id="p_id2" class="form-control" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label>Problem Name</label>
                                                    <input value="'.$row['probname'].'" id="p_name2" class="form-control" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlTextarea1">Problem Description</label>
                                                    <textarea class="form-control" id="p_desc2" rows="5" disabled>'.$row['probdesc'].'</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Max Mark</label>
                                                    <input value="'.$row['maxmark'].'" id="p_mark2" class="form-control" disabled>
                                                </div>
                                                <button type="submit" name="update" class="btn btn-danger">Delete Entry</button>
                                            </form>
                                            ';
                                        else
                                            echo 'No matches for the given problem id. Please check with the table.';
                                    }
                                    ?>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
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

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
    <script>
        $('#update_prob').on('submit', function (event) {
                event.preventDefault();
                var p_id = $('#p_id').val();
                var probname = $('#p_name').val();
                var probdesc = $('#p_desc').val();
                var maxmark = $('#p_mark').val()
                $.post('updateprob.php', {'p_id': p_id,'probname': probname,'probdesc': probdesc,'maxmark': maxmark}, function(gog) {
                    $('#up_prob').html(gog);
                });
            });
    </script>
    <script>
        $('#delete_prob').on('submit', function (event) {
                event.preventDefault();
                var p_id = $('#p_id2').val();
                $.post('deleteprob.php', {'p_id': p_id}, function(gog) {
                    $('#del_prob').html(gog);
                });
            });
    </script>

</body>

</html>
