<?php
include 'actions/koneksi.php';
?>

<!doctype html>
<html lang="en">

<head>


  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- leaflet css -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
    integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
    crossorigin="" />

  <!-- leaflet js -->
  <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
    integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
    crossorigin=""></script>

  <!-- custom css -->
  <link rel="stylesheet" href="css/stylee.css">

  <!-- font -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans|Raleway&display=swap" rel="stylesheet">

  <!-- fontawesome icon -->
  <script src="https://kit.fontawesome.com/9afba118d6.js" crossorigin="anonymous"></script>

  <title>Luqman | Landing Page</title>
</head>

<body>
  <!-- navbar -->
  <header id="header">
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container">
        <a class="navbar-brand" href="#">Luqman kost</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
          aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ml-auto">
            <a class="nav-item nav-link item-scroll" id="btn-tentang" href="#tentang">Tentang</a>
            <a class="nav-item nav-link item-scroll" id="btn-keunggulan" href="#keunggulan">Keunggulan</a>
            <a class="nav-item nav-link item-scroll" id="btn-testimoni" href="#testimoni">Testimoni</a>
            <a class="nav-item btn btn-light tombol tombol-nav" href="pages/sign-up.php" tabindex="-1"
              aria-disabled="true">Daftar</a>
            <a class="nav-item btn btn-light tombol tombol-nav" href="pages/sign-in.php" tabindex="-1"
              aria-disabled="true">Masuk</a>
          </div>
        </div>
      </div>
    </nav>
  </header>
  <!-- navbar end -->

  <main>

    <?php

    $query = "SELECT * FROM info_kost";
    $result = mysqli_query($conn, $query);

    while ($data = mysqli_fetch_array($result)) {

    ?>

      <!-- jumbotron -->
      <div class="jumbotron jumbotron-atas jumbotron-fluid" id="jumbotron">
        <div class="container banner-tittle">
          <h3>WELCOME</h3>
          <h1 class="display-4 text-uppercase">RUMAH <?php echo $data['nama_kost']; ?></h1>
          <p class="lead"><?php echo $data['deskripsi_kost']; ?></p>
          <a href="pages/kamar-tersedia.php" class="btn up-1 btn-gradient">Cek Ketersediaan Kamar</a>
        </div>
      </div>
      <!-- jumbotron -->

    <?php } ?>

    <section id="tentang">
      <!-- tentang -->
      <div class="container-fluid">
        <div class="row">
          <div class="col">
            <h2 class="tentang pt-5 pb-5">Fasilitas website kostan</h2>
          </div>
        </div>
        <div class="row">
          <div class="col col-12 col-md-6 pb-3">
            <!-- img preview1 -->
            <img src="img/preview1.jpg" class="img-fluid mt-n3" alt="Mockup">
          </div>
          <div class="col col-12 col-md-6 pt-md-3 mt-md-5 pr-5">
            <!-- deskripsi -->
            <h4 class="font-weight-bold">Dapat Mengelola Rumah Kos Secara Mandiri</h4>
            <p class="text-muted">Integrasi semua operasi penting dalam satu platform</p>
            <p class="font-weight-bold text-break">
              <i class="fas fa-check-circle text-success"></i> Pengelolaan Kamar dan Penghuni/Penyewa <br>
              <i class="fas fa-check-circle text-success"></i> Booking <br>
              <i class="fas fa-check-circle text-success"></i> Laporan keuangan & Laba-rugi <br>
              <i class="fas fa-check-circle text-success"></i> Inventarisasi

            </p>
            <p class="text-muted">Anda bisa mendapatkan informasi terkini secara <span
                class="font-weight-bold font-italic text-muted text-break">real time</span>, kapan saja, dimana saja</p>
          </div>
        </div>
      </div>
    </section>
    <!-- tentang -->

    <!-- keunggulan atas-->
    <div class="container-fluid bg-light pt-5 pb-4">
      <div class="container">
        <div class="row">
          <!-- kiri -->
          <div class="col col-12 col-md-6">
            <!-- kiri atas -->
            <div class="row">
              <div class="col col-2">
                <i class="fas fa-shield-alt ikon-besar"></i>
              </div>
              <div class="col col-10">
                <h6 class="font-weight-bold">Mencegah Kecurangan Biaya & Pendapatan</h6>
                <p class="text-muted">
                  Catatan booking, pemasukan, dan pengeluaran tercatat rapi sehingga akan meminimalisir
                  kecurangan
                </p>
              </div>
            </div>

            <!-- kiri bawah -->
            <div class="row mt-md-4">
              <div class="col col-2">
                <i class="fas fa-clock ikon-besar"></i>
              </div>
              <div class="col col-10">
                <h6 class="font-weight-bold">Full Online 24-Jam</h6>
                <p class="text-muted">
                  Dimana pun lokasi kost Anda, manajemen dan perkembangan bisnis bisa diakses secara realtime
                </p>
              </div>
            </div>
          </div>

          <!-- kanan -->
          <div class="col col-12 col-md-6">
            <!-- kanan atas -->
            <div class="row">
              <div class="col col-2">
                <i class="fas fa-chart-line ikon-besar"></i>
              </div>
              <div class="col col-10">
                <h6 class="font-weight-bold">Meningkatkan Hunian Kost</h6>
                <p class="text-muted">
                  Luqman kost membantu meningkatkan hunian kost. Kami juga memampangkan informasi tentang rumah kost Anda
                  di halaman Homepage, sebagai bussiness profile dari rumah kost Anda
                </p>
              </div>
            </div>

            <!-- kanan bawah -->
            <div class="row">
              <div class="col col-2">
                <i class="fas fa-shopping-cart ikon-besar"></i>
              </div>
              <div class="col col-10">
                <h6 class="font-weight-bold">Reservasi Online</h6>
                <p class="text-muted">
                  Reservasi bisa dilakukan secara Online, kapan saja dan dimana saja
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- keunggulan atas-->

    <div class="container bg-keunggulan" id="keunggulan">
      <!-- keuunggulan deskripsi -->
      <div class="row mt-5">
        <div class="container">
          <h5 class="font-weight-bold text-center">Keunggulan luqman Kost</h5>
          <p class="text-muted text-center">Luqman merupakan aplikasi pengelola rumah kos berbasis online (WEB) yang
            akan membantu meningkatkan produktivitas usaha. Satu aplikasi, banyak solusi. <span
              class="text-ungu font-weight-bold">Didesain untuk orang awam IT</span></p>
        </div>
      </div>

      <!-- keunggulan dengan gambar -->
      <div class="row mt-3 pb-5">
        <!-- kiri -->
        <div class="col col-12 col-md-6">

          <div class="row">
            <div class="col col-2">
              <div class="lingkar">1</div>
            </div>
            <div class="col col-10">
              <h6 class="font-weight-bold ml-2">Sistem yang handal dan lengkap</h6>
              <p class="text-muted ml-2">Tersedia semua hal yang Anda butuhkan untuk mengelola rumah kos Anda</p>
            </div>
          </div>

          <div class="row">
            <div class="col col-2">
              <div class="lingkar mt-2">2</div>
            </div>
            <div class="col col-10">
              <h6 class="font-weight-bold ml-2">Multi device, multi platform</h6>
              <p class="text-muted ml-2">Yang Anda butuhkan hanyalah koneksi internet dan web browser. Aplikasi dapat
                diakses dari mana saja dan kapan saja</p>
            </div>
          </div>

          <div class="row">
            <div class="col col-2">
              <div class="lingkar mt-2">3</div>
            </div>
            <div class="col col-10">
              <h6 class="font-weight-bold ml-2">Mudah digunakan</h6>
              <p class="text-muted ml-2">Tampilan tatap muka didesain sedemikian rupa sehingga mudah digunakan oleh
                pengguna. Dan memenuhi standar UI/UX yang ada</p>
            </div>
          </div>
        </div>

        <!-- kanan -->
        <div class="col col-12 col-md-6">
          <img src="img/preview2.png" class="img-fluid mt-n3 scale" alt=" Mockup">
        </div>
      </div>
    </div>


    <!-- testimoni -->
    <!-- jumbotron -->
    <div class="jumbotron testimoni jumbotron-fluid" id="testimoni">
      <div class="container item">
        <div class="row">
          <div class="col-12">
            <h2 class="text-light text-center font-weight-bold">Testimoni</h2>
            <p class="text-center text-light">Apa kata mereka yang telah menggunakan Luqman Kost</p>
          </div>
        </div>
        <div class="row">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="testmonial_slider_area text-center owl-carousel">
                  <div class="row">
                    <div class="col col-12 col-md-6">
                      <div class="single_testimonial">
                        <h5 class="testimonial-title">Luqman</h5>
                        <span class="test_designation">Pemilik Kost Putra</span>
                        <p class="text-muted">
                          Saya tertarik untuk menggunakan, karena saya memiliki banyak kost saya fikir akan sangat terbantu untuk merekap pengeluaran, pemasukan, serta melakukan tagihan kepada penghuni kost.
                        </p>
                      </div><!-- end Single Testimonials -->
                    </div>

                    <div class="col col-12 col-md-6">
                      <div class="single_testimonial">
                        <h5 class="testimonial-title">Ibu kost</h5>
                        <span class="test_designation">Pemilik Kost putra</span>
                        <p class="text-muted">
                          Saya mencoba dan saya merasa sangat dibantu untuk Manajemen Keuangan. Meskipun perlu banyak penyempurnaan contohnya pada laporan, namun menurut saya jka sudah sempurna akan terasa manfaatnya.
                        </p>
                      </div><!-- end Single Testimonials -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- jumbotron -->
    <!-- testimoni -->

  </main>

  <!-- footer -->
  <footer>
    <!-- footer atas -->
    <div class="container-fluid bg-dark text-light m-0 pt-4">
      <div class="row mx-auto">
        <?php
        $query = "SELECT * FROM info_kost";
        $result = mysqli_query($conn, $query);
        while ($data = mysqli_fetch_array($result)) {
        ?>
          <!-- Konten Info Kost -->
          <div class="col-12 col-md-8 d-flex flex-column justify-content-center align-items-start mx-auto">
            <h5 class="text-light font-weight-bold h6 mt-2">
              Rumah <?php echo $data['nama_kost']; ?>
            </h5>
            <p class="text-light smaller-text h6">
              <i class="fas fa-map mr-1"></i>
              <?php echo $data['alamat_kost']; ?>, <?php echo $data['kota_kost']; ?>, <?php echo $data['provinsi_kost']; ?>
            </p>
            <p class="text-light smaller-text h6">
              <i class="fas fa-phone-alt mr-1"></i>
              <?php echo $data['no_kost']; ?>
            </p>
            <p class="text-light smaller-text h6">
              <i class="fas fa-envelope mr-1"></i>
              <?php echo $data['email_kost']; ?>
            </p>
          </div>
        <?php } ?>

        <!-- Maps -->
        <div class="col col-12 col-md-4">
        <div class="mt-2"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.24883288805!2d106.83222708801854!3d-6.361832606541908!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ec3e1546de61%3A0x937d969e83fa3b9e!2sOYO%20Life%202424%20Kost%20Luqman%202!5e0!3m2!1sen!2sid!4v1732513927520!5m2!1sen!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
      </div>
      </div>
      <!-- Footer Bawah -->
      <div class="row footer-bawah pt-3 mt-3">
        <div class="col-12">
          <p class="text-muted text-center">By kelompok 1 || 4KA03</p>
        </div>
      </div>
    </div>
</footer>


  <d iv class="button-up">
    <i class="fas fa-arrow-circle-up"></i>
    </div>

    <!--        Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <script>
      // Header scroll class
      $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
          $('#header').addClass('header-scrolled');
        } else {
          $('#header').removeClass('header-scrolled');
        }
      });

      if ($(window).scrollTop() > 100) {
        $('#header').addClass('header-scrolled');
      }

      <?php

      $query = "SELECT * FROM info_kost";
      $result = mysqli_query($conn, $query);

      while ($data = mysqli_fetch_array($result)) {

      ?>

        $(function() {
          $(".jumbotron-atas").css({
            "background-image": "url(img/<?php echo $data['foto_kost'] ?>)"
          })
        })

      <?php } ?>
    </script>
</body>

</html>