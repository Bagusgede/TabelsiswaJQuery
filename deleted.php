<?php
require 'data-siswa.php';

$id = $_POST['id'];

unset($_SESSION['datasiswa'][$id]);

header("Location:index.php");

?>