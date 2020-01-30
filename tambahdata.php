<?php

    require_once 'data-siswa.php';

  $name = isset($_POST['name']) ? $_POST['name']: null;
  $nis = isset($_POST['nis']) ? $_POST['nis']: null;
  $kelas = isset($_POST['kelas']) ? $_POST['kelas']: null;
  $telepon = isset($_POST['telepon']) ? $_POST['telepon']: null;
  $alamat = isset($_POST['alamat']) ? $_POST['alamat']: null;


$totaldata = array_keys($_SESSION['datasiswa']);

$keybaru = end($totaldata) +1;



$_SESSION['datasiswa'][$keybaru] =[
             'nama' => $name,
             'nis' => $nis,
             'kelas' =>  $kelas,  
            'telepon' => $telepon,             
            'alamat' =>  $alamat,
];

echo "Berhasil";

?>