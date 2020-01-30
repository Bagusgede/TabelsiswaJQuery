<?php
require 'data-siswa.php';
$kelas = isset($_GET['kelas']) ? $_GET['kelas'] : null


?>

<!DOCTYPE html>
<html>

<head>
    <title>Tabel JQuery</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/uikit.min.css" />
    <script src="js/uikit.min.js"></script>
    <script src="js/uikit-icons.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
</head>

<body>
    <div class="uk-card uk-card-default uk-padding uk-position-center uk-card-hover">
        <div id="loadtabel">
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
                        <td> <a class="uk-button uk-button-danger tombol-hapus" href="#"  data-id="<?=$key ?>"
                                data-modal="#modal-center">Delete</a></td>

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
                        <td> <a class="uk-button uk-button-danger tombol-hapus" href="#"  data-id="<?=$key ?>"
                                data-modal="#modal-center">Delete</a></td>
                        <?php   
               }
            }
                $i++; 
               
                endforeach;
         
                ?>

</tbody>
<?php
                    require 'file-hapus.php';
                ?>
            </table>
        </div>


              

        <a class="uk-button uk-button-secondary" href="#modal-sections" uk-toggle>Tambah</a> ||

        <div id="modal-sections" uk-modal>
            <div class="uk-modal-dialog">
                <button class="uk-modal-close-default" type="button" uk-close></button>
                <div id="tambah" class="uk-modal-header">
                    <h2 class="uk-modal-title uk-text-center">Tambah Siswa</h2>
                </div>
                <div class="uk-modal-body">
                    <form id="tambahdata" action="tambahdata.php" method="post">
                        <p>Name </p>
                        <input type="text" placeholder="Masukkan Nama Siswa" class="uk-input" name="name" required>
                        <p>No Induk</p>
                        <input type="text" placeholder="Masukkan No Induk Siswa" class="uk-input" name="nis" required>
                        <p>Kelas</p>
                        <select name="kelas" id="" class="uk-input">
                            <option value="">Pilih Kelas</option>
                            <option value="XI RPL 1">XI RPL 1</option>
                            <option value="XI RPL 2">XI RPL 2</option>
                        </select>

                        <p>Telepon</p>
                        <input type="tel" placeholder="89-XXX-XXX-XXX" pattern="[0-9]{2}-[0-9]{3}-[0-9]{3}-[0-9]{3}"
                            class="uk-input" name="telepon" required>
                        <p>Alamat</p>
                        <input type="text" placeholder="Masukkan Alamat Siswa" class="uk-input" name="alamat" required>
                        <div class="uk-modal-footer uk-text-right">
                            <button id="submittambah" class="uk-button uk-button-primary ">Tambah Data</button>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    

    <button class="uk-button uk-button-primary">Kelas</button>
    <div class="uk-inline">
        <button class="uk-button uk-button-default" type="button"><span uk-icon="icon:  triangle-down"></span></button>
        <div uk-dropdown="mode: click; boundary: ! .uk-button-group; boundary-align: true;">

            <ul class="uk-nav uk-dropdown-nav">
            <li><a href="index.php" >Semua Siswa</a></li>
                <li><a href="#" class="listdata" data-kelas="XI RPL 1"> XI Rekayasa Perangkat Lunak 1</a></li>
                <li><a href="#" class="listdata" data-kelas="XI RPL 2">XI Rekayasa Perangkat Lunak 2</a></li>


            </ul>



        </div>
    </div>

    </div>
    <script>
        $(document).ready(function () {
          
            $(".listdata").on("click", function () {
                // action...
                var btn = $(this),
                    kelas = btn.data('kelas');

              
                $("#loadtabel").load("loadtabel.php",{kelas: kelas});

                return false;
            })

// FORM TAMBAH
        var form;
        $('#tambahdata').submit(function(event) {
            if (form) {
                form.abort();
            }

            form = $.ajax({
                url: 'tambahdata.php',
                type: "POST",
                beforeSend: function() {
                    $('#submittambah').html('Loading...');
                },
                data: $('#tambahdata').serialize(),
                // contentType: false,
                cache: false,
                // processData:false
            });

            form.done(function(data) {
                console.log(data);
                // untuk load data\
                if(data== "Berhasil") {
                    $('#submittambah').html('yes...');
                    $("#loadtabel").load("loadtabel.php");
                    UIkit.modal("#modal-sections").hide(); 
                }else{
                    alert ("gagal nambah cuk");
                }
          
            });

            form.always(function () {
                $("#tambahdata").find('input').val("");
                $("#tambahdata").find('select').val("");
                $("#tambahdata").find('textarea').val("");
            });

            event.preventDefault();
        })
            })


    </script>
</body>

</html>