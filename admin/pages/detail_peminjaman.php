<?php

//menangkap id inventaris
$id_peminjam = $_GET['id'];
$query = "SELECT
        `tbl_peminjaman`.`id_peminjam`,
        `tbl_peminjaman`.`tgl_pinjam`,
        `tbl_peminjaman`.`tgl_kembali`,
        `tbl_peminjaman`.`status_peminjaman`,
        `tbl_peminjaman`.`jumlah`,
        `tbl_peminjaman`.`id_pengguna`,
        `tbl_peminjaman`.`id_inventaris`,
        `tbl_inventaris`.`nama_brg`,
        `tbl_pengguna`.`nama`
      FROM
        `tbl_peminjaman`
        INNER JOIN `tbl_pengguna` ON `tbl_peminjaman`.`id_pengguna` = `tbl_pengguna`.`id_pengguna`
        INNER JOIN `tbl_inventaris` ON `tbl_peminjaman`.`id_inventaris` = `tbl_inventaris`.`id_inventaris`
        WHERE `tbl_peminjaman`.`id_peminjam` = '$id_peminjam'";
$sql = mysqli_query($connect, $query);
$data = mysqli_fetch_array($sql);
?>
<div class="breadcrumbs">
  <div class="col-sm-4">
    <h1>Detail Peminjaman</h1>
    <div class="page-header float-left">
      <div class="page-title">
      </div>
    </div>
  </div>
  <div class="col-sm-8">
    <div class="page-header float-right">

    </div>
  </div>
</div>

<div class="col-lg-6">
  <div class="card">

    <div class="card-body card-block">

      <div class="row form-group">
        <div class="col col-md-3"><label for="text-input" class=" form-control-label">ID Peminjaman</label></div>
        <div class="col-12 col-md-9"><b><?php echo $data['id_peminjam'] ?></b></div>
      </div>

      <div class="row form-group">
        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama Peminjam</label></div>
        <div class="col-12 col-md-9"><b><?php echo $data['nama'] ?></b></div>
      </div>

      <div class="row form-group">
        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama Inventaris</label></div>
        <div class="col-12 col-md-9"><b><?php echo $data['nama_brg'] ?></b></div>
      </div>

    </div>

  </div>

</div>

<div class="col-lg-6">
  <div class="card">

    <div class="card-body card-block">

      <div class="row form-group">
        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tanggal Pinjam</label></div>
        <div class="col-12 col-md-9"><b><?php echo $data['tgl_pinjam'] ?></b></div>
      </div>

      <div class="row form-group">
        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tanggal Kembali</label></div>
        <div class="col-12 col-md-9"><b><?php echo $data['tgl_kembali'] ?></b></div>
      </div>

      <div class="row form-group">
        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Status</label></div>
        <div class="col-12 col-md-9"><b><?php echo $data['status_peminjaman'] ?></b></div>
      </div>

      <div class="row form-group">
        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Jumlah Pinjam</label></div>
        <div class="col-12 col-md-9"><b><?php echo $data['jumlah'] ?></b></div>
      </div>

    </div>

  </div>

</div>