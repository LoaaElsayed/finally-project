<?php
include "../shared/headweb.php";
include "../general/config.php";


if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $dipID = $_POST['diploma'];
    $stateID = $_POST['state'];
    $image_name = time() . $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $location = "./uploudimg/$image_name";
    move_uploaded_file($image_tmp , $location);
    $insert = "INSERT INTO `student` (`id`, `name`, `email`,`phone`,`dip_id`,`image`,`state_id`) 
    VALUES (null,'$name','$email',$phone,$dipID,'$location',$stateID)";
    $q = mysqli_query($conn, $insert);
}

$select = "SELECT * FROM `diploma`";
$run_select = mysqli_query($conn, $select);

$selectstate="SELECT * FROM `allstatejoindiploma`";
$select_state = mysqli_query($conn, $selectstate);


?>


    <section class="login-page">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mt-3">
                    <div class="login-item">
                        <h2 class="text-center">student login page</h2>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class=" p-3 border rounded">
                                <div class="form-group">
                                    <label for="name" class="mb-1">
                                        <h5>Name:</h5>
                                    </label>
                                    <input type="text" name="name" id="name" class="form-control" required />
                                </div>
                                <div class="form-group">
                                    <label for="email" class="mb-1 mt-3">
                                        <h5>Email:</h5>
                                    </label>
                                    <input name="email" type="email" id="email" class="form-control" required />
                                </div>
                                <div class="form-group">
                                    <label for="phone" class="mb-1 mt-3">
                                        <h5>Phone:</h5>
                                    </label>
                                    <input name="phone" type="number" id="phone" class="form-control" required />
                                </div>
                                <div class="form-group mt-3">
                                    <label for="diploma" class="mb-1 mt-3">
                                        <h5>Choose your Diploma:</h5>
                                    </label>
                                    <select name="diploma" class="form-control">
                                        <?php foreach ($run_select as $date) { ?>
                                            <option value="<?= $date['id'] ?>">
                                                <?= $date['name'] ?>&nbsp;:&nbsp;<?= $date['price'] ?>&nbsp;bound
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group mt-3">
                                <label for="diploma" class="mb-1 mt-3">
                                        <h5>Upload Image:</h5>
                                    </label>
                                    <input type="file" class="form-control" name="image">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="diploma" class="mb-1 mt-3">
                                        <h5>Choose state:</h5>
                                    </label>
                                        <select name="state" class="form-control">
                                            <?php foreach ($select_state as $state) { ?>
                                                <option value="<?= $state['id'] ?>">
                                                    <?= $state['state'] ?> &nbsp;
                                                    <?= $state['num_days']?>&nbsp;
                                                    From<?= $state['time start'] ?>To<?= $state['time end'] ?>
                                                    &nbsp;[<?= $state['diploma_name']?>]
                                                </option>
                                            <?php } ?>
                                        </select>
                                </div>
                                <div class="form-group ">
                                    <button type="submit" name="submit" class="btn btn-block mt-3">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="log-img overflow-hidden">
                        <img width="100%" src="../assets_f/img/Privacy policy-rafiki.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
include "../shared/footerweb.php";
?>