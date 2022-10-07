<?php
include "../shared/head.php";
include "../shared/header.php";
include "../shared/aside.php";
include "../general/config.php";
include "../general/functions.php";
$message = "";

$ErrorsValidation= [];


if(isset($_GET['edit'])){
    $id= $_GET['edit'];
    $select = "SELECT * FROM `admin` where id = $id";
   $s= mysqli_query($conn , $select);
    $row= mysqli_fetch_assoc($s);

}

if(isset($_POST['send'])){
    $name = $_POST['name'];
    
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(trim($name)==""){
        $ErrorsValidation[]="please enter valid name";
        
            }
            if(trim($email)==""){
                $ErrorsValidation[]="please enter valid email";
                 
                    }
                    if(trim($password)==""){
                        $ErrorsValidation[]="please enter valid password";
                        
                            }
    
    go("/admin/list.php");
//     $image_name = time() . $_FILES['image']["name"];
//     $image_tmp = $_FILES['image']["tmp_name"];
// $location = "./upload/";
// move_uploaded_file( $image_tmp , $location . $image_name);
if(empty($ErrorsValidation)){

    $update = "UPDATE `admin` SET name = '$name'  , email='$email' , password='$password' where id=$id";
  $q =  mysqli_query($conn , $update);
  $message = testmessage($q, "update admin");

}
}

?>


<main id="main" class="main">
  <h1 class="display-4 text-center"> Edit admin </h1>
  <?php if(!empty($message)) : ?>
    <div class="alert alert-success">
        <?php echo $message ?>
    </div>
    <?php endif; ?>

    <?php if (!empty($ErrorsValidation)) : ?>
        <div class="alert alert-danger mx-auto w-50">
            <ul>
                <?php  foreach($ErrorsValidation as $error)  :   ?>
                <li>   <?=  $error   ?>        </li>
                <?php endforeach;  ?>
            </ul>
            </div>
            <?php endif; ?>


<div class="container p-5"> 
    <div class="card p-5">
        <div class="card-body ">
            <form action="" method="POST">
                <div class="form-group mt-5">
                    <label for="">admin Name</label>
                    <input name="name" required value= "<?= $row ['name'] ?>" type="text" class="form-control">
                </div>
                
                <div class="form-group mt-5">
                    <label for="">Email</label>
                    <input name="email" required value= "<?= $row ['email'] ?>" type="text" class="form-control">
                </div>
                <div class="form-group mt-5">
                    <label for="">Password</label>
                    <input name="password" required value= "<?= $row ['password'] ?>" type="text" class="form-control">
                </div>
               
                <button name="send" class = "btn btn-info mt-5"> Update </button>
            </form>
        </div>
    </div>
</div>

</main>


























<?php 
include "../shared/footer.php";
include "../shared/script.php";
?>

