<?php
$autonumber = "PNJ-" . date('Ymdhis');
?>
<div class="col-lg-12">
  <div class="card">
    <div class="card-header">
      <strong>Form</strong> Tambah Transaksi Peminjaman
    </div>
    <div class="card-body card-block">
      <form action="proses/proses_peminjaman.php" method="post" enctype="multipart/form-data" class="form-horizontal">

        <div class="row form-group">
          <div class="col col-md-3"><label for="text-input" class=" formcontrol-label">ID Peminjam</label></div>
          <div class="col-12 col-md-9"><input type="text" id="text-input" value="<?php echo $autonumber; ?>" readonly name="id_peminjaman" class="form-control"></div>
        </div>
        <div class="row form-group">
          <div class="col col-md-3"><label for="select" class=" form-controllabel">Peminjam</label></div>
          <div class="col-12 col-md-9">
            <select name="id_pengguna" id="select" rows="9" class="form-control" required>
              <option values="">-Pilih-</option>
              <?php
              $sql = "SELECT * FROM tbl_pengguna";
              $qry = mysqli_query($connect, $sql);
              while ($hsl = mysqli_fetch_array($qry)) {
                echo "<option value='$hsl[id_pengguna]'>$hsl[nama]</option>";
              }
              ?>
            </select>
          </div>
        </div>
        <div class="row form-group">
          <div class="col col-md-3"><label for="select" class="form-controllabel">Nama Barang</label></div>
          <div class="col-12 col-md-9">
            <select name="id_inventaris" id="select" rows="9" class="form-control" required>
              <option values="">-Pilih-</option>
              <?php
              $sql = "SELECT * FROM tbl_inventaris";
              $qry = mysqli_query($connect, $sql);
              while ($hsl = mysqli_fetch_array($qry)) {
                echo "<option value='$hsl[id_inventaris]'>$hsl[nama_brg]</option>";
              }
              ?>
            </select>
          </div>
        </div>
        <div class="row form-group">
          <div class="col col-md-3"><label for="text-input" class=" formcontrol-label">Jumlah Pinjam</label></div>
          <div class="col-12 col-md-9"><input type="number" name="jumlah" min="1" placeholder="Masukkan Jumlah" class="form-control" required="" onkeypress="return isAlphabetKey(event)" style="text-transform: capitalize;"></div>
        </div>
        <div class="row form-group">
          <div class="col col-md-3"><label for="text-input" class=" formcontrol-label">Tgl. Pinjam</label></div>
          <div class="col-12 col-md-9"><input type="date" id="text-input" name="tgl_pinjam" placeholder="Masukkan Tanggal Pinjam" class="form-control" required="" onkeypress="return isAlphabetKey(event)" style="text-transform: capitalize;"></div>
        </div>
        <div class="row form-group">
          <div class="col col-md-3"><label for="text-input" class=" formcontrol-label">Tgl. Kembali</label></div>
          <div class="col-12 col-md-9"><input type="date" id="text-input" name="tgl_kembali" placeholder="Masukkan Tanggal Kembali" class="form-control" required="" onkeypress="return isAlphabetKey(event)" style="text-transform: capitalize;"></div>
        </div>



        <div class="row form-group">
          <div class="col col-md-3"><label for="text-input" class=" formcontrol-label">Status</label></div>
          <div class="col-12 col-md-9"><input type="text" id="text-input" name="status_peminjaman" value="Dipinjam" readonly class="form-control" required="" onkeypress="return isAlphabetKey(event)" style="text-transform: capitalize;"></div>
        </div>




        <div class="card-footer" align="center">
          <button type="submit" name="tmb_peminjam" class="btn btn-primary btn-sm">
            <i class="fas fa-dot-circle"></i> Tambah
          </button>
          <button type="reset" class="btn btn-danger btn-sm">
            <i class="fas fa-ban"></i> Reset
          </button>
        </div>
    </div>
    </form>
  </div>