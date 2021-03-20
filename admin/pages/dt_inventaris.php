<div class="breadcrumbs">
  <div class="col-sm-4">
    <h1>Data Inventaris</h1>
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
<!------------------------------->
<div class="content mt-3">
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">

            <a align="right" href="index.php?page=tmb_inventaris" class="btn btn-primary">Tambah</a>
            <a target="blank" align="right" href="pages/laporan_inventaris.php" class="btn btn-danger"><i class="fa fa-print"></i>
              Cetak</a><br>

          </div>
          <div class="card-body">
            <table id="bootstrap-data-table" class="table table-striped table-bordered">
              <thead>
                <tr align="center">
                  <th>No.</th>
                  <th>ID Inventaris</th>
                  <th>Nama Barang</th>
                  <th>Jenis Barang</th>
                  <th>kondisi</th>
                  <th>Jumlah</th>
                  <th>Tgl Masuk</th>
                  <th>Aksi <span class="ti-settings"></span></th>
                </tr>
              </thead>
              <tbody>
                <?php
                $query = "SELECT * FROM tbl_inventaris";
                $sql = mysqli_query($connect, $query);
                $no = 1;
                while ($data = mysqli_fetch_array($sql)) {
                  echo "<tr class='gradeA'>";
                  echo "<td><center><b>" . $no . "</b></td>";
                  echo "<td><center>" . $data['id_inventaris'] . "</td>";
                  echo "<td><center>" . $data['nama_brg'] . "</center></td>";
                  echo "<td><center>" . $data['jenis_brg'] . "</center></td>";
                  echo "<td><center>" . $data['kondisi'] . "</center></td>";
                  echo "<td><center>" . $data['jumlah'] . "</center></td>";
                  echo "<td><center>" . $data['tgl_register'] . "</center></td>";
                  echo "<td><center>
<a class='btn btn-info '
href='index.php?page=ubh_inventaris&&id=" . $data['id_inventaris'] . "'> <i class='fas fa-edit'></i> </a>
";
                ?>
                  <a class="btn btn-warning" href="javascript: if (confirm('Apakah anda yakin
ingin menghapus data?')) { window.location.href='proses/proses_inventaris.php?id=<?php echo
                                                                                  $data['id_inventaris']; ?>' } else { void('') }; "><i class="fas fa-trash-alt"></i></a>
                  <a class="btn btn-primary" target="blank" href="index.php?
page=detail_inventaris&&id=<?php echo $data["id_inventaris"] ?>"> <i class="fas fa-info-circle"></i> </a>
                  </td>
                <?php
                  echo "</tr>";
                  $no++;
                }

                ?>


              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div><!-- .animated -->
</div><!-- .content -->