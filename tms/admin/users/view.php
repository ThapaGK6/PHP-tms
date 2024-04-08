<?php require('../layouts/header.php'); ?>

<?php require('../layouts/navbar.php'); ?>

<section class="py-5">
    <div class="container">
        <div class="title">
            <a class="btn btn-primary btn-sm " href="index.php" role="button"> Manage users</a>
        </div>
        <div class="card w-35 mx-auto p-2 ">
            <h3 class="text-center">Add User</h3>
            <div class="card-body ">

                <?php

                if(isset($_GET['id'])){
                    $id =$_GET['id'];

                    $data="SELECT *FROM users where id='$id'";
                    $data_result= mysqli_query($con, $data);
                    $fetch_data= mysqli_fetch_assoc($data_result);


                }

                ?>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="input1" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" readonly value="<?php echo  $fetch_data['name']; ?>" id="input1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="input1" class="form-label">Address</label>
                        <input type="text" class="form-control" readonly name="address" value="<?php echo  $fetch_data['address']; ?>" id="input1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="input1" class="form-label">Phone</label>
                        <input type="text" class="form-control" readonly name="phone" id="input1" value="<?php echo  $fetch_data['phone']; ?>" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" class="form-control" readonly name="email" value="<?php echo  $fetch_data['email']; ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php require('../layouts/footer.php'); ?>