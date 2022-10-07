<?php
include "../shared/head.php";
include "../shared/header.php";
include "../shared/aside.php";
include "../general/config.php";
include "../general/functions.php";

if(isset($_GET['view'])) {
    $id = $_GET['view'];
    $select = "SELECT * FROM `instructor` WHERE Id = $id" ;
    $s = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($s);
}
?>


<main id="main" class="main">


<h1 class="text-center display-4 mt-2">show page </h1>
<div class="container col-4 mt-3">
    <div class="card p-5">
        <img src="./upload/<?= $row['image'] ?>" class="img-top mb-5" alt="">
        <div class="card-body">
            <h5>Name :<?= $row['name'] ?></h5>
            <h5> Email :<?= $row['email'] ?></h5>
        </div>

    </div>

</div>


</main>




<?php 
include "../shared/footer.php";
include "../shared/script.php";
?>

