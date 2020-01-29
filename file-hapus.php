<!-- MODAL HAPUS NYA -->
<div id="modal-center" class="uk-flex-top" uk-modal>
        <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">

            <button class="uk-modal-close-default" type="button" uk-close></button>

            <h2>Are Youd Sure?</h2>
            <p>Are you sure you want to delete this student data?</p>
            <div class=" uk-text-right">
                <form action="deleted.php" method="post">
                    <input type="hidden" name="id" value="" class="id">
                    <button class="uk-button uk-button-primary uk-button-small uk-modal-close"
                        style="font-family:'Poppins', sans-serif; border-radius:50px;">Cancel</button>

                    <button type="submit" class="uk-button uk-button-danger uk-button-small"
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
})
</script>