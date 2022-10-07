<?php
include "../shared/head.php";
include "../shared/header.php";
include "../shared/aside.php";
include "../general/config.php";
include "../general/functions.php";

if(isset($_GET['edit'])){
    $id=$_GET['edit'];
    $select ="SELECT * FROM `statediploma` where id =$id"  ;
    $select_state = mysqli_query($conn ,$select) ;   
    $row_state = mysqli_fetch_assoc($select_state ) ;
}
if(isset($_POST['update'])){
    $state=$_POST['state'];
    $day=$_POST['day'];
    $time_s=$_POST['timestart'];
    $time_e=$_POST['timeend'];
    $dip_id =$_POST['dipid'];
    $update_stat ="UPDATE `statediploma` SET `state`='$state',`num_days`='$day',`time start`='$time_s',`time end`='$time_e' ,`dip_id`= $dip_id";
    mysqli_query($conn , $update_stat);
}

$select_dip = "SELECT * FROM `diploma`";
$diploma=mysqli_query($conn , $select_dip);
?>

<main id="main" class="main">
    <h3 class="display-4 text-center"> update new Date for Group </h3>
<div class="container p-5"> 
    <div class="card p-5">
        <div class="card-body ">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group mt-5">
                    <label for="">Date state</label>
                    <input name="state" value="<?= $row_state['state']?>" type="text" required class="form-control" placeholder="offline/online">
                </div>
                <div class="form-group mt-5">
                    <label for="">Number of Days</label>
                    <input name="day" value="<?= $row_state['num_days']?>" type="text" required class="form-control" placeholder="2 days">
                </div>
                <div class="form-group mt-5">
                    <label for="">Time Start</label>
                    <input name="timestart" value="<?= $row_state['time start']?>" type="time" required class="form-control" placeholder="10:00:00">
                </div>
                <div class="form-group mt-5">
                    <label for="">Time End</label>
                    <input name="timeend" value="<?= $row_state['time end']?>" type="time" required class="form-control" placeholder="05:00:00">
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
                <button name="update" class = "btn btn-info mt-5"> UPdate Data </button>
            </form>
        </div>
    </div>
</div>

</main>




<?php 
include "../shared/footer.php";
include "../shared/script.php";
?>

