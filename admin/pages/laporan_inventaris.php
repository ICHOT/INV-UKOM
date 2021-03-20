<?php
include "../../koneksi/koneksi.php";
//ProsesCetak
ob_start();
require("../../assets/html2pdf/html2pdf.class.php");
$now = date('Y-m-d-His');
$now2 = date('d-m-Y');
$filename = "Laporan_Inventaris_[$now].pdf";
$tahun = $_POST['tahun'];
$bulan = $_POST['bulan'];
$content = ob_get_clean();
//Menampilkan Data
$content = "<style>
 p.kop{
 margin-left:45px;
 }

 </style>
 <br>
 <table class='kop' border='0' align='center'>
 <tr>
 <td align='right' width='100%'><img src='../images/logoletris.png' width='150'
height='100'></td>
 <td width='600'>
 <h2 align='center'>PT. Letris Indonesia </h2>
 <p class='kop' align='center'> Jl. Siliwangi No.55 
Pondok Benda. Pamulang.
Tangerang Selatan. 15416.
 <br>Telp. (021) 7009 4748. website : http://www.letrisindonesia-school.sch.id/</p>
 </td>
 </tr>
 </table>
 <br>
<p
align='center'>_________________________________________________________________________________
_________________________________________________</p>
<h3 align='center'>Laporan Data seluruh Inventaris</h3>
<table cellpadding='0' cellspacing='1' style='width: 210mm;' border=0.5 align='center'>
<tr align='center' bgcolor='#CCCCCC'>
<th style='width: 30px; height: 20px'>No.</th>
<th style='width: 100px; height: 20px'>ID</th>
<th style='width: 150px; height: 20px'>Nama Barang</th>
<th style='width: 150px; height: 20px'>Jenis Barang</th>
<th style='width: 80px; height: 20px'>KOndisi</th>
<th style='width: 90px; height: 20px'>Jumlah</th>
<th style='width: 180px; height: 20px'>Tanggal Register</th>
</tr>";
//Menampilkan Data

$query = "SELECT
 `tbl_inventaris`.*
 FROM
 `tbl_inventaris`
";
$sql = mysqli_query($connect, $query);
$no = 1; // nomor baris
while ($r = mysqli_fetch_array($sql)) {

  $content .= "<tr bgcolor='#0000' align='center'>
 <td>$no</td>
 <td style='text-transform:capitalize'>$r[id_inventaris]</td>
 <td style='text-align:center'>$r[nama_brg]</td>
<td style='text-align:center'>$r[jenis_brg]</td>
<td style='text-align:center'>$r[kondisi]</td>
<td style='text-align:center'>$r[jumlah]</td>
<td style='text-align:center'>$r[tgl_register]</td>
 </tr>";

  $no++;
}

$content .= "
</table>
<br>
<br>
<p align='right'><i>Dicetak oleh Admin pada $now2</i></p>
 ";


ob_end_clean();
// conversion HTML => PDF
try {
  $html2pdf = new HTML2PDF('L', 'A3', 'fr', false, 'ISO-8859-15', array(2, 2, 2, 2));
  $html2pdf->setDefaultFont('Arial');
  $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
  $html2pdf->Output($filename);
} catch (HTML2PDF_exception $e) {
  echo $e;
}
?>
?>