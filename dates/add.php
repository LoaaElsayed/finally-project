<?php
include "../shared/head.php";
include "../shared/header.php";
include "../shared/aside.php";
include "../general/config.php";
include "../general/functions.php";

if(isset($_POST['send'])){
    $state=$_POST['state'];
    $day=$_POST['day'];
    $time_s=$_POST['timestart'];
    $time_e=$_POST['timeend'];
    $dip_id =$_POST['dipid'];
    $insert_stat ="INSERT INTO `statediploma` VALUES (null,'$state','$day','$time_s','$time_e',$dip_id)";
    mysqli_query($conn , $insert_stat);
}
$select_dip = "SELECT * FROM `diploma`";
$diploma=mysqli_query($conn , $select_dip);

?>

<main id="main" class="main">
    <h1 class="display-4 text-center"> Add new Date for Group </h1>
<div class="container p-5"> 
    <div class="card p-5">
        <div class="card-body ">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group mt-5">
                    <label for="">Date state</label>
                    <input name="state" type="text" required class="form-control" placeholder="offline/online">
                </div>
                <div class="form-group mt-5">
                    <label for="">Number of Days</label>
                    <input name="day" type="text" required class="form-control" placeholder="2 days">
                </div>
                <div class="form-group mt-5">
                    <label for="">Time Start</label>
                    <input name="timestart" type="time" required class="form-control" placeholder="10:00:00">
                </div>
                <div class="form-group mt-5">
                    <label for="">Time End</label>
                    <input name="timeend" type="time" required class="form-control" placeholder="05:00:00">
                </div>
                <div class="form-group mt-5">
                    <label for="">Diploma Name</label>
                    <select required class="form-control" name="dipid">
                        <?php foreach($diploma as $state){?>
                            <option value="<?= $state['id']?>">
                                <?= $state['name']?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <button name="send" class = "btn btn-info mt-5"> Send Data </button>
            </form>
        </div>
    </div>
</div>

</main>


 
























<?php 
include "../shared/footer.php";
include "../shared/script.php";
?>

