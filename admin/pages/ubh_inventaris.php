<?php
$id = $_GET['id'];
$query = "SELECT * FROM tbl_inventaris WHERE id_inventaris='$id'";
$sql = mysqli_query($connect, $query);
$data = mysqli_fetch_array($sql);
?>
<div class="col-lg-12">
  <div class="card">
    <div class="card-header">
      <strong>Form</strong> Ubah Inventaris
    </div>
    <div class="card-body card-block">
      <form action="proses/proses_inventaris.php" method="post" enctype="multipart/form-data" class="form-horizontal">
        <div class="row form-group">
          <div class="col col-md-3"><label for="text-input" class=" formcontrol-label">ID Inventaris</label></div>
          <div class="col-12 col-md-9"><input type="text" id="text-input" readonly name="id_inventaris" value="<?php echo $data['id_inventaris'] ?>" class="formcontrol"></div>
        </div>
        <div class="row form-group">
          <div class="col col-md-3"><label for="text-input" class=" formcontrol-label">Nama Barang</label></div>
          <div class="col-12 col-md-9"><input type="text" id="text-input" name="nama_brg" value="<?php echo $data['nama_brg'] ?>" placeholder="Masukkan Nama Petugas" class="form-control" required=""></div>
        </div>

        <div class="row form-group">
          <div class="col col-md-3"><label for="text-input" class=" formcontrol-label">Jenis Barang</label></div>
          <div class="col-12 col-md-9"><input type="text" id="text-input" name="jenis_brg" value="<?php echo $data['jenis_brg'] ?>" placeholder="Masukkan Nama Petugas" class="form-control" required=""></div>
        </div>

        <div class="row form-group">
          <div class="col col-md-3"><label for="text-input" class=" formcontrol-label">Kondisi</label></div>
          <div class="col-12 col-md-9"><input type="text" id="text-input" name="kondisi" value="<?php echo $data['kondisi'] ?>" placeholder="Masukkan Kondisi Inventaris" class="form-control" required=""></div>
        </div>

        <div class="row form-group">
          <div class="col col-md-3"><label for="text-input" class=" formcontrol-label">Jumlah</label></div>
          <div class="col-12 col-md-9"><input type="number" id="text-input" name="jumlah" value="<?php echo $data['jumlah'] ?>" placeholder="Masukkan Jumlah Inventaris" class="form-control" required=""></div>
        </div>

        <div class="row form-group">
          <div class="col col-md-3"><label for="text-input" class=" formcontrol-label">Tanggal Register</label></div>
          <div class="col-12 col-md-9"><input type="date" id="text-input" name="tgl_register" value="<?php echo $data['tgl_register'] ?>" placeholder="Masukkan Tanggal
Register" class="form-control" required=""></div>
        </div>

        <div class="row form-group">
          <div class="col col-md-3"><label for="select" class=" form-controllabel">Pengguna</label></div>

        </div>
    </div>


  </div>
  <div class="card-footer" align="center">
    <button type="submit" name="ubh_inventaris" class="btn btn-primary btn-sm">
      <i class="fa fa-dot-circle-o"></i> Ubah
    </button>
    <a href="index.php?page=inventaris" class="btn btn-danger btn-sm">
      <i class="fa fa-ban"></i> Batal
    </a>
  </div>
</div>
</form>
</div>