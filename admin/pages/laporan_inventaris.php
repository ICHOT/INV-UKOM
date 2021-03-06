<?php

include "../../koneksi/koneksi.php";

$Lapor = "SELECT
  id_inventaris,
  nama_brg,
  jenis_brg,
  kondisi,
  jumlah,
  tgl_register

 FROM tbl_inventaris";

$Hasil = mysqli_query($connect, $Lapor);
$Data = array();
while ($row = mysqli_fetch_assoc($Hasil)) {
  array_push($Data, $row);
}
$Judul = "Laporan Peminjaman";
$tgl = "Waktu : " . date("l, d F Y");
$Header = array(
  array("label" => "ID Inventaris", "length" => 40, "align" => "L"),
  array("label" => "Nama Barang", "length" => 25, "align" => "L"),
  array("label" => "Jenis Barang", "length" => 27, "align" => "L"),
  array("label" => "Kondisi", "length" => 40, "align" => "L"),
  array("label" => "Jumlah", "length" => 25, "align" => "L"),
  array("label" => "Tgl Masuk", "length" => 27, "align" => "L"),

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
  $pdf->Cell($Kolom['length'], 4, $Kolom['label'], 1, '0', $Kolom['align'], true);
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
