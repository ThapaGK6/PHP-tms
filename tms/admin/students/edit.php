<?php require('../layouts/header.php'); ?>

<?php require('../layouts/navbar.php'); ?>

<section class="py-5">
    <div class="container">
        <div class="card w-35 mx-auto p-2 ">
            <h3 class="text-center">Add User</h3>
            <a class="btn btn-primary btn-sm " href="index.php" role="button"> Manage users</a>
            <div class="card-body ">

                <?php

                if (isset($_GET['id'])) {
                    $id = $_GET['id'];

                    $data = "SELECT *FROM students where id='$id'";
                    $data_result = mysqli_query($con, $data);
                    $fetch_data = mysqli_fetch_assoc($data_result);
                }

                if (isset($_POST['register'])) {
                    $name = $_POST['name'];
                    $address = $_POST['address'];
                    $phone = $_POST['phone'];
                    $email = $_POST['email'];
                    $email = $_POST['sem'];
                    $email = $_POST['faculty'];


                    if ($name != "" && $address != "" && $phone != "" && $email != "" && $sem != "" && $faculty != "") {
                        $insert = "UPDATE users SET name='$name', address='$address', phone='$phone', email='$email', sem='$sem', faculty='$faculty' where id='$id'";
                        $result = mysqli_query($con, $insert);

                        if ($result) {
                ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>User is Updated</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                            header("Refresh:2; URL=index.php?success");
                        } else {
                        ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>User is not Updated</strong>
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
                        <input type="text" class="form-control" name="name" value="<?php echo  $fetch_data['name']; ?>" id="input1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="input1" class="form-label">Address</label>
                        <input type="text" class="form-control" name="address" value="<?php echo  $fetch_data['address']; ?>" id="input1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="input1" class="form-label">Phone</label>
                        <input type="text" class="form-control" name="phone" id="input1" value="<?php echo  $fetch_data['phone']; ?>" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="<?php echo  $fetch_data['email']; ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Semester</label>
                        <input type="text" class="form-control" name="sem" value="<?php echo  $fetch_data['sem']; ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Faculty</label>
                        <input type="text" class="form-control" name="faculty" value="<?php echo  $fetch_data['faculty']; ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <button type="submit" class="btn btn-danger btn-sm" name="register">Submit</button>
                    <span> Have already an account <a href="index.php"> Login</a></span>
                </form>
            </div>
        </div>
    </div>
</section>

<?php require('../layouts/footer.php'); ?>