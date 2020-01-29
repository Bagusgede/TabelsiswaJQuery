$(document).ready(function() {
    // Beberapa script jquery

    // Even klik tombol
    $("target").on("click", function() {
        // action...
        return false;
    })

    // Even perubahan data
    $("target").on("change", function() {
        // action...
        return false;
    })

    // $("target") : target berupa element html
    // misal tombolnya <button id="tombol"></button>
    // maka jadinya $("#tombol")
    // misal tombolnya <button class="tombol"></button>
    // maka jadinya $(".tombol")
    // misal tombolnya <button></button>
    // maka jadinya $("button")
    // target bisa pake element, id, atau class

    // Contoh untuk memunculkan alert saat klik tombol

    // HTML : <button id="tombol-alert"></button>
    $("#tombol-alert").on("click", function() {
        alert('Klik tombol alert');
        return false;
    })

    // Dynamic load di element tertentu
    // target akan di load sesuai isinya halaman.php
    $("target").load("halaman.php");

    // Kombinasi klik dan dynamic load
    // HTML : <div id="load-content"></div> <button id="tombol-load"></button>
    $("#tombol-load").on("click", function() {
        $("#load-content").load("content.php");
        return false;
    })
    // <div id="load-content"></div> akan berubah isinya sesuai apa isi dari content.php

    // Klik tombol untuk memunculkan modal UIKit
    // HTML : <button class="button-delete" data-modal="#modal-delete" data-id="..." data-nama="...">Delete</button> <div id="modal-delete">...</div>
    $(".button-delete").on("click", function() {
        var btn       = $(this),
            id        = btn.data('id'),
            nama      = btn.data('nama'),
            modal     = btn.data('modal');

        // Kalau nama mau dimasukan ke input form
        $(modal).find('.nama').val(nama);

        // Kalau nama mau dimasukkan ke text
        $(modal).find('.nama').html(nama);

        // Untuk munculin atau close modal ada di dokumentasi UIKit
        UIkit.modal(modal).show(); 
        return false;
    })

    // AJAX
    $.ajax({
        type: "POST", // type bisa POST, GET, PATCH, DELETE
        url:  'tambah-data.php', // url untuk memproses data
        // data untuk selain form
        data: { nama: 'Budi', alamat: 'sesetan' }, // data yg akan dikirim ke url
        // data untuk form
        data: $('#form').serialize(), // data yg akan dikirim ke url, serialize otomatis ngirim semua element form sesuai name nya
        cache: false,
        beforeSend: function() {
            // fungsi untuk melakukan action sebelum aksi dijalankan, biasanya memunculkan loading
            $('#button').html('Loading...');
        },
        success: function(data) {
            // munculin di console supaya bisa tau output dari url
            console.log(data);
            // data merupakan output dari url
            // aksi setelah ajax sukses
            // misal tampilkan data di element HTML
            $('#load').html(data)
        }
    })

    // implementasi ajax di tombol klik
    $("#button").on("click", function() {
        $.ajax({
            type: "POST", 
            url:  'tambah-data.php', 
            data: { nama: 'Budi', alamat: 'sesetan' }, 
            cache: false,
            beforeSend: function() {
                $('#button').html('Loading...');
            },
            success: function(data) {
                // untuk load data
                $('#load').html(data);
                // untuk refresh halaman
                window.location='index.php';
            }
        })
        return false;
    })

    // implementasi ajax di form
    var form;
    $('#form').submit(function(event) {
        if (form) {
            form.abort();
        }

        form = $.ajax({
            url: 'tambah-data.php',
            type: "POST",
            beforeSend: function() {
                $('#submit').html('Loading...');
            },
            data: $('#form').serialize(),
            contentType: false,
            cache: false,
            processData:false
        });

        form.done(function(data) {
            console.log(data);
            // untuk load data
            $('#load').html(data);
            // untuk refresh halaman
            window.location='index.php';
        });

        form.always(function () {
            $("#form").find('input').prop("disabled", false);
            $("#form").find('select').prop("disabled", false);
            $("#form").find('textarea').prop("disabled", false);
        });

        event.preventDefault();
    })

})