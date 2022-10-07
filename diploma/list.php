<?php
include "../shared/head.php";
include "../shared/header.php";
include "../shared/aside.php";
include "../general/config.php";
include "../general/functions.php";

$select = "SELECT * FROM `diploma`";
$s = mysqli_query($conn, $select);

// delet




if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = "DELETE FROM `diploma` WHERE id= $id";
    mysqli_query($conn, $delete);
    go("/diploma/list.php");
}

?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1 class="display-4 text-center"> List Diploma </h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/testinstant/index.html">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">General</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Diploma Table</h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Duration</th>
                                    <th scope="col">Start</th>
                                    <th scope="col">price</th>
                                    <th scope="col" colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($s as $data) { ?>
                                    <tr>
                                        <td><?php echo $data['id'] ?> </td>
                                        <td><?php echo $data['name'] ?> </td>
                                        <td><?php echo $data['duration'] ?> &nbsp; </td>
                                        <td><?php echo $data['start'] ?> </td>
                                        <td><?php echo $data['price'] ?> &nbsp; Bound </td>
                                        <td><a href="/testinstant/diploma/list.php?delete=<?php echo $data['id'] ?>" class="btn btn-danger">delet</a href=""></td>
                                        <td><a href="/testinstant/diploma/update.php?edit=<?php echo $data['id'] ?>" class="btn btn-danger">update </a href=""></td>
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