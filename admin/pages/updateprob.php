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
        $p_id = $_POST['p_id'];
        $probname = $_POST['probname'];
        $probdesc = $_POST['probdesc'];
        $maxmark = $_POST['maxmark'];
        $sql = "UPDATE problemlist SET probname = '$probname', probdesc = '$probdesc', maxmark = '$maxmark' WHERE problemlist.p_id = '$p_id';";
        $result = $conn->query($sql);
        if(isset($result))
            $msg = "Data has been updated successfully. Go to <a href='tables.php'>tables</a>";
    echo $msg;
}
?>