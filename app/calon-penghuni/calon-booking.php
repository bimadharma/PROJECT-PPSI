<?php 

include '../../actions/koneksi.php';
ob_start();
session_start();
if(!isset($_SESSION['akun_id'])) header("location: ../../index.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Booking Kamar</title>

  <!-- Custom fonts for this template-->
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../../css/bootstrap.min.css">

  <!-- Custom styles for this template-->
  <link href="../../css/sb-admin-1.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="../../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon">
          <i class="fas fa-home"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Luqman</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="calon-dashboard.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Fitur
      </div>

      <!-- Nav Item - Charts -->
      <li class="nav-item active">
        <a class="nav-link" href="calon-booking.php">
          <i class="fas fa-fw fa-bed"></i>
          <span>Booking Kamar</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span
                  class="mr-2 d-none d-lg-inline text-gray-600 small"><?php print_r($_SESSION['akun_nama']);  ?></span>

                <!-- foto profil -->

                <?php 
                $id = $_SESSION['akun_id'];
                $query = "SELECT * FROM pengguna WHERE id_pengguna = $id";
                $result = mysqli_query($conn, $query);
        
                while ($data = mysqli_fetch_array($result)) {
                  if ($data['foto_pengguna'] == NULL){                  
                ?>

                <img class="img-profile rounded-circle" src="../../img/none.png">
                <?php } else { ?>

                <img class="img-profile rounded-circle" src="../../img/<?php print_r($data['foto_pengguna']);  ?>">

                <?php
                    } 
                  } 
                ?>

                <!-- foto profil -->


              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="calon-settings-profil.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="calon-settings-rubah-password.php">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->

          <div class="d-sm-flex align-items-center justify-content-between mb-3">
            <span class="h3 mb-0 text-gray-800">Booking Kamar</span>
          </div>

          <!-- untuk cek apakah sudah booking -->
          <?php 
              $idPengguna = $_SESSION['akun_id'];
              $query = "SELECT * FROM kamar, booking, pengguna WHERE booking.id_kamar = kamar.id_kamar AND booking.id_pengguna = pengguna.id_pengguna AND pengguna.id_pengguna = '$idPengguna'";

              $result = mysqli_query($conn, $query);              
              $row = mysqli_num_rows($result);

              if($row > 0) {
                
              
            ?>

          <div class="row mb-3">
            <div class="card col-12">
              <div class="card-body">
                <h4 class="card-title">Pembayaran Booking</h4>
                <p class="card-text">Detail data booking kamar anda</p>
                <?php 
                  include '../../actions/koneksi.php';

                  if(isset($_SESSION['akun_id'])){
                      $id_pengguna = $_SESSION['akun_id'];
                      $query = "SELECT *, (kamar.harga_bulanan + layanan.harga_bulanan) AS total_bayar FROM kamar, booking, pengguna, layanan WHERE booking.id_kamar = kamar.id_kamar AND booking.id_pengguna = pengguna.id_pengguna AND kamar.id_layanan = layanan.id_layanan AND pengguna.id_pengguna = '$id_pengguna'";
                      $result = mysqli_query($conn, $query);

                      while ($data = mysqli_fetch_array($result)) {
        
                ?>
                <div class="container-fluid pr-3">
                  <img src="../../img/<?php
                  if ($data['foto_kamar'] == NULL) {
                      echo 'none.png';
                  } else {
                      echo $data['foto_kamar']; 
                  }
                  ?>" alt="<?php echo $data['nomor_kamar']; ?>" class="img-thumbnail mx-auto d-block mb-3 rounded"
                    width="300px">
                  <div class="table-respomsive pr-3">
                    <table class="table">
                      <tbody>
                        <tr>
                          <td class="font-weight-bold" width="30%">Kamar Yang Dipesan</td>
                          <td><?php echo 'Kamar no. '.$data['nomor_kamar'];
                          ?>
                          </td>
                        </tr>
                        <tr>
                          <td class="font-weight-bold" width="30%">Pemesan</td>
                          <td><?php echo $data['nama_pengguna']; ?></td>
                        </tr>
                        <tr>
                          <td class="font-weight-bold" width="30%">Tanggal Booking</td>
                          <td><?php echo $data['tanggal_booking']; ?></td>
                        </tr>
                        <tr>
                          <td class="font-weight-bold" width="30%">Total Pembayaran</td>
                          <td><?php echo 'Rp. '.number_format($data['total_bayar']); ?></td>
                        </tr>
                        <?php if($data['status_booking'] == 'belum dikonfirmasi'){ ?>
                          <tr>
                            <td class="font-weight-bold" width="30%">Status Konfirmasi</td>
                            <td><?php echo strtoupper($data['status_booking']); ?></td>
                          </tr>
                          <tr>
                            <td class="font-weight-bold" width="30%">Informasi</td>
                            <td class="font-weight-bold text-success">Setelah Pembayaran dikonfirmasi, anda resmi
                              terdaftar sebagai penghuni. "Bukti Pembayaran" dan "Status Konfirmasi" akan dikirim
                              melalui e-mail anda (Pastikan email anda valid).</td>
                          </tr>
                        <?php } else {?>
                          <tr>
                            <td class="font-weight-bold" width="30%">Status Konfirmasi</td>
                            <td>SUDAH DIKONFIRMASI</td>
                          </tr>
                          <tr>
                            <td class="font-weight-bold" width="30%">Informasi</td>
                            <td class="font-weight-bold text-success">Pembayaran Telah Dikonfirmasi. Harap Logout dan Sign In kembali untuk melanjutkan. <br><br><button type="button" class="btn btn-primary btn-block" data-target="#logoutModal" data-toggle="modal">Log Out</button></td>                            
                          </tr>
                          
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <?php
                    }
                  }
                ?>
              </div>
            </div>
          </div>
          
              
            <?php } else {?>

              <div class="row">
            <!-- QUERY UNTUK MENAMPILKAN DATA KAMAR -->
            <?php 

            $query = "SELECT kamar.id_kamar, kamar.nomor_kamar, kamar.foto_kamar, tipe_kamar.nama_tipe, layanan.nama_layanan, layanan.harga_bulanan AS harga_layanan, kamar.harga_bulanan, (kamar.harga_bulanan + layanan.harga_bulanan) AS total_harga, kamar.deskripsi_kamar, kamar.kapasitas_kamar, kamar.luas_kamar, kamar.lantai_kamar FROM kamar
            LEFT JOIN menghuni ON menghuni.id_kamar = kamar.id_kamar
            LEFT JOIN booking ON kamar.id_kamar = booking.id_kamar
              INNER JOIN tipe_kamar ON kamar.id_tipe = tipe_kamar.id_tipe
              INNER JOIN layanan ON kamar.id_layanan = layanan.id_layanan

              WHERE menghuni.id_kamar IS NULL AND booking.id_kamar IS NULL
              ORDER BY kamar.nomor_kamar ASC";

            $result = mysqli_query($conn, $query);

            while ($data_kamar = mysqli_fetch_array($result)) {
              
          ?>
            <div class="col col-12 col-sm-6 col-lg-3 mb-4 d-flex align-items-stretch">
              <div class="card">

                <div class="no-kamar"><span class="font-weight-bold"><?php echo $data_kamar['nomor_kamar']; ?></span>
                </div>

                <?php if($data_kamar['foto_kamar'] == NULL){ ?>

                <img src="../../img/profile-img-none.png" height="200px" class="card-img-top" alt="...">

                <?php } else { ?>
                <img src="../../img/<?php echo $data_kamar['foto_kamar']; ?>" height="200px" class="card-img-top"
                  alt="...">
                <?php } ?>

                <div class="d-flex flex-column card-body">
                  <h6 class="card-title small"><span class="font-weight-bold">Tipe:</span>
                    <?php echo strtoupper($data_kamar['nama_tipe']); ?></h6>

                  <p class="card-text"><span class="font-weight-bold small">Luas:</span>
                    <?php echo $data_kamar['luas_kamar'];  ?></p>

                  <p class="card-text"><span class="font-weight-bold small">Lantai:</span>
                    <?php echo $data_kamar['lantai_kamar'];  ?></p>

                  <p class="card-text"><span class="font-weight-bold small">Deskripsi:</span>
                    <?php                     
                    if(strlen($data_kamar['deskripsi_kamar']) > 50){
                      $data_kamar['deskripsi_kamar'] = substr($data_kamar['deskripsi_kamar'], 0, 47).' ...';
                    }
                      
                    echo $data_kamar['deskripsi_kamar'];  
                    ?></p>

                  <p class="card-text"><span class="font-weight-bold small">Harga Bulanan:</span>
                    <?php echo 'Rp. '.number_format($data_kamar['total_harga']);  ?></p>

                  <div class="btn-group mt-auto" role="group" aria-label="Basic example">
                    <button name="view" value="view" id="<?php echo $data_kamar['id_kamar']; ?>"
                      class="btn btn-outline-primary view_data">Lihat Detail</button>
                    <button name="view" value="view" id="<?php echo $data_kamar['id_kamar']; ?>"
                      class="btn btn-outline-success booking_kamar">Booking</button>
                  </div>
                </div>
              </div>
            </div>            
            <?php } ?>
          </div>
          
         <?php } ?>          


          <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright &copy; Luqman 2024</span>
            </div>
          </div>
        </footer>
        <!-- End of Footer -->

      </div>
      <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ingin Keluar Aplikasi?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Pilih "Logout" dibawah jika anda ingin mengakhiri sesi.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="../../actions/process-logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- view modal -->
    <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
      aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-primary font-weight-bold" id="exampleModalCenterTitle">Rincian Data Kamar
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" id="detail_kamar">

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Booking modal -->
    <div class="modal fade" id="bookingKamar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
      aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-primary font-weight-bold" id="exampleModalCenterTitle">Booking Kamar
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" id="booking_data">

          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>



    <!-- Custom scripts for all pages-->
    <script src="../../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level plugins -->
    <script src="../../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../../js/demo/datatables-demo.js"></script>

    <script>
        $(document).ready(function () {

          // untuk view data
          $('.view_data').on('click', function () {
            var id_kamar = $(this).attr('id');
            console.log(id_kamar);

            $.ajax({
              url: "ajax/select_data_kamar.php",
              method: "post",
              data: {
                id_kamar: id_kamar
              },
              success: function (data) {
                $('#detail_kamar').html(data);
                $('#viewModal').modal();
              }
            });
          });

          // edit data
          $('.booking_kamar').on('click', function () {
            var id_kamar = $(this).attr('id');
            console.log(id_kamar);

            $.ajax({
              url: "ajax/booking_kamar.php",
              method: "post",
              data: {
                id_kamar: id_kamar
              },
              success: function (data) {
                $('#booking_data').html(data);
                $('#bookingKamar').modal();
              }
            });
          });
        });
      </script>
</body>

</html>