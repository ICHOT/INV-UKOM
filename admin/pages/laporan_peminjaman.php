<?php

include "../../koneksi/koneksi.php";

$Lapor = "SELECT
`tbl_peminjaman`.`id_peminjam`,
`tbl_peminjaman`.`tgl_pinjam`,
`tbl_peminjaman`.`tgl_kembali`,
`tbl_peminjaman`.`jumlah`,
`tbl_peminjaman`.`status_peminjaman`,

`tbl_pengguna`.`nama`,
`tbl_inventaris`.`nama_brg`FROM `tbl_inventaris`
INNER JOIN 
`tbl_peminjaman` ON `tbl_inventaris`.`id_inventaris` =
`tbl_peminjaman`.`id_inventaris`
INNER JOIN `tbl_pengguna` ON `tbl_pengguna`.`id_pengguna` = `tbl_peminjaman`.`id_pengguna`";

$Hasil = mysqli_query($connect, $Lapor);
$Data = array();
while ($row = mysqli_fetch_assoc($Hasil)) {
  array_push($Data, $row);
}
$Judul = "Laporan Peminjaman";
$tgl = "Waktu : " . date("l, d F Y");
$Header = array(
  array("label" => "ID Peminjam", "length" => 40, "align" => "L"),
  array("label" => "TGL Pinjam", "length" => 25, "align" => "L"),
  array("label" => "TGL Kembali", "length" => 27, "align" => "L"),
  array("label" => "Jumlah", "length" => 16, "align" => "L"),
  array("label" => "Status", "length" => 25, "align" => "L"),
  array("label" => "Nama Peminjam", "length" => 33, "align" => "L"),
  array("label" => "Nama Barang", "length" => 30, "align" => "L"),
);
require("../../assets/fpdf16/fpdf.php");
$pdf = new FPDF();
$pdf->AddPage('P', 'A4', 'C');
//judul
$pdf->SetFont('arial', 'B', '15');
$pdf->Cell(0, 15, $Judul, '0', 1, 'C');
//tanggal
$pdf->SetFont('arial', 'i', '9');
$pdf->Cell(0, 10, $tgl, '0', 1, 'P');
//header
$pdf->SetFont('arial', '', '12');
$pdf->SetFillColor(190, 190, 0);
$pdf->SetTextColor(255);
$pdf->setDrawColor(128, 0, 0);
foreach ($Header as $Kolom) {
  $pdf->Cell($Kolom['length'], 8, $Kolom['label'], 1, '0', $Kolom['align'], true);
}
$pdf->Ln();
//menampilkan data
$pdf->SetFillColor(244, 235, 255);
$pdf->SettextColor(0);
$pdf->SetFont('arial', '', '10');
$fill = false;
foreach ($Data as $Baris) {
  $i = 0;
  foreach ($Baris as $Cell) {
    $pdf->Cell($Header[$i]['length'], 7, $Cell, 2, '0', $Kolom['align'], $fill);
    $i++;
  }
  $fill = !$fill;
  $pdf->Ln();
}
//output
$pdf->Output();
