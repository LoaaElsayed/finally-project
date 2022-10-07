<?php
include "../shared/head.php";
include "../shared/header.php";
include "../shared/aside.php";
include "../general/config.php";
include "../general/functions.php";
$message = "";

$ErrorsValidation= [];


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
                 
//     $image_name = time() . $_FILES['image']["name"];
//     $image_tmp = $_FILES['image']["tmp_name"];
// $location = "./upload/";
// move_uploaded_file( $image_tmp , $location . $image_name);
if(empty($ErrorsValidation)){
    $insert = "INSERT INTO `admin` VALUES (NULL , '$name' , '$email' , '$password' )";
  $q =  mysqli_query($conn , $insert);
  go("/admin/list.php"); 
  $message = testmessage($q, "insert admin");
}
if(strip_tags($name)){
    $ErrorsValidation[]= "cant send name have (<,>,/)";
}
if(strip_tags($email)){
    $ErrorsValidation[]= "cant send email have (<,>,/)";
}
if(strip_tags($password)){
    $ErrorsValidation[]= "cant send password have (<,>,/)";
}
    
}




?>





<main id="main" class="main">
  <h1 class="display-4 text-center"> Add new admin </h1>
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
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group mt-5">
                    <label for="">admin Name</label>
                    <input name="name" type="text" required class="form-control">
                </div>
                <div class="form-group mt-5">
                    <label for="">Password</label>
                    <input name="password" type="text" required class="form-control">
                </div>
                <div class="form-group mt-5">
                    <label for="">Email</label>
                    <input name="email" type="text" required class="form-control">
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

