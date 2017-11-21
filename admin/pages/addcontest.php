<?php
    session_start();
    if(!isset($_SESSION['u_id']))
        header("Location: http://brutecat.me/codecritic");
    if($_SESSION["u_id"]!=7)
        header("Location: http://brutecat.me/codecritic");
?>
<?php
include 'dbtemplate.php';
if(isset($_POST['contestname'])){
    $msg = "Failed";
        $msg = "You are in";
        $contestname = $_POST['contestname'];
        $contestdesc = $_POST['contestdesc'];
        $startdate = $_POST['startdate'];
        $enddate = $_POST['enddate'];
        $sql = 'INSERT into contests (contestname,contestdesc,startdate,enddate) VALUES ("'.$contestname.'","'.$contestdesc.'","'.$startdate.'","'.$enddate.'");';
        if ($conn->query($sql) === TRUE) {
            $msg = "Contest creation successful. Go to <a href='tables.php'>tables</a>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    echo $msg;
}
?>