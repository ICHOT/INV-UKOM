<?php
include "../../koneksi/koneksi.php";
//Proses Tambah Inventaris
if (isset($_POST['tmb_peminjam'])) {
  $id_peminjaman = $_POST['id_peminjaman'];
  $tgl_pinjam = $_POST['tgl_pinjam'];
  $tgl_kembali = $_POST['tgl_kembali'];
  $jumlah = $_POST['jumlah'];
  $status_peminjaman = $_POST['status_peminjaman'];
  $id_pengguna = $_POST['id_pengguna'];
  $id_inventaris = $_POST['id_inventaris'];

  //INSERT QUERY START
  $query = "INSERT INTO tbl_peminjaman
VALUES('$id_peminjaman','$tgl_pinjam','$tgl_kembali','$jumlah','$status_peminjaman','$id_pengguna','$id_inventaris')";
  $sql = mysqli_query($connect, $query);
  if ($sql) { ?>
    <script language="JavaScript">
      alert('Data berhasil ditambahkan');
      document.location = "../index.php?page=peminjaman";
    </script>
  <?php
  } else { ?>
    <script language="JavaScript">
      alert('Data gagal ditambahkan, silakan cek kembali');
      window.history.go(-1);
    </script>
  <?php
  }
}
//Proses Hapus
else if ($_GET['id']) {
  $id = $_GET['id'];

  //DELETE QUERY START
  $query = "DELETE FROM tbl_peminjaman WHERE id_peminjam='$id'";
  $sql = mysqli_query($connect, $query);
  if ($sql) { ?>
    <script language="JavaScript">
      alert('Data Berhasil Dihapus');
      8
      document.location = "../index.php?page=peminjaman";
    </script>
  <?php
  } else { ?>
    <script language="JavaScript">
      alert('Data gagal dihapus, ulangi kembali');
      window.history.go(-1);
    </script>
<?php
  }
  exit;
}

?>