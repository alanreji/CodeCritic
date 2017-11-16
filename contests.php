<?php
    session_start();
    if(!isset($_SESSION['u_id']))
        header("Location: index.php");
        include "assets/php/dbtemplate.php";
    $sql = "SELECT * from contests";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>All Contests</title>
        <?php include 'assets/php/headtemplate.php';?>
    </head>
    <body>
        <?php include 'assets/php/bodytemplate.php';?>
        <div class="list-group">
        <?php
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo '
                    <a href="challenges.php?contest='.$row['c_id'].'" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">'.$row["contestname"].'</h5>
                        <small>'.$row["startdate"].'  to  '.$row["enddate"].'</small>
                        </div>
                        <p class="mb-1">'.$row["contestdesc"].'</p>
                        <!-- <small>Donec id elit non mi porta.</small>  -->
                    </a>
                    ';
                }
            } else {
                echo "No contests Hosted Right Now! Check back later.";
            }
        ?>
        </div>
        <?php include 'assets/php/tailtemplate.php';?>
    </body>
</html>