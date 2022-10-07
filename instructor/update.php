<?php
include "../shared/head.php";
include "../shared/header.php";
include "../shared/aside.php";
include "../general/config.php";
include "../general/functions.php";


if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $selectupsate = "SELECT * from `instructor` WHERE id = $id";
    $seupdate = mysqli_query($conn, $selectupsate);
    $row = mysqli_fetch_assoc($seupdate);
    if (empty($_FILES['image']['name'])) {
        $image_name = $row['image'];
    } else {
        $image_name = time() . $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $location = "./upload/";
        move_uploaded_file($image_tmp, $location.$image_name);
    }
}
if (isset($_POST['update'])) {
    $Name = $_POST['username'];
    $email = $_POST['email'];
    $image_name = time() . $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $location = "./upload/$image_name";
    move_uploaded_file($image_tmp, $location);
    $depID = $_POST['dipId'];
    $update = "UPDATE `instructor` SET `name`='$Name',`email`='$email',`image`='$image_name' ,`dip_id`='$depID' WHERE id=$id ";
    $up = mysqli_query($conn, $update);
    go('instructor/list.php');
}


$select = "SELECT * FROM `diploma`";
$diploma = mysqli_query($conn, $select);
?>

<main id="main" class="main">
    <h1 class="display-4 text-center"> Update instructor </h1>
    <div class="container p-5">
        <div class="card p-5">
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group mt-5">
                        <label for="exampleInputUsername1">Diploma name</label>
                        <input type="text" name="username" value="<?= $row['name'] ?> " class="form-control" id="exampleInputUsername1" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label for=""> Email</label>
                        <input type="text" class="form-control" name="email" value="<?= $row['email'] ?>">
                    </div>
                    <div class="form-group">
                        <label for=""> Image : <img src="/testinstant/<?= $row['image'] ?>" width="20"></label>
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
                    <button type="submit" name="update" class="btn btn-primary me-2">update</button>
                </form>
            </div>
        </div>
    </div>

</main>



<?php
include "../shared/footer.php";
include "../shared/script.php";
?>