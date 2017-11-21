<?php
    session_start();
    if(!isset($_SESSION['u_id']))
        header("Location: http://brutecat.me/codecritic");
    if($_SESSION["u_id"]!=7)
        header("Location: http://brutecat.me/codecritic");
?>
<?php
include 'dbtemplate.php';
if(isset($_POST['p_id'])){
    $msg = "Failed";
        $msg = "You are in";
        $p_id = $_POST['p_id'];
        $sql = 'DELETE FROM problemlist WHERE p_id='.$p_id.';';
        if ($conn->query($sql) === TRUE) {
            $msg = "Problem deletion successful. Go to <a href='tables.php'>tables</a>";
        }
    echo $msg;
}
?>