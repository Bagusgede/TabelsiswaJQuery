<?php
    require_once 'data-siswa.php';
    $kelas = isset($_REQUEST['kelas']) ? $_REQUEST['kelas'] : null

?>

<table class="uk-table uk-table-middle uk-table-divider">


<h1 class=" uk-text-center">Tabel Data Siswa</h1>
<br><br>

<thead>
    <tr>
        <th class="uk-width-small">NO</th>
        <th>Nama</th>
        <th>No Induk</th>
        <th>Kelas</th>
        <th>Telepon</th>
        <th>Alamat</th>
        <th>Aksi</th>
    </tr>
</thead>
<tbody>

    <?php

$i=1;
foreach($_SESSION['datasiswa'] as $key=>$value):
$namesiswa =$value['nama'];
$nissiswa = $value['nis'];
$kelassiswa = $value['kelas'];
$teleponsiswa = $value['telepon'];
$alamatsiswa = $value['alamat'];


if($kelas == null) {


?>
    <tr>

        <td><?=$i?></td>
        <td><?= $namesiswa ?></td>
        <td><?= $nissiswa ?></td>
        <td><?= $kelassiswa ?></td>
        <td><?= $teleponsiswa ?></td>
        <td><?= $alamatsiswa ?></td>
        <td> <a class="uk-button uk-button-danger tombol-hapus" href="#" type="button" data-id="<?=$key ?>"
                data-modal="#modal-center">Deleted</a></td>

        <?php
} else {
if($kelas == $value['kelas']){
?>
        <td><?=$i?></td>
        <td><?= $namesiswa ?></td>
        <td><?= $nissiswa ?></td>
        <td><?= $kelassiswa ?></td>
        <td><?= $teleponsiswa ?></td>
        <td><?= $alamatsiswa ?></td>
        <td> <a class="uk-button uk-button-danger tombol-hapus" href="#" type="button" data-id="<?=$key ?>"
                data-modal="#modal-center">Delete</a></td>

        <?php   
}
}
?>
      

        <?php
$i++; 

endforeach;

?>
</tbody>

</table>
<?php
                    require 'file-hapus.php';
                ?>