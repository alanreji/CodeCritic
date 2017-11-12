<?php
    session_start();
    if(!isset($_SESSION['u_id']))
        header("Location: index.php");
    $flag=0;
    $conn = mysqli_connect('localhost','root','','db_codecritic');
    $email = $_POST['email'];
    $password = $_POST['password'];
    $email = stripslashes($email);
    $password = stripslashes($password);
    if(!$conn)
        $flag = -2;
    $sql = "SELECT u_id,password,username from user WHERE email='$email'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if(mysqli_num_rows($result) == 0)
        $flag = -1;
    else if($row["password"] == $password){
        $flag = 1;
        session_start();
        $_SESSION['username'] = $row["username"];
        $_SESSION['u_id'] = $row['u_id'];
    }
    echo $flag;
?>