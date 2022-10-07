<?php
include "../shared/head.php";
include "../shared/header.php";
include "../shared/aside.php";
include "../general/config.php";
include "../general/functions.php";
$message = "";

$ErrorsValidation = [];

if (isset($_POST['Submit'])) {
    $name = $_POST['username'];
    $time = $_POST['duration'];
    $start = $_POST['start'];
    $newDate = date("Y/m/d", strtotime($start));
    $price = $_POST['price'];
    if (trim($name) == "") {
        $ErrorsValidation[] = "please enter valid name";
    }
    if (trim($time) == "") {
        $ErrorsValidation[] = "please enter valid time";
    }
    if (empty($ErrorsValidation)) {
        $insert = "INSERT INTO `diploma` VALUES (null,'$name','$time','$newDate',$price)";
        $q =  mysqli_query($conn, $insert);
        //   go("/diploma/list.php"); 
    }

}

?>
<main id="main" class="main">
    <h1 class="display-4 text-center"> Add new Diploma </h1>
    <?php if (!empty($message)) : ?>
        <div class="alert alert-success">
            <?php echo $message ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($ErrorsValidation)) : ?>
        <div class="alert alert-danger mx-auto w-50">
            <ul>
                <?php foreach ($ErrorsValidation as $error) :   ?>
                    <li> <?= $error?> </li>
                <?php endforeach;  ?>
            </ul>
        </div>
    <?php endif; ?>

    <div class="container p-5">
        <div class="card p-5">
            <div class="card-body ">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group mt-5">
                        <label for="exampleInputUsername1">Diploma name</label>
                        <input type="text" name="username" required class="form-control" id="exampleInputUsername1" placeholder="Username">
                    </div>
                    <div class="form-group mt-5">
                        <label for="exampleInputEmail1">Duration</label>
                        <input type="text" class="form-control" required name="duration" id="exampleInputEmail1" placeholder="Duration">
                    </div>
                    <div class="form-group mt-5">
                        <label for="exampleInputPassword1">Start</label>
                        <input type="date" class="form-control" required name="start" id="exampleInputPassword1" placeholder="Start">
                    </div>
                    <div class="form-group mt-5">
                        <label for="exampleInputPassword1">price</label>
                        <input type="text" class="form-control" required name="price" id="exampleInputPassword1" placeholder="price">
                    </div>
                    <button type="submit" name="Submit" class="btn btn-primary mt-5">Submit</button>
                </form>
            </div>
        </div>
    </div>
</main>





<?php
include "../shared/footer.php";
include "../shared/script.php";
?>