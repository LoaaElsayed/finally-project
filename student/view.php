<?php
include "../shared/head.php";
include "../shared/header.php";
include "../shared/aside.php";
include "../general/config.php";
include "../general/functions.php";


if(isset($_GET['view'])){
    $id = $_GET['view'];
    $select="SELECT * FROM `detailsstudent` WHERE student_id=$id";
    $se = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($se) ;
}
?>


<main id="main" class="main">
    <div class="pagetitle">
        <h1 class="display-4 text-center"> List Student </h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/testinstant/index.html">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">General</li>
            </ol>
        </nav>
    </div>
    <section>
        <h5 class="card-title text-center">View profile student : <?=$row['student_name']?></h5>
        <div class="card col-lg-6">
            <img class="card-img-top" src="/testinstant/websiteuse/<?= $row['image']?>">
            <div class="card-body">
                <h3 class="vi mt-4">Email:<span class="span1"><?= $row['student_email'] ?></span></h3>
                <h3 class="vi mt-4">Phone:<span><?= $row['student_phone'] ?></span></h3>
                <h3 class="vi mt-4">Diploma_name:<span><?= $row['diploma_name'] ?></span></h3>
                <h3 class="vi mt-4">Diploma_time:<span><?= $row['diplo_state'] ?></span></h3>
            </div>
        </div>
    </section>
</main>

























<?php
include "../shared/footer.php";
include "../shared/script.php";
?>