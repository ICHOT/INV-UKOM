<?php
include "../../koneksi/koneksi.php";
//Proses Tambah Inventaris
if (isset($_POST['tmb_inventaris'])) {
  $id_inventaris = $_POST['id_inventaris'];
  $nama_brg = $_POST['nama_brg'];
  $jenis_brg = $_POST['jenis_brg'];
  $kondisi = $_POST['kondisi'];
  $jumlah = $_POST['jumlah'];
  $tgl_register = $_POST['tgl_register'];
  //$id_pengguna = $_POST['id_pengguna'];
  //INSERT QUERY START
  $query = "insert into tbl_inventaris
values('$id_inventaris','$nama_brg','$jenis_brg','$kondisi', '$jumlah', '$tgl_register')";


  $sql = mysqli_query($connect, $query);
  if ($sql) { ?>
    <script language="JavaScript">
      alert('Data berhasil ditambahkan');
      document.location = "../index.php?page=inventaris";
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
//Proses Ubah
else if (isset($_POST['ubh_inventaris'])) {

  $id_inventaris = $_POST['id_inventaris'];
  $nama_brg = $_POST['nama_brg'];
  $jenis_brg = $_POST['jenis_brg'];
  $kondisi = $_POST['kondisi'];
  $jumlah = $_POST['jumlah'];
  $tgl_register = $_POST['tgl_register'];
  //$id_pengguna = $_POST['id_pengguna'];

  //Proses Ubah
  $query = "UPDATE `tbl_inventaris` SET `nama_brg` = '$nama_brg', `jenis_brg` = '$jenis_brg',
`kondisi` = '$kondisi', `jumlah` = '$jumlah', `tgl_register` = '$tgl_register' WHERE
`tbl_inventaris`.`id_inventaris` = '$id_inventaris';";
  $sql = mysqli_query($connect, $query);
  if ($sql) { ?>
    <script language="JavaScript">
      alert('Data berhasil diubah');
      document.location = "../index.php?page=inventaris";
    </script>
  <?php
  } else { ?>
    <script language="JavaScript">
      alert('Data gagal diubah, silakan cek kembali');
      window.history.go(-1);
    </script>
  <?php
  }
}
//Proses Hapus
else if ($_GET['id']) {
  $id = $_GET['id'];
  //DELETE QUERY START
  $query = "delete from tbl_inventaris where id_inventaris='$id'";
  $sql = mysqli_query($connect, $query);
  if ($sql) { ?>
    <script language="JavaScript">
      document.location = "../index.php?page=inventaris";
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