<?php
include "../shared/head.php";
include "../shared/header.php";
include "../shared/aside.php";
include "../general/config.php";
include "../general/functions.php";


$quarySelect = "SELECT * FROM `student`";
$run_select = mysqli_query($conn, $quarySelect);


if (isset($_GET['delete'])) {
    $id=$_GET['delete'];
    $selectelement= "SELECT * from `student` where id=$id";
    $selele=mysqli_query($conn, $selectelement);
    $rowele=mysqli_fetch_assoc($selele);
    $imge = $rowele['image'];
    unlink("../websiteuse/$imge");
    $quarydelete="DELETE FROM `student` WHERE id=$id";
    $d=mysqli_query($conn,$quarydelete);
    go('student/list.php');
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
    <section class="section">
        <div class="row">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Stydent Table</h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col" colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($run_select as $project) { ?><tr>
                                        <td><?= $project['id'] ?></td>
                                        <td><?= $project['name'] ?></td>
                                        <td><?= $project['email'] ?></td>
                                        <td><?= $project['phone'] ?></td>
                                        <td><a href="list.php?delete=<?=$project['id']?>" class="btn btn-danger">Delete</a></td>
                                        <td><a href="view.php?view=<?= $project['id'] ?>" class="btn btn-success">View</a></td>  
                                        
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
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