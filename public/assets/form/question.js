$(document).ready(function() {
    // var a = 0;
    $("#add_question").click(function () {
        var jumlah = parseInt($("#jumlah-form").val()); // Ambil jumlah data form pada textbox jumlah-form
        var b = jumlah + 1; // Tambah 1 untuk jumlah form nya
        var question_id = $('#question_id').val();

        $("#question_form").append(
            '<div id="data_inventaris_append" class="mt-3 rounded">'+
            ' <div class="form-group row">' +
            ' <label for="answer_options" class="col-sm-2 col-form-label">Answer Options :</label>' +
            ' <div class="col-sm-3">' +
            ' <div class="input-group mb-3">' +
            ' <div class="input-group-prepend">' +
            ' <label class="input-group-text" for="Options">Options</label>' +
            ' </div>' +
            ' <select class="custom-select" id="Options" name="question['+b+'][answer_option]">' +
            ' <option selected>Choose...</option>\n' +
            ' <option value="A">A</option>' +
            ' <option value="B">B</option>' +
            ' <option value="C">C</option>' +
            ' <option value="D">D</option>' +
            ' <option value="E">E</option>' +
            ' </select>' +
            ' </div>' +
            ' </div>' +
            ' <div class="col-sm-5">' +
            ' <input type="text" class="form-control" name="question['+b+'][answer]"> ' +
            ' <input type="hidden" class="form-control"  name="question['+b+'][question_id]" ' +
            '  value="'+question_id+'"></div>'+
            ' <div class="col-sm-2">' +
            ' <button type="button" class="btn btn-danger" id="remove-data-inventaris">-</button>' +
            '</div>' +
            '</div>'+
            '</div>');

        $("#jumlah-form").val(b); // Ubah value textbox jumlah-form dengan
        // variabel nextfor
    });
    $(document).on('click', '#remove-data-inventaris', function () {
        $(this).parents('#data_inventaris_append').remove();
    });

    $("#btn-reset-form").click(function(){
        $("#question_form").html(""); // Kita kosongkan isi dari div
        // insert-form
        $("#jumlah-form").val("0"); // Ubah kembali value jumlah form menjadi 1
    });
});


