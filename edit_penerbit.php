<?php
require_once "core/init.php";
$id = $_GET["id"];

$query = "SELECT * FROM penerbit WHERE id=$id ";
$edit = mysqli_query($connect, $query);

if (isset($_POST['ubah'])) {
    $nama = htmlspecialchars($_POST['nama']);
    $kode = htmlspecialchars($_POST['kode']);
    $kota = htmlspecialchars($_POST['kota']);
    $telpon = $_POST['telpon'];
    $alamat = htmlspecialchars($_POST['alamat']);

    $query = "UPDATE penerbit set nama='$nama', kode='$kode', kota='$kota', telpon='$telpon', alamat='$alamat' WHERE id=$id";
    mysqli_query($connect, $query);
    header("location:dt_penerbit.php");
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
                            <?php
                            foreach ($edit as $pen) {
                            ?>
                            <form action="" class="row g-3" method="POST" >
                                <div class="col-md-6">
                                    <label for="inputCity" class="form-label"><b>Nama Penerbit</b></label>
                                    <input type="text" name="nama" class="form-control" value="<?=$pen['nama']?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputCity" class="form-label"><b>Kode Penerbit</b></label>
                                    <input type="text" name="kode" class="form-control" value="<?=$pen['kode']?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputPassword4" class="form-label"><b>Kota</b></label>
                                    <input name="kota" type="text" class="form-control" id="inputPassword4" value="<?=$pen['kota']?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputPassword4" class="form-label"><b>Telpon</b></label>
                                    <input name="telpon" type="number" class="form-control" id="inputPassword4" value="<?=$pen['telpon']?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="form-label">Alamat</label>
                                    <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control"><?=$pen['alamat']?></textarea>
                                </div>
                                <div class="col-md-6">
                                    <button name="ubah" type="submit" class="btn btn-dark mt-4">update</button>
                                    <a href="dt_penerbit.php" type="submit" class="btn btn-outline-dark mt-4">Batal</a>
                                </div>
                            </form>
                                <?php
                            }
                                ?>
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