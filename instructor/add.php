<?php
include "../shared/head.php";
include "../shared/header.php";
include "../shared/aside.php";
include "../general/config.php";
include "../general/functions.php";



if(isset($_POST['send'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $dipId = $_POST['dipId'];
    $image_name = time() . $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $location = "./upload/";
    move_uploaded_file($tmp_name , $location . $image_name);
 
    $insert = "INSERT INTO `instructor` VALUES (null,'$name','$email','$image_name',$dipId)";
    mysqli_query($conn , $insert);
}

$select = "SELECT * FROM `diploma`";
$diploma =mysqli_query($conn , $select);

?>





<main id="main" class="main">


<h1 class="text-center display-4 mt-3">Instructor Page</h1>
<div class="container col-6 mt-3">
    <div class="card">
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group mt-5">
                    <label for=""> Name</label>
                    <input type="name" class="form-control" name="name">
                </div>

                <div class="form-group mt-5">
                    <label for=""> Email</label>
                    <input type="email" class="form-control" name="email">
                </div>

                <div class="form-group mt-5">
                    <label for="">Image Profile</label>
                    <input type="file" class="form-control" name="image">
                </div>

                <div class="form-group mt-5">
                    <label for="">Diploma</label>
                    <select class="form-control" name="dipId">
                        <?php foreach ($diploma  as $data) { ?>
                            <option value="<?php echo $data['id'] ?>"> <?php echo $data['name'] ?> </option>
                        <?php } ?>
                    </select>
                </div>
                <button class="btn btn-info" name="send">Send</button>
            </form>
        </div>
    </div>
</div>

</main>



<?php 
include "../shared/footer.php";
include "../shared/script.php";
?>

