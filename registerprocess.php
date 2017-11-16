<?php
    if (!($_SERVER['REQUEST_METHOD'] === 'POST')) {
        echo "BAD GATEWAY";
    }
    else
    {
        $flag=0;
        include "assets/php/dbtemplate.php";
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $firstname = stripslashes($firstname);
        $lastname = stripslashes($lastname);
        $email = stripslashes($email);
        $password = stripslashes($password);
        if(!$conn)
            $flag = -3;
        $sql = "SELECT username from user WHERE username='$username'";
        $result = $conn->query($sql);
        if(mysqli_num_rows($result) > 0)
            $flag = -1;
        $sql = "SELECT email from user WHERE email='$email'";
        $result = $conn->query($sql);
        if(mysqli_num_rows($result) > 0)
            $flag = -2;
        if($flag == 0){
            $sql = 'INSERT into user (username,firstname,lastname,email,password) VALUES ("'.$username.'","'.$firstname.'","'.$lastname.'","'.$email.'","'.$password.'")';
            if ($conn->query($sql) === TRUE) {
                $flag = 1;
            } else {
                $flag = -3;
            }
        }
        echo $flag;
    }
?>