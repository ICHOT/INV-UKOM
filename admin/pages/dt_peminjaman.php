<div class="breadcrumbs">
  <div class="col-sm-4">
    <h1>Data Peminjaman</h1>
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
            <a target="blank" align="right" href="pages/laporan_peminjaman.php" class="btn btn-danger"><i class="fa fa-print"></i> Cetak</a><br>
          </div>
          <div class="card-body">
            <table id="bootstrap-data-table" class="table table-striped table-bordered">
              <thead>
                <tr align="center">
                  <th>No.</th>
                  <th>ID Peminjaman</th>
                  <th>Peminjam</th>
                  <th>Nama Barang</th>
                  <th>Tanggal Pinjam</th>
                  <th>Tanggal Kembali</th>
                  <th>Status</th>
                  <th>Aksi <span class="ti-settings"></span></th>
                </tr>
              </thead>
              <tbody>
                <?php


                $query = "SELECT `tbl_peminjaman`.`id_peminjam`,
`tbl_peminjaman`.`tgl_pinjam`,
`tbl_peminjaman`.`tgl_kembali`,
`tbl_peminjaman`.`jumlah`,
`tbl_peminjaman`.`status_peminjaman`,
`tbl_inventaris`.`nama_brg`,
`tbl_pengguna`.`nama`,
`tbl_peminjaman`.`id_pengguna`,
`tbl_peminjaman`.`id_inventaris` FROM `tbl_inventaris` INNER JOIN `tbl_peminjaman` ON
`tbl_peminjaman`.`id_inventaris` = `tbl_inventaris`.`id_inventaris` INNER JOIN `tbl_pengguna` ON
`tbl_peminjaman`.`id_pengguna` = `tbl_pengguna`.`id_pengguna`";
                $sql = mysqli_query($connect, $query);
                $no = 1;
                while ($data = mysqli_fetch_array($sql)) {
                  echo "<tr class='gradeA'>";
                  echo "<td><center><b>" . $no . "</b></td>";
                  echo "<td><center>" . $data['id_peminjam'] . "</td>";
                  echo "<td><center>" . $data['nama'] . "</center></td>";
                  echo "<td><center>" . $data['nama_brg'] . "</center></td>";
                  echo "<td><center>" . $data['tgl_pinjam'] . "</center></td>";
                  echo "<td><center>" . $data['tgl_kembali'] . "</center></td>";
                  if ($data['status_peminjaman'] == "Dipinjam") {
                    echo "<td><center><a href='proses/kembali_proses.php?id=$data[id_peminjam]'><font color='red'><b>" . $data['status_peminjaman'] . "</b></font></center></td>";
                  } else {
                    echo "<td><center><font color='blue'><b>" . $data['status_peminjaman'] . "</b></font></center></td>";
                  }
                  echo "<td>";
                ?>
                  <a class="btn btn-warning" href="javascript: if (confirm('Apakah anda yakiningin menghapus data?')) { window.location.href='proses/proses_peminjaman.php?id=<?php echo
                                                                                                                                                                              $data['id_peminjam']; ?>' } else { void('') }; "><i class="fas fa-trash-alt"></i></a>
                  <a class="btn btn-primary" target="blank" href="index.php?page=detail_peminjaman&&id=<?php echo $data["id_peminjam"] ?>"> <i class="fas fa-info"></i>
                  </a>
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