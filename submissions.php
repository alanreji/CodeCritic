<?php
    session_start();
    if(!isset($_SESSION['u_id']))
        header("Location: index.php");
        include "assets/php/dbtemplate.php";
    $sql = 'SELECT p_id,subtime,result, (SELECT probname FROM problemlist p2 WHERE p2.p_id = p_id)
     as names FROM solutions s1 WHERE u_id='.$_SESSION['u_id'].' ORDER BY subtime DESC';
    $result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
    <head>
        <title>My Submissions</title>
        <?php include 'assets/php/headtemplate.php';?>
    </head>
    <body>
        <?php include 'assets/php/bodytemplate.php';?>
        <?php
        if(mysqli_num_rows($result) == 0)
            echo "No submissions made by you. Happy coding.";
        else{
            while($row = $result->fetch_assoc()){
                $msg='';
                if($row['result']<0)
                    $msg = 'list-group-item-danger';
                elseif($row['result']>0)
                    $msg = 'list-group-item-success';
                echo '<ul class="list-group">';
                echo '
                        <li class="list-group-item d-flex justify-content-between align-items-center '.$msg.'" style="padding: 1%">
                            '.$row['names'].'
                            <span class="badge badge-primary badge-pill">'.$row['subtime'].'</span>
                        </li>
                ';
                echo '</ul>';
            }
        }
        ?>
        <?php include 'assets/php/tailtemplate.php';?>
    </body>
</html>