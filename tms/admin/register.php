<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Register</title>
    <style>
        .w-35 {
            width: 35%;
        }
    </style>
</head>

<body>

    <section class="py-5">
        <div class="container">
            <div class="card w-35 mx-auto p-2 ">
                <h3 class="text-center">Register</h3>
                <div class="card-body ">
                    <?php

                    if (isset($_GET['empty'])) {
                    ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>All!</strong>fields are required.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                    }

                    if (isset($_GET['error'])) {
                    ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Data is not submitted!</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                    }




                    ?>
                    <form action="auth/register.php" method="POST" enctype="multipart/form-data">
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
                            <input type="text" class="form-control" name="phone" id="input1" aria-describedby="emailHelp">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>