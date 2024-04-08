<?php require('../layouts/header.php'); ?>

<?php require('../layouts/navbar.php'); ?>

<section class="py-5">
    <div class="container">
        <div class="card w-35 mx-auto p-2 ">
            <h3 class="text-center">Add User</h3>
            <div class="card-body ">

                <?php

                if (isset($_POST['register'])) { 
                    $name = $_POST['name'];
                    $address = $_POST['address'];
                    $phone = $_POST['phone'];
                    $email = $_POST['email'];
                    $password = md5($_POST['password']);

                    if ($name != "" && $address != "" && $phone != "" && $email != "") {
                        $insert = "INSERT INTO users(name, address, phone, email, password)
        VALUES('$name', '$address', '$phone', '$email', '$password')";
                        $result = mysqli_query($con, $insert);

                        if ($result) {
                            ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>User is created</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                            header("Refresh:2; URL=index.php?success");

                        } else {
                            ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>User is not created</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                            header("Refresh:2; URL=create.php?error");
                        }
                    } else {

                        header("Refresh:0; URL=create.php?empty");
                    }
                }

                ?>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="input1" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="input1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="input1" class="form-label">Address</label>
                        <input type="text" class="form-control" name="address" id="input1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="input1" class="form-label">Phone</label>
                        <input type="tel" class="form-control" name="phone" id="input1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                    </div>
                    <button type="submit" class="btn btn-danger btn-sm" name="register">Submit</button>
                    <span> Have already an account <a href="index.php"> Login</a></span>
                </form>
            </div>
        </div>
    </div>
</section>

<?php require('../layouts/footer.php'); ?>