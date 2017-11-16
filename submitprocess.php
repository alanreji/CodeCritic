<?php
    session_start();
    if(!isset($_SESSION['u_id']))
        header("Location: index.php");
    $u_id = 0;
    $p_id = 0;
    if(isset($_SESSION["u_id"]) && isset($_SESSION["p_id"])){
        $u_id = $_SESSION["u_id"];
        $p_id = $_SESSION["p_id"];
    } else{
        $msg = "404 NOT FOUND";
        exit();
    }
    $target_dir = "uploads/";
    $uploadOk = 1;
    $types = ['Python' => 3, 'C' => 2, 'Java' => 1 ];
    include "assets/php/dbtemplate.php";
    $sql = 'SELECT max(s_id) from solutions';
    $fileType = substr($_FILES["fileToUpload"]["name"],strpos($_FILES["fileToUpload"]["name"],'.')+1);
    $msg = "$fileType";
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 200000) {
        $msg = "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($fileType != "py" && $fileType != "java" && $fileType != "c"
    && $fileType != "cpp" ) {
        $msg = "Sorry, That was an unsupported filetype";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    $max = 0;
    if ($uploadOk == 1){
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        if ($result->num_rows > 0) {
            $max = (int)$row['max(s_id)']+1;
        }
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir.$max.'.'.$fileType)) {
            $msg = "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            $sql = 'INSERT into solutions (u_id,p_id,language,result) VALUES ('.$u_id.','.$p_id.','.$types[$_POST['filelang']].',0)';
            if ($conn->query($sql) === TRUE) {
                $msg = "New record created successfully";
            } else {
                $msg = "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            $msg = "Sorry, there was an internal error uploading your file.";
        }
    }
?>