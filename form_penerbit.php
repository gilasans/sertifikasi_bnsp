<?php
require_once "core/init.php";

if (isset($_POST['simpan'])) {
    $nama = htmlspecialchars($_POST['nama']);
    $kode = htmlspecialchars($_POST['kode']);
    $kota = htmlspecialchars($_POST['kota']);
    $telpon = $_POST['telpon'];
    $alamat = htmlspecialchars($_POST['alamat']);

    $sql = "INSERT INTO penerbit (kode,nama,kota,alamat,telpon) VALUES ('$kode','$nama','$kota','$alamat','$telpon')";
    $result = mysqli_query($connect, $sql);
    if ($result) {
        header("location:dt_penerbit.php");
    } else {
        die(mysqli_error($connect));
    }
}



?>
<!DOCTYPE html>
<html lang="en">
<?php include("includes/head.php") ?>

<body class="dashboard dashboard_1">
    <div class="full_container">
        <div class="inner_container">
            <!-- Sidebar  -->
            <?php include("includes/sidebar.php") ?>
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
                <!-- topbar -->
                <?php include("includes/topbar.php") ?>
                <!-- end topbar -->
                <!-- dashboard inner -->
                <div class="midde_cont">
                    <div class="container-fluid">
                        <div class="row column_title">
                            <div class="col-md-12">
                                <div class="page_title">
                                    <h2>Input Data Buku Baru</h2>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid card px-4 py-4">
                            <form action="" class="row g-3" method="POST" enctype="multipart/form-data">
                                <div class="col-md-6">
                                    <label for="inputCity" class="form-label"><b>Nama Penerbit</b></label>
                                    <input type="text" name="nama" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputCity" class="form-label"><b>Kode Penerbit</b></label>
                                    <input type="text" name="kode" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputPassword4" class="form-label"><b>Kota</b></label>
                                    <input name="kota" type="text" class="form-control" id="inputPassword4">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputPassword4" class="form-label"><b>Telpon</b></label>
                                    <input name="telpon" type="number" class="form-control" id="inputPassword4">
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="form-label">Alamat</label>
                                    <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                                <div class="col-md-6">
                                    <button name="simpan" type="submit" class="btn btn-dark mt-4">Submit</button>
                                    <button type="submit" class="btn btn-outline-dark mt-4">Batal</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- footer -->
                <div class="container-fluid">
                    <div class="footer">
                        <p>All rights reserved | © App Inventaris PeTIK - 2023
                        </p>
                    </div>
                </div>
            </div>
            <!-- end dashboard inner -->
        </div>
    </div>
    </div>
    <!-- jQuery -->
    <?php include("includes/footer.php") ?>
</body>

</html>