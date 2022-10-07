<?php
include "../shared/head.php";
include "../shared/header.php";
include "../shared/aside.php";
include "../general/config.php";
include "../general/functions.php";



if(isset($_POST['Submit'])) {
    $name = $_POST['name'];
    $Dname = $_POST['dip_id'];
    $state = $_POST['state'];
    $insert= "INSERT INTO `groups` VALUES (NULL ,'$name','$state','$Dname') ";
    $q= mysqli_query($conn,$insert);
    
    }
    
    $select = "SELECT * FROM `diploma`";
    $deploma = mysqli_query($conn, $select);
    
    
    ?>
    


    <main id="main" class="main">
        <h1> Add new admin </h1>
    
    <div class="container p-5"> 
        <div class="card p-5">
            <div class="card-body ">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group mt-5">
                        <label for=""> Group Name</label>
                        <input name="name" type="text" class="form-control">
                    </div>  
                    <div class="form-group mt-5">
                        <label for="">State</label>
                        <input type="text" class="form-control" name="state">
                    </div>
                    <div class="form-group mt-5">
                        <label for="">Debloma Name</label>
                        <select class="form-control" name="dip_id" >
                            <?php foreach ($deploma as $date) { ?>
                            <option value="<?php echo $date['id'] ?>"> 
                                <?php echo $date['name'] ?>
                            </option>
                            <?php } ?>
                        </select>
                    </div> 
                    <button name="Submit" class = "btn btn-info mt-5"> Submit </button>
                </form>
            </div>
        </div>
    </div>
    
    </main>

<?php 
include "../shared/footer.php";
include "../shared/script.php";
?>

