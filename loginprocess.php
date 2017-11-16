<?php
    if (!($_SERVER['REQUEST_METHOD'] === 'POST')) {
        echo "BAD GATEWAY";
    }
    else
    {
        $flag=0;
        include "assets/php/dbtemplate.php";
        $email = $_POST['email'];
        $email = mysqli_real_escape_string ( $conn ,$email );
        $password = $_POST['password'];
        $password = mysqli_real_escape_string ( $conn ,$password );
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
    }
?>