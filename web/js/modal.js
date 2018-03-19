$(document).ready(function () {
    $('img').on('click', function () {
        var image = $(this).attr('src');
        var name = $(this).attr('name');
        var id = $(this).attr('id');
        var width = $('#' + id).width();
        var image1 = new Image();
        image1.src = image;
         $('#modelContent').attr('src',image);
        $('#filename').html(name);
        $('a.btn.btn-primary').attr('href','../attachment/update?id=' + id);
        $('#model').modal('show');
        $('div.modal-dialog.model-lg').css('width', image1.naturalWidth + 'px');
        
    });
    $('#addAttachment').on('click', function () {
        $('#model1').modal('show');
        $('div.modal-dialog.model-lg').css('width','578px');
        
    });
});


// $(document).ready(function () {
//     $('#addAttachment').on('click', function () {
//         $('#model1').modal('show');
//         $('div.modal-dialog.model-lg').css('width','578px');
//         //$('modal-dialog modal-content').css('width', image1.naturalWidth + 'px');
        
//     });
// });
