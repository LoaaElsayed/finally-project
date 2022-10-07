<?php
include "../shared/head.php";
include "../shared/header.php";
include "../shared/aside.php";
include "../general/config.php";
include "../general/functions.php";


if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $select = "SELECT * FROM `diploma` WHERE id= $id";
    $s = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($s);

    if (isset($_POST['edit'])) {
        $name = $_POST['username'];
        $time = $_POST['duration'];
        $start = $_POST['start'];
        $price = $_POST['price'];
        $newDate = date("Y/m/d", strtotime($start));
        $update = "UPDATE `diploma` SET `name`='$name',`duration`='$time',`start`='$newDate', `price`=$price WHERE id= $id ";
        $q = mysqli_query($conn, $update);
        go("/diploma/list.php");
    }
}

?>



<main id="main" class="main">
    <h1 class="display-4 text-center"> Update Diploma </h1>
    <div class="container p-5">
        <div class="card p-5">
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group mt-5">
                        <label for="exampleInputUsername1">Diploma name</label>
                        <input type="text" name="username" value="<?= $row['name']?> " class="form-control" id="exampleInputUsername1" placeholder="Username">
                    </div>
                    <div class="form-group mt-5">
                        <label for="exampleInputEmail1">Duration</label>
                        <input type="text" class="form-control" value="<?= $row['duration']?> " name="duration" id="exampleInputEmail1" placeholder="Duration">
                    </div>
                    <div class="form-group mt-5">
                        <label for="exampleInputPassword1">Start</label>
                        <input type="date" class="form-control" value="<?= $row['start']?>"  name="start" id="exampleInputPassword1" placeholder="Start">
                    </div>
                    <div class="form-group mt-5">
                        <label for="exampleInputPassword1">price</label>
                        <input type="text" class="form-control" required name="price" id="exampleInputPassword1" placeholder="price">
                    </div>
                    <button type="submit" name="edit" class="btn btn-primary me-5">update</button>
                </form>
            </div>
        </div>
    </div>

</main>


<?php
include "../shared/footer.php";
include "../shared/script.php";
?>