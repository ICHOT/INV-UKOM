<?php
include 'header.php';
if (isset($_GET['page'])) {
  switch ($_GET['page']) {
    case 'beranda':
      include 'pages/beranda.php';
      break;
      // case 'pengguna':
      //   include 'pages/dt_pengguna.php';
      //   break;
      // case 'tmb_pengguna':
      //   include 'pages/tmb_pengguna.php';
      //   break;
      // case 'ubh_pengguna':
      //   include 'pages/ubh_pengguna.php';
      //   break;



      // case 'inventaris':
      //   include 'pages/dt_inventaris.php';
      //   break;
      // case 'tmb_inventaris':
      //   include 'pages/tmb_inventaris.php';
      //   break;
      // case 'ubh_inventaris':
      //   include 'pages/ubh_inventaris.php';
      //   break;
      // case 'detail_inventaris':
      //   include 'pages/detail_inventaris.php';
      //   break;



      // case 'peminjaman':
      //   include 'pages/peminjaman.php';
      //   break;
      // case 'inp_peminjaman':
      //   include 'pages/input_peminjaman.php';
      //   break;
    case "peminjaman":
      include 'pages/dt_peminjaman.php';
      break;

    default:
      include 'pages/404.php';
      break;
  }
} else {
  include 'pages/beranda.php';
}
include 'footer.php';
