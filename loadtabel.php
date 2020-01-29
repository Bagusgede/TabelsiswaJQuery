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
        <td> <a class="uk-button uk-button-danger tombol-hapus" href="#" uk-toggle data-id="<?=$key ?>"
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
        <td> <a class="uk-button uk-button-danger tombol-hapus" href="#" uk-toggle data-id="<?=$key ?>"
                data-modal="#modal-center">Deleted</a></td>

        <?php   
}
}
?>
        <div id="modal-center" class="uk-flex-top" uk-modal>
            <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
                <form action="deleted.php" method="post">
                    <input type="hidden" class="id" value="" name="id">
                    <button class="uk-modal-close-default" type="button" uk-close></button>
                    <h2>Are Youd Sure?</h2>
                    <p>Are you sure you want to delete this student data?</p>

                    <div class="uk-modal-footer uk-text-right">
                        <button style="border-radius : 10px;"
                            class="uk-button uk-button-primary uk-modal-close"
                            type="button">Cancel</button> ||
                        <button style="border-radius : 10px;" class="uk-button uk-button-danger"
                            type="submit">Deleted</button>
                    </div>
                </form>
            </div>
        </div>

        <?php
$i++; 

endforeach;

?>


</table>