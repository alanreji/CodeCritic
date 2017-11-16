<?php
    session_start();
    if(!isset($_SESSION['u_id']))
        header("Location: index.php");
    $challengeid = $_GET['challenge'];
    include "assets/php/dbtemplate.php";
    $challengeid = mysqli_real_escape_string ( $conn ,$challengeid );
    $challengeid = stripslashes($challengeid);
    $sql = "SELECT probname,probdesc from problemlist where p_id = $challengeid";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $_SESSION['p_id'] = $challengeid;
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>All Contests</title>
        <?php include 'assets/php/headtemplate.php';?>
    </head>
    <body>
        <?php include 'assets/php/bodytemplate.php';?>
        <?php
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                //displaying problem statement
                echo '
                    <div class="card">
                        <h3 class="card-header">'.$row['probname'].'</h3>
                        <div class="card-block" style="padding: 2%">
                            <p class="card-text">'.$row['probdesc'].'</p>
                        </div>
                        <ul class="list-group" style="padding: 2%">
                            <li class="list-group-item">
                                <form action="submitprocess.php" method="post" enctype="multipart/form-data" style="padding: 2%" >
                                    <div class="form-row">
                                    <div class="form-group col-md-8">
                                    <label for="sourcefile">Upload source file</label>
                                    <input type="file" class="form-control-file" id="sourcefile" name="fileToUpload" >
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="filelang">Language</label>
                                        <select id="filelang" name="filelang" class="form-control">
                                            <option selected>C</option>
                                            <option>Python</option>
                                            <option>Java</option>
                                        </select>
                                    </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                ';
           } else {
                echo "No Problems availabe right now! Try again after some tiiime.";
           }

        ?>
        <?php include 'assets/php/tailtemplate.php';?>
    </body>
</html>