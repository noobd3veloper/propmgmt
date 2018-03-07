$(document).ready(function () {
    $('img').on('click', function () {
        var image = $(this).attr('src');
        var name = $(this).attr('name');
        var id = $(this).attr('id');
        var width = $('#' + id).width();
        $('#modelContent').attr('src',image);
        $('#filename').html(name);
        $('.modal').modal('show');
        $('div.modal-dialog.model-lg').css('width', (width * .9) + 'px');
    });
});
