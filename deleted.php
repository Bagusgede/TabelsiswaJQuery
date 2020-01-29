<?php
require 'data-siswa.php';

$id = $_POST['id'];

unset($_SESSION['datasiswa'][$id]);

echo "Berhasil";

?>