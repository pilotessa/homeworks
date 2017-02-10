$(function () {
    $('.panel-collapse').on('show.bs.collapse', function () {
        $(this).prev().addClass('dropup');
    });
    $('.panel-collapse').on('hide.bs.collapse', function () {
        $(this).prev().removeClass('dropup');
    });
});