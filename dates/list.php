<?php
include "../shared/head.php";
include "../shared/header.php";
include "../shared/aside.php";
include "../general/config.php";
include "../general/functions.php";

$select ="SELECT * FROM `allstatejoindiploma`" ;
$select_state = mysqli_query($conn ,$select) ;

if(isset($_GET['delete'])){
    $id=$_GET['delete'];
    $delete="DELETE FROM `statediploma` where id =$id";
    $delete_state = mysqli_query($conn ,$delete) ;
    go('/dates/list.php');

}

?>




<main id="main" class="main">

    <div class="pagetitle">
        <h1 class="display-4 text-center"> List Dates groups </h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/testinstant/index.html">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">General</li>
            </ol>
        </nav>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Dates Table</h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">State</th>
                                    <th scope="col">Days</th>
                                    <th scope="col">Time Start</th>
                                    <th scope="col">Time End</th>
                                    <th scope="col">Diploma Name</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($select_state as $data) {
                                ?>
                                    <tr>
                                        <td scope="row"><?= $data['id'] ?> </td>
                                        <td><?= $data['state'] ?> </td>
                                        <td><?= $data['num_days'] ?> </td>
                                        <td><?= $data['time start'] ?> </td>
                                        <td><?= $data['time end'] ?> </td>
                                        <td><?= $data['diploma_name'] ?> </td>
                                        <td> <a href="/testinstant/dates/list.php?delete=<?= $data['id'] ?>" class="btn btn-danger"> Delete </a></td>
                                        <td> <a href="/testinstant/dates/update.php?edit=<?= $data['id'] ?>" class="btn btn-primary"> Update </a></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <!-- End Default Table Example -->
                    </div>
                </div>


            </div>
        </div>
    </section>
</main>


<?php
include "../shared/footer.php";
include "../shared/script.php";
?>