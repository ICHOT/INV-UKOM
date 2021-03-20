<?php
include "../../koneksi/koneksi.php";
//ProsesCetak
ob_start();
require ("../../assets/html2pdf/html2pdf.class.php");
$now = date('Y-m-d-His');
$now2 = date('d-m-Y');
$filename ="Laporan_Peminjaman_[$now].pdf";
$tahun=$_POST['tahun'];
$bulan=$_POST['bulan'];
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
<h3 align='center'>Laporan Data Peminjaman</h3>
<table cellpadding='0' cellspacing='1' style='width: 210mm;' border=0.5 align='center'>
 <tr align='center' bgcolor='#CCCCCC'>
 <th style='width: 30px; height: 20px'>No.</th>
<th style='width: 100px; height: 20px'>ID Pinjam</th>
<th style='width: 100px; height: 20px'>Tgl. Pinjam</th>
 <th style='width: 100px; height: 20px'>Tgl. Kembali</th>
<th style='width: 100px; height: 20px'>Jumlah Pinjam</th>
 <th style='width: 100px; height: 20px'>Status Peminjam</th>

 <th style='width: 100px; height: 20px'>Nama Peminjam</th>
 <th style='width: 100px; height: 20px'>Nama Barang</th>
</tr>";
//Menampilkan Data

 $query = "SELECT
 `tbl_peminjaman`.`id_peminjam`,
 `tbl_peminjaman`.`tgl_pinjam`,
 `tbl_peminjaman`.`tgl_kembali`,
`tbl_peminjaman`.`jumlah`,
 `tbl_peminjaman`.`status_peminjaman`,

 `tbl_pengguna`.`nama`,
 `tbl_inventaris`.`nama_brg`
 FROM
 `tbl_inventaris`
 INNER JOIN `tbl_peminjaman` ON `tbl_inventaris`.`id_inventaris` =
 `tbl_peminjaman`.`id_inventaris`
 INNER JOIN `tbl_pengguna` ON `tbl_pengguna`.`id_pengguna` =
`tbl_peminjaman`.`id_pengguna`";
 $sql = mysqli_query($connect, $query);
 $no = 1; // nomor baris
 while ($r = mysqli_fetch_array($sql)) {

 $content.="<tr bgcolor='#0000' align='center'>
 <td>$no</td>
 <td style='text-transform:capitalize'>$r[id_peminjam]</td>
 <td style='text-align:center'>$r[tgl_pinjam]</td>
 <td style='text-align:center'>$r[tgl_kembali]</td>

 <td style='text-align:center'>$r[jumlah]</td>
<td style='text-align:center'>$r[status_peminjaman]</td>
 <td style='text-align:center'>$r[nama]</td>
 <td style='text-align:center'>$r[nama_brg]</td>
 </tr>";

 $no++;
 }

$content.="
</table>
<br>
<br>
<p align='right'><i>Dicetak oleh admin pada $now2</i></p>
 ";

ob_end_clean();
// conversion HTML => PDF
try
{
$html2pdf = new HTML2PDF('L', 'A3','fr', false, 'ISO-8859-15',array(2, 2, 2, 2));
$html2pdf->setDefaultFont('Arial');
$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
$html2pdf->Output($filename);
}
catch(HTML2PDF_exception $e) { echo $e; }
