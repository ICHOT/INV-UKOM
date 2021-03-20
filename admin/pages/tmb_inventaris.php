<?php
//Auto Number
$query = "SELECT max(id_inventaris) as maxKode FROM tbl_inventaris";
$hasil = mysqli_query($connect, $query);
$data = mysqli_fetch_array($hasil);
$kode = $data['maxKode'];
$noUrut = (int) substr($kode, 3, 3);
$noUrut++;
$char = "IN";
$newID = $char . sprintf("%03s", $noUrut); //Substring
?>
<div class="col-lg-12">
  <div class="card">
    <div class="card-header">
      <strong>Form</strong> Tambah Inventaris
    </div>
    <div class="card-body card-block">
      <form action="proses/proses_inventaris.php" method="post" enctype="multipart/form-data" class="form-horizontal">

        <div class="row form-group">
          <div class="col col-md-3"><label for="text-input" class=" formcontrol-label">ID Inventaris</label></div>
          <div class="col-12 col-md-9"><input type="text" id="text-input" value="<?php echo $newID; ?>" readonly name="id_inventaris" class="form-control"></div>
        </div>
        <div class="row form-group">
          <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama
              Barang</label></div>
          <div class="col-12 col-md-9"><input type="text" id="text-input" name="nama_brg" placeholder="Masukkan Nama Inventaris" class="form-control" required=""></div>
        </div>
        <div class="row form-group">
          <div class="col col-md-3"><label for="text-input" class=" formcontrol-label">Jenis Barang</label></div>
          <div class="col-12 col-md-9"><input type="text" id="text-input" name="jenis_brg" placeholder="Masukkan Kondisi Inventaris" class="form-control" required=""></div>
        </div>
        <div class="row form-group">
          <div class="col col-md-3"><label for="text-input" class=" formcontrol-label">Kondisi</label></div>
          <div class="col-12 col-md-9"><input type="text" id="text-input" name="kondisi" placeholder="Masukkan Kondisi Inventaris" class="form-control" required=""></div>
        </div>

        <div class="row form-group">
          <div class="col col-md-3"><label for="text-input" class=" formcontrol-label">Jumlah</label></div>
          <div class="col-12 col-md-9"><input type="number" id="text-input" name="jumlah" placeholder="Masukkan Jumlah Inventaris" class="form-control" required=""></div>
        </div>
        <div class="row form-group">
          <div class="col col-md-3"><label for="text-input" class=" formcontrol-label">Tanggal Register</label></div>
          <div class="col-12 col-md-9"><input type="date" id="text-input" name="tgl_register" placeholder="Masukkan Tanggal Register" class="form-control" required=""></div>
        </div>

    </div>
    <div class="card-footer" align="center">
      <button type="submit" name="tmb_inventaris" class="btn btn-primary btn-sm">
        <i class="fas fa-dot-circle"></i> Tambah
      </button>
      <button type="reset" class="btn btn-danger btn-sm">
        <i class="fas fa-ban"></i> Reset
      </button>
    </div>
  </div>
  </form>
</div>