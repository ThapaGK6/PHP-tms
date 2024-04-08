<?php
require('../connection/config.php');

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password =md5 ($_POST['password']);

    if ($name != "" && $address != "" && $phone != "" && $email != ""  ) {
        $select= "SELECT * FROM users where email = '$email' ";
        $result = mysqli_query ($con, $select );

        if (mysqli_num_rows($result) >0){
            echo"This email already exists";

        }
        else{

            $insert= "INSERT INTO users(name, address, phone, email, password)
            VALUES('$name', '$address', '$phone', '$email', '$password')";
            $result=mysqli_query($con, $insert);
    
            if($result){
                header("Refresh:0; URL=../users/index.php?success");
            }
            else{
                header("Refresh:0; URL=../register.php?error");
            }
        }

        // $insert= $con->query("INSERT INTO users(name, address, phone, email, password)
        // VALUES('$name', '$address', '$phone', '$email', '$password')");
    } else {

        header("Refresh:0; URL=../register.php?empty");
    }
}

?>