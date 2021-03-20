<?php
include "../../koneksi/koneksi.php";
$id_peminjam = $_GET["id"];
$status_peminjaman = "Dikembalikan";
//Proses Ubah status
$query = "UPDATE `tbl_peminjaman` SET `status_peminjaman` = '$status_peminjaman' WHERE
`tbl_peminjaman`.`id_peminjam` = '$id_peminjam'";
$sql = mysqli_query($connect, $query);
if ($sql) { ?>
  <script language="JavaScript">
    alert('Data Dikembalikan');
    document.location = "../index.php?page=peminjaman";
  </script>
<?php
} else { ?>
  <script language="JavaScript">
    alert('Data gagal mengembalikan, silakan cek kembali');
    window.history.go(-1);
  </script>
<?php
}
?>