<?php
    session_start();
    if(!isset($_SESSION['u_id']))
        header("Location: index.php");
    $contestid = $_GET['contest'];
    $contestid = stripslashes($contestid);
    //$contestid = mysqli_escape_string($contestid);
    $conn = mysqli_connect('localhost','root','','db_codecritic');
    $sql = "SELECT p_id,probname,maxmark from problemlist where c_id = $contestid";
    $sql2 = "SELECT contestname from contests where c_id = $contestid";
    $result = $conn->query($sql2);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    }
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Challenges</title>
        <?php include 'assets/php/headtemplate.php';?>
    </head>
    <body>
        <?php include 'assets/php/bodytemplate.php';?>
        <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()){
                    //displaying challenge list
                    echo '
                        <div class="list-group">
                            <a href="viewchallenge.php?challenge='.$row['p_id'].'" class="list-group-item list-group-item-action">
                            '.$row['probname'].'
                            </a>
                        </div>
                    ';
                }
            } else {
                echo "No Problems availabe right now! Try again after some time.";
            }
        ?>
        <?php include 'assets/php/tailtemplate.php';?>
    </body>
</html>