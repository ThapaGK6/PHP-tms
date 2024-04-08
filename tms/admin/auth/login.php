<?php
require('../connection/config.php');
session_start();
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    if ($email != "" && $password != "") {
        $select = "SELECT * from users where email = '$email' AND password= '$password'";
        $result = mysqli_query($con, $select);
        if (mysqli_num_rows($result) > 0) {
            $data = mysqli_fetch_assoc($result);
            
            $_SESSION['name'] = $data['name'];
            $_SESSION['email'] = $data['email'];
            header("Refresh:0; url = ../dashboard.php?msg=success");
        }
        else{

            header("Refresh:0; url = ../index.php?error");

        }
    }
    else{
        echo "all field are required";
    }
}
