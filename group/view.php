<?php
include "../shared/head.php";
include "../shared/header.php";
include "../shared/aside.php";
include "../general/config.php";
include "../general/functions.php";



if (isset($_GET['view'])) {
    $id = $_GET['view'];
    $select = "SELECT * FROM `groups` where id = $id";
    $s = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($s);
}

$select = "SELECT COUNT(id) FROM `student`";
$z = mysqli_query($conn, $select);


?>



<main id="main" class="main">

    <h1>Show groups</h1>

    <div class="container p-5">
        <div class="card p-5">
            <div class="card-body">
                <h5> name :<?= $row['name'] ?></h5>
                <h5> state :<?= $row['state'] ?></h5>
                <h5> Deploma Name :<?= $row['dip_id'] ?></h5>



            </div>
            <div class="col-lg-8 justify-content-center">
                <div class="row">

                    <!-- Sales Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">


                            <div class="card-body">
                                <h5 class="card-title">Students Number</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-person-check-fill"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h5>Counter : <?= $row['id']  ?> </h5>
                                        <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Sales Card -->
                </div>
            </div><!-- End Left side columns -->

        </div>

    </div>



</main>








<?php
include "../shared/footer.php";
include "../shared/script.php";
?>