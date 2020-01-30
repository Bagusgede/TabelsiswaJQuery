<!-- MODAL HAPUS NYA -->
<div id="modal-center" class="uk-flex-top" uk-modal>
        <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">

            <button class="uk-modal-close-default" type="button" uk-close></button>

            <h2>Are Youd Sure?</h2>
            <p>Are you sure you want to delete this student data?</p>
            <div class=" uk-text-right">
                <form id="deletesiswa" action="" method="post">
                    <input type="hidden" name="id" value="" class="id">
                    <button class="uk-button uk-button-primary uk-button-small uk-modal-close"
                        style="font-family:'Poppins', sans-serif; border-radius:50px;">Cancel</button>

                    <button id="submitdelete" type="submit" class="uk-button uk-button-danger uk-button-small"
                        style="font-family:'Poppins', sans-serif; border-radius:50px;">Deleted</button>
                </form>
            </div>
        </div>
    </div>

    <!-- PENUTUP MODAL HAPUS NYA -->


<script>
$(document).ready(function () {
    $(".tombol-hapus").on("click", function () {
        var btn = $(this),
            id = btn.data('id'),
            nama = btn.data('nama'),
            modal = btn.data('modal');


        // Kalau nama mau dimasukan ke input form
        $(modal).find('.id').val(id);
 
        // Untuk munculin atau close modal ada di dokumentasi UIKit
        UIkit.modal(modal).show();
        return false;
    })


         // FORM DELETED

                var formdel;
        $('#deletesiswa').submit(function(event) {
            console.log('dasd');
            if (formdel) {
                formdel.abort();
            }

            formdel = $.ajax({
                url: 'deleted.php',
                type: "POST",
                beforeSend: function() {
                    $('#submitdelete').html('Loading...');
                },
                data: $('#deletesiswa').serialize(),
                // contentType: false,
                cache: false,
                // processData:false
            });

            formdel.done(function(data) {
                console.log(data);
                UIkit.modal("#modal-center").hide(); 

                $('body').find('#modal-center').remove();
                // untuk load data\
                if(data== "Berhasil") {
                    $('#submitdelete').html('yes...');
                    window.location='index.php';
                }else{
                    alert ("gagal nambah cuk");
                }
          
            });

            formdel.always(function () {
                $("#deletesiswa").find('input').val("");
                $("#deletesiswa").find('select').val("");
                $("#deletesiswa").find('textarea').val("");
            });

            event.preventDefault();
        })
            })

   
</script>