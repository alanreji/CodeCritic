<?php
    session_start();
    if(!isset($_SESSION['u_id']))
        header("Location: http://brutecat.me/codecritic");
    if($_SESSION["u_id"]!=7)
        header("Location: http://brutecat.me/codecritic");
?>
<?php
include 'dbtemplate.php';
if(isset($_POST['c_id'])){
    $msg = "Failed";
        $msg = "You are in";
        $c_id = $_POST['c_id'];
        $probname = $_POST['probname'];
        $probdesc = $_POST['probdesc'];
        $maxmark = $_POST['maxmark'];
        $sql = 'INSERT into problemlist (c_id,probname,probdesc,maxmark) VALUES ('.$c_id.',"'.$probname.'","'.$probdesc.'",'.$maxmark.');';
        $result = $conn->query($sql);
        if(isset($result))
            $msg = "Problem added successfully. Go to <a href='tables.php'>tables</a>";
    echo $msg;
}
?>