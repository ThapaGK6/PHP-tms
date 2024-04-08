<?php require('../layouts/header.php'); ?>

<?php require('../layouts/navbar.php'); ?>

<section class="py-5">
    <div class="container">
        <div class="card w-35 mx-auto p-2 ">
            <h3 class="text-center">Add User</h3>
            <div class="card-body ">

              <?php
              if(isset($_POST['submit'])){
                $title = $_POST['title'];
                $filename= $_FILES['dataFile']['name'];
                $filesize=$_FILES['dataFile']['size'];
                $explode=explode('.', $filename);
                $file= strtolower($explode[0]);
                $ext= strtolower($explode[1]);
                $finalname= $file.time().'.'.$ext;
                $description=$_POST['description'];

                // echo $finalname;
                
                if ($title!= "" && $description != "" && $filename != ""  ) {
                    if ($filesize>20000){

                    } else{
                        echo "file size must be 2kb";
                    }
                    if($ext=="png" || $ext == "jpg" || $ext == "jpeg"){
                        if(move_uploaded_file($_FILES['dataFile']['tmp_name'],'../uploads/'.$finalname)){
                            $insert= "INSERT INTO files (title, img_link, type, description) VALUES ('$title', '$finalname', '$ext', '$description')";
                            $result= mysqli_query($con, $insert);

                            if($result ){
                                echo "file is submitted";
                            }
                            else{
                                echo "file is not submitted";
                            }

                        }else{
                            echo "file is not uploaded";
                        }


                    }else{
                        echo "file extension doesnt match";
                    }


                }
                else{
                    echo "all field are required";
                }

              }


              
              
              
              ?>


                
                <form action="#" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="input1" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" id="input1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="input1" class="form-label">Image </label>
                        <input type="file" class="form-control" name="dataFile" id="input1" aria-describedby="emailHelp">
                    </div>

                   <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label"></label>Description
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3"></textarea>
                   </div>
                   
                    <button type="submit" class="btn btn-danger btn-sm" name="submit">Submit</button>
                    <span> Have already an account <a href="index.php"> Login</a></span>
                </form>
            </div>
        </div>
    </div>
</section>

<?php require('../layouts/footer.php'); ?>