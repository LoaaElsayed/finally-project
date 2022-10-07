<?php
include "../shared/head.php";
include "../shared/header.php";
include "../shared/aside.php";
include "../general/config.php";
include "../general/functions.php";

$select = "SELECT * FROM `instructor`";
$s = mysqli_query($conn, $select);



if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = "DELETE FROM `instructor` WHERE id = $id";
    mysqli_query($conn, $delete);
    go('instructor/list.php');
}

?>






<main id="main" class="main">

    <div class="pagetitle">
        <h1 class="display-4 mt-5 text-center"> List instructor </h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/testinstant/index.html">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">General</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-8">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Default Table</h5>

                        <!-- Default Table -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($s as $data) {
                                ?>
                                    <tr>
                                        <th scope="row"><?= $data['id'] ?> </th>
                                        <td> <?= $data['name'] ?></td>
                                        <td> <?= $data['email'] ?></td>
                                        <td> <a href="/testinstant/instructor/view.php?view=<?= $data['id'] ?>" class="btn btn-primary"> View </a></td>
                                        <td> <a href="/testinstant/instructor/list.php?delete=<?= $data['id']?>" type="button" class="btn btn-danger">delete</a></td>
                                        <td><a href="/testinstant/instructor/update.php?edit=<?= $data['id']?>" type="button" class="btn btn-success">update</a><td>
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