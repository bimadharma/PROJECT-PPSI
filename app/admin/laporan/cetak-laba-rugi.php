<?php 

include '../../../actions/koneksi.php';

ob_start();
session_start();

if (!isset($_SESSION['akun_id'])){
  header("location: ../../../landing-page.php");
} 
elseif (isset($_SESSION['akun_id'])){
  if($_SESSION['hak_akses'] == 2){
    header("location: ../../penghuni/penghuni-dashboard.php");
  }
  elseif($_SESSION['hak_akses'] == 3){
    header("location: ../../calon-penghuni/calon-dashboard.php");
  } 
}
?>

<?php
    if (isset($_POST['cetakBulan'])) {
    $tahun  = $_POST['tahun'];
    $bulan  = $_POST['bulan'];
    $namaBulan = $bulan;
    $namaBulan = date('F', mktime(0, 0, 0, $namaBulan, 10));
    
    // select data pembayaran
    $query = "SELECT SUM(pembayaran.nilai_pembayaran) AS total_pembayaran, DATE_FORMAT(CURRENT_DATE(), '%d %M %Y') AS tanggal_cetak FROM pembayaran WHERE YEAR(pembayaran.tanggal_pembayaran) = '$tahun' AND MONTH(pembayaran.tanggal_pembayaran) = '$bulan'";

    $result = mysqli_query($conn, $query);
    $dataPembayaran = mysqli_fetch_array($result);

    // select data pengeluaran
    $query = "SELECT SUM(pengeluaran.nilai_pengeluaran) AS total_pengeluaran, DATE_FORMAT(CURRENT_DATE(), '%d %M %Y') AS tanggal_cetak FROM pengeluaran WHERE YEAR(pengeluaran.tanggal_pengeluaran) = '$tahun' AND MONTH(pengeluaran.tanggal_pengeluaran) = '$bulan'";

    $result = mysqli_query($conn, $query);
    $dataPengeluaran = mysqli_fetch_array($result);

    // select data kost
    $query = "SELECT * FROM info_kost WHERE id_kost = 1";

    $result = mysqli_query($conn, $query);
    $dataKost = mysqli_fetch_array($result);

    // select pemilik
    $query = "SELECT * FROM pengguna WHERE id_akses = 1";

    $result = mysqli_query($conn, $query);
    $dataPemilik = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title id="tittle">Laporan Laba Rugi <?php echo $namaBulan.' '.$tahun; ?></title>
  <style type="text/css">    
    .style1 {
      font-size: large
    }

    body{
      max-height: 500px;
    }
  </style>
</head>

<body>



<table width="910" border="0" align="center" cellpadding="0" cellspacing="0">    
    <tr height="20px"></tr>
    <tr>
      <td width="100%" colspan="4">
        <div align="center" class="style1"><strong><?php echo strtoupper($dataKost['nama_kost']); ?></strong><br>
          <?php echo $dataKost['alamat_kost']; ?>, Telp <?php echo $dataKost['no_kost']; ?> <?php echo $dataKost['kota_kost']; ?> <?php echo $dataKost['provinsi_kost']; ?><br>
          Website : kos.luqman-project.com E-Mail : <?php echo $dataKost['email_kost']; ?> </div>
      </td>    
    <tr>
      <td colspan="4"></td>
    </tr>
    <tr>
      <td colspan="4">
        <hr noshade>
      </td>
    </tr>
    <tr>
      <td colspan="4"  align="center">
        <strong class="style1">LAPORAN LABA RUGI</strong>
      </td>
    </tr>
    <tr>
      <td colspan="4"  align="center">
        <strong class="style1"><?php echo $namaBulan.' '.$tahun ?></strong>
      </td>
    </tr>
    <tr height="20px">      
      <td width="25%">
        
      </td>
      <td width="25%">        
      </td>      
      <td width="25%" colspan="2"></td>
    </tr>
    <tr>      
      <td width="25%">
        
      </td>
      <td width="25%">        
      </td>      
      <td width="25%" colspan="2"><strong>TANGGAL CETAK: <?php echo $dataPembayaran['tanggal_cetak']; ?></strong></td>
    </tr>
    <tr height="30px">      
      <td width="25%"></td>
      <td width="25%"></td>
      <td width="25%"></td>
      <td width="25%"></td>
    </tr>
    <tr height="30px">      
      <td width="25%"><strong>PERIODE</strong></td>
      <td width="25%">: <?php echo $namaBulan.' '.$tahun; ?></td>
      <td width="25%"></td>
      <td width="25%"></td>
    </tr>
    <tr height="30px">      
      <td width="25%"><strong>TOTAL PEMASUKAN</strong></td>
      <td width="25%">: <?php echo 'Rp. '.number_format($dataPembayaran['total_pembayaran']); ?></td>
      <td width="25%"></td>
      <td width="25%"></td>
    </tr>
    <tr height="30px">      
      <td width="25%"><strong>TOTAL PENGELUARAN</strong></td>
      <td width="25%">: <?php echo 'Rp. '.number_format($dataPengeluaran['total_pengeluaran']); ?></td>
      <td width="25%"></td>
      <td width="25%"></td>
    </tr>
    <?php $pemasukan = $dataPembayaran['total_pembayaran']; $pengeluaran = $dataPengeluaran['total_pengeluaran']; ?>
    <tr height="30px">      
      <td width="25%"><strong>LABA / RUGI</strong></td>
      <td width="25%">: <?php echo 'Rp. '.number_format($pemasukan - $pengeluaran); ?></td>
      <td width="25%"></td>
      <td width="25%"></td>
    </tr>
    <tr height="30px">      
      <td width="26%"></td>
      <td width="74%" colspan="3"></td>    
    </tr>    
    <tr height="30px">      
      <td align="center"><button name="cetak" type="button" id="cetak" value="Cetak" onClick="Cetakan()">Cetak</button></td>
      <td ></td>      
      <td colspan="2"></td>
    </tr>
  </table>
  
  

<script>
function Cetakan()
{ 
  var x = document.getElementsByName("cetak");
  for(i = 0; i < x.length ; i++)
  {
  		x[i].style.visibility = "hidden";
  }

  window.print();
  alert("Jangan di tekan tombol OK sebelum dokumen selesai tercetak!");
  for(i = 0; i < x.length ; i++)
  {
  		x[i].style.visibility = "visible";
  }
}
</script>

<?php } ?>




<!-- cetak tahun -->
<?php
    if (isset($_POST['cetakTahun'])) {
    $tahun  = $_POST['tahun'];    
    
    // select data pembayaran
    $query = "SELECT SUM(pembayaran.nilai_pembayaran) AS total_pembayaran, DATE_FORMAT(CURRENT_DATE(), '%d %M %Y') AS tanggal_cetak FROM pembayaran WHERE YEAR(pembayaran.tanggal_pembayaran) = '$tahun'";

    $result = mysqli_query($conn, $query);
    $dataPembayaran = mysqli_fetch_array($result);

    // select data pengeluaran
    $query = "SELECT SUM(pengeluaran.nilai_pengeluaran) AS total_pengeluaran, DATE_FORMAT(CURRENT_DATE(), '%d %M %Y') AS tanggal_cetak FROM pengeluaran WHERE YEAR(pengeluaran.tanggal_pengeluaran) = '$tahun'";

    $result = mysqli_query($conn, $query);
    $dataPengeluaran = mysqli_fetch_array($result);

    // select data kost
    $query = "SELECT * FROM info_kost WHERE id_kost = 1";

    $result = mysqli_query($conn, $query);
    $dataKost = mysqli_fetch_array($result);

    // select pemilik
    $query = "SELECT * FROM pengguna WHERE id_akses = 1";

    $result = mysqli_query($conn, $query);
    $dataPemilik = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title id="tittle">Laporan Laba Rugi <?php echo $tahun; ?></title>
  <style type="text/css">    
    .style1 {
      font-size: large
    }

    body{
      max-height: 500px;
    }
  </style>
</head>

<body>



<table width="910" border="0" align="center" cellpadding="0" cellspacing="0">    
    <tr height="20px"></tr>
    <tr>
      <td width="100%" colspan="4">
        <div align="center" class="style1"><strong><?php echo strtoupper($dataKost['nama_kost']); ?></strong><br>
          <?php echo $dataKost['alamat_kost']; ?>, Telp <?php echo $dataKost['no_kost']; ?> <?php echo $dataKost['kota_kost']; ?> <?php echo $dataKost['provinsi_kost']; ?><br>
          Website : kos.luqman-project.com E-Mail : <?php echo $dataKost['email_kost']; ?> </div>
      </td>    
    <tr>
      <td colspan="4"></td>
    </tr>
    <tr>
      <td colspan="4">
        <hr noshade>
      </td>
    </tr>
    <tr>
      <td colspan="4"  align="center">
        <strong class="style1">LAPORAN LABA RUGI</strong>
      </td>
    </tr>
    <tr>
      <td colspan="4"  align="center">
        <strong class="style1"><?php echo $tahun ?></strong>
      </td>
    </tr>
    <tr height="20px">      
      <td width="25%">
        
      </td>
      <td width="25%">        
      </td>      
      <td width="25%" colspan="2"></td>
    </tr>
    <tr>      
      <td width="25%">
        
      </td>
      <td width="25%">        
      </td>      
      <td width="25%" colspan="2"><strong>TANGGAL CETAK: <?php echo $dataPembayaran['tanggal_cetak']; ?></strong></td>
    </tr>
    <tr height="30px">      
      <td width="25%"></td>
      <td width="25%"></td>
      <td width="25%"></td>
      <td width="25%"></td>
    </tr>
    <tr height="30px">      
      <td width="25%"><strong>PERIODE</strong></td>
      <td width="25%">: <?php echo $tahun; ?></td>
      <td width="25%"></td>
      <td width="25%"></td>
    </tr>
    <tr height="30px">      
      <td width="25%"><strong>TOTAL PEMASUKAN</strong></td>
      <td width="25%">: <?php echo 'Rp. '.number_format($dataPembayaran['total_pembayaran']); ?></td>
      <td width="25%"></td>
      <td width="25%"></td>
    </tr>
    <tr height="30px">      
      <td width="25%"><strong>TOTAL PENGELUARAN</strong></td>
      <td width="25%">: <?php echo 'Rp. '.number_format($dataPengeluaran['total_pengeluaran']); ?></td>
      <td width="25%"></td>
      <td width="25%"></td>
    </tr>
    <?php $pemasukan = $dataPembayaran['total_pembayaran']; $pengeluaran = $dataPengeluaran['total_pengeluaran']; ?>
    <tr height="30px">      
      <td width="25%"><strong>LABA / RUGI</strong></td>
      <td width="25%">: <?php echo 'Rp. '.number_format($pemasukan - $pengeluaran); ?></td>
      <td width="25%"></td>
      <td width="25%"></td>
    </tr>
    <tr height="30px">      
      <td width="26%"></td>
      <td width="74%" colspan="3"></td>    
    </tr>    
    <tr height="30px">      
      <td align="center"><button name="cetak" type="button" id="cetak" value="Cetak" onClick="Cetakan()">Cetak</button></td>
      <td ></td>      
      <td colspan="2"></td>
    </tr>
  </table>
  
  

<script>
function Cetakan()
{ 
  var x = document.getElementsByName("cetak");
  for(i = 0; i < x.length ; i++)
  {
  		x[i].style.visibility = "hidden";
  }

  window.print();
  alert("Jangan di tekan tombol OK sebelum dokumen selesai tercetak!");
  for(i = 0; i < x.length ; i++)
  {
  		x[i].style.visibility = "visible";
  }
}
</script>

<?php } ?>
</body>

</html>