$(document).ready(function() {
    $('#preview-button').click(function(e) {
        var $previewDiv = $('#preview-box');
        var date = new Date();

        if($('input[name="author"]').val() && $('input[name="email"]').val() && $('textarea[name="message"]').val()) {
            $previewDiv.hide();
            $previewDiv.empty();

            // Image preview
            var input = $('input[name="image"]')[0];

            if(input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $previewDiv.prepend('<span class="pull-left"><img class="media-object" src="' + e.target.result + '" alt=""></span>');
                }
                reader.readAsDataURL(input.files[0]);
            }                

            $previewDiv.append('<div class="media-body"><h4 class="media-heading"><a href="mailto:' + $('input[name="email"]').val() + '">' + $('input[name="author"]').val() + '</a> <small>' + date.getDate() + '-' + date.getMonth() + '-' +date.getFullYear() + '</small></h4>' + $('textarea[name="message"]').val() + '</div>');
            $previewDiv.show();
        }

        return false;
    });
});