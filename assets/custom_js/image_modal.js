function setImage(id) {
    var getImage = $("#image-detail-"+id).attr('src');
    $("#project-image-modal").removeAttr('src').attr('src', getImage);
    $('#image-slide-modal').modal('show');
}
// $(document).ready(function() {
//     $('#image-slide-modal').on('shown.bs.modal', function (e) {
//         var img = $('#image-slide-modal').attr('data-image-list');
//         console.log(img);
//       })
// });