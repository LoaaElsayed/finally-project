<?php
include "../shared/head.php";
include "../shared/header.php";
include "../shared/aside.php";
include "../general/config.php";
include "../general/functions.php";


if(isset($_GET['edit'])){
    $id= $_GET['edit'];
    $select = "SELECT * FROM `groups` where id = $id";
   $s= mysqli_query($conn , $select);
    $row= mysqli_fetch_assoc($s);

}

if(isset($_POST['Submit'])) {
    $name = $_POST['name'];
    $state = $_POST['state'];
    $Dname = $_POST['dip_id'];
    go("/group/list.php");
    $update= "UPDATE `groups` SET name = '$name'  , state='$state' , dip_id='$Dname' where id=$id";
    $q= mysqli_query($conn,$update);
    
    }
    

    


?>



<main id="main" class="main">
  <h1> Edit groups </h1>

<div class="container p-5"> 
    <div class="card p-5">
        <div class="card-body ">
            <form action="" method="POST">
                <div class="form-group mt-5">
                    <label for="">Groups Name</label>
                    <input name="name" value= "<?= $row ['name'] ?>" type="text" class="form-control">
                </div>
                
                <div class="form-group mt-5">
                    <label for="">Group State</label>
                    <input name="state" value= "<?= $row ['state'] ?>" type="text" class="form-control">
                </div>
                <div class="form-group mt-5">
                    <label for="">Dipartment ID</label>
                    <input name="dip_id" value= "<?= $row ['dip_id'] ?>" type="text" class="form-control">
                </div>
               
                <button name="Submit" class = "btn btn-info mt-5"> Update </button>
            </form>
        </div>
    </div>
</div>

























<?php 
include "../shared/footer.php";
include "../shared/script.php";
?>

