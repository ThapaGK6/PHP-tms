
<?php require('../layouts/header.php'); ?>

<?php require('../layouts/navbar.php'); ?>

    <!-- <?php
    if (isset($_GET['success'])) {
    ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data is submitted!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php
    }
    ?> -->
    <?php
    if (isset($_GET['delete'])) {
    ?>
        <div class=" container alert alert-success alert-dismissible fade show" role="alert">
            <strong>User is Deleted!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php
    header("Refresh:2; URL=index.php");
    }
    ?>

    <section class="py-5">
        <div class="container">
            <div class="title">
                <a class="btn btn-primary btn-sm " href="create.php" role="button">Add File </a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">title</th>
                        <th scope="col">Image</th>
                        <th scope="col">Description</th>
                        <th scope="col">Type</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                   <?php
                   $select= "SELECT *FROM files";
                   $result=mysqli_query($con, $select);
                   $i =0;
                   while($data=mysqli_fetch_array($result)){
                    ?>
                        <tr>
                        <th scope="row"><?php echo ++$i; ?></th>
                        <td><?php echo $data['title'] ;?></td>
                        <td><img src="../uploads/<?php echo $data['img_link'] ;?>" alt="" width="100" height="100"></td>
                        <td><?php echo $data['description'] ;?></td>
                        <td><?php echo $data['type'] ;?></td>
                        <td>
                            <a class="btn btn-primary btn-sm " href="edit.php?id=<?php  echo $data['id'];?>" role="button">Edit </a>
                            <a class="btn btn-info btn-sm " href="view.php?id=<?php  echo $data['id'];?>" role="button">View </a>
                            <a class="btn btn-danger btn-sm " onclick="return confirm('Do you want to delete this user??');" href="delete.php?id=<?php echo $data['id']; ?>" role="button">Delete </a>
                            
                        </td>
                    </tr>
                    <?php
                   }
                   
                   ?>
                </tbody>
            </table>
        </div>
    </section>

   
<?php require('../layouts/footer.php'); ?>
