<?php
require_once "core/init.php";

// Inisialisasi variabel $buku
$buku = null;

// Pencarian (search)
if (isset($_GET['searc'])) {
    $search = $_GET['searc'];
    $cari = "SELECT 
    kategori.kategori,
    penerbit.nama,
    buku.* FROM buku
    INNER JOIN kategori ON buku.kategori_id = kategori.id
    INNER JOIN penerbit ON buku.penerbit_id = penerbit.id 
    WHERE nama_buku LIKE '%$search%'";

    $buku = mysqli_query($connect, $cari);

    // Cek kalau data pencarian user tidak ditemukan
    if (mysqli_num_rows($buku) == 0) {
        $error = true;
    } else {
        // Check for database errors
        if (mysqli_error($connect)) {
            echo "Error: " . mysqli_error($connect);
        }
    }
} else {
    // Query untuk mengambil semua data buku
    $allBooksQuery = "SELECT 
    kategori.kategori,
    penerbit.nama,
    buku.* FROM buku
    INNER JOIN kategori ON buku.kategori_id = kategori.id
    INNER JOIN penerbit ON buku.penerbit_id = penerbit.id";

    $buku = mysqli_query($connect, $allBooksQuery);

    // Check for database errors
    if (mysqli_error($connect)) {
        echo "Error: " . mysqli_error($connect);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include("includes/head.php") ?>

<body class="inner_page tables_page">
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
                           <h2>Data</h2>
                        </div>
                     </div>
                  </div>
                  <!-- row -->
                  <div class="row">
                     <!-- table section -->
                     <div class="col-md-12">
                        <div class="white_shd full margin_bottom_30">
                           <div class="full graph_head">
                              <div class="heading1 margin_0">
                                 <h2>Data Buku</h2>
                                 </div>
                        <form class="row float-end row-cols-lg-auto g-2 align-items-center" method="GET">
                            <div class="col-6">
                                <div class="form-check">
                                    <input type="text" class="form-control" placeholder="Mau cari apa?" name="searc">
                                </div>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-success" name="cari">
                                    <i class="fa fa-search"></i> Cari</button>
                            </div>
                        </form>
                              </div>
                          
                           <div class="table_section padding_infor_info">
                              <div class="table-responsive-sm">
                                
                                 <table class="table">
                                    <thead>
                                       <tr>
                                          <th>#</th>
                                          <th>Kategori</th>
                                          <th>Nama Buku</th>
                                          <th>Harga</th>
                                          <th>Stok</th>
                                          <th>Penerbit</th>
                                          <th></th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <?php
                                      if (isset($buku) && (is_array($buku) || is_object($buku))) {
                                       foreach ($buku as $buk) {
                                           ?>
                                           <tr>
                                               <td><?= htmlspecialchars($buk['kode']) ?></td>
                                               <td><?= htmlspecialchars($buk['kategori']) ?></td>
                                               <td><?= htmlspecialchars($buk['nama_buku']) ?></td>
                                               <td><?= htmlspecialchars($buk['harga']) ?></td>
                                               <td><?= htmlspecialchars($buk['stok']) ?></td>
                                               <td><?= htmlspecialchars($buk['nama']) ?></td>
                                           </tr>
                                           <?php
                                       }
                                   } else {
                                       echo "Data buku tidak tersedia.";
                                   }
                                       ?>
                                    </tbody>
                                    <?php
                                if (isset($error)) {
                                    echo "<tr><td colspan='5' class='text-center text-muted'>pencarian tidak ditemukan</td></tr>";
                                }
                                ?>
                                 </table>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- footer -->
               <div class="container-fluid">
                  <div class="footer">
                     <p>Copyright © 2024 Pesantren PeTIK. All rights reserved.</p>
                  </div>
               </div>
            </div>
            <!-- end dashboard inner -->
         </div>
      </div>
      <!-- model popup -->
      <!-- The Modal -->
      <?php include("includes/modal.php") ?>
      <!-- end model popup -->
   </div>
   <!-- jQuery -->
   <script src="js/jquery.min.js"></script>
   <script src="js/popper.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <!-- wow animation -->
   <script src="js/animate.js"></script>
   <!-- select country -->
   <script src="js/bootstrap-select.js"></script>
   <!-- owl carousel -->
   <script src="js/owl.carousel.js"></script>
   <!-- chart js -->
   <script src="js/Chart.min.js"></script>
   <script src="js/Chart.bundle.min.js"></script>
   <script src="js/utils.js"></script>
   <script src="js/analyser.js"></script>
   <!-- nice scrollbar -->
   <script src="js/perfect-scrollbar.min.js"></script>
   <script>
      var ps = new PerfectScrollbar('#sidebar');
   </script>
   <!-- custom js -->
   <script src="js/custom.js"></script>
   <!-- calendar file css -->
   <script src="js/semantic.min.js"></script>
   <script></script>
</body>

</html>