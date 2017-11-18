
$('.checkbox-change-role').change(function () {
    var url = $(this).attr('data-url');
    ajaxSendRequest(url, 'get', {},'');
});