
var offset = $('#offset').val();
$('#id-offset-change option[value="' + offset + '"]').prop("selected", true);

$('#id-offset-change').change(function (event) {
    $('#form-submit').submit();
});

$('.delete-button-list').click(function () {
    var url = $(this).attr('data-url');
    var con = confirm('Do you want to delete?');
    if (con == false) {
        return
    }

    ajaxSendRequest(url, 'get', {},location.reload());
});

$('.checkbox-change-status').change(function () {
    var url = $(this).attr('data-url');
    ajaxSendRequest(url, 'get', {},'');
});

$('.checkbox-change-status').change(function () {
    $(this).parents('tr').toggleClass('list-deactive');
});

$('#checkbox-select-all').change(function () {
    var checked = $(this).attr('data-checked');
    if (checked == 'false') {
        $(this).attr('data-checked', 'true');
        $('.checkbox-table-list').prop('checked', true);
    } else {
        $(this).attr('data-checked', 'false');
        $('.checkbox-table-list').prop('checked', false);
    }
});


$('#setting-active').click(function () {
    var ids = getCheckboxValueInList();
    if (ids == '') {
        alert('At least one checkbox check!');
        return;
    }

    var url = $(this).attr('data-url');
    url = url.replace('tmp_id', ids);
    ajaxSendRequest(url, 'get', {},location.reload());
});

function getCheckboxValueInList() {
    var val = [];
    $('.checkbox-table-list:checked').each(function (i) {
        val[i] = $(this).val();
    });
    return val.join(',');
}

function ajaxSendRequest(url, method, data,message) {
    $.ajax({
        url: url,
        method: method,
        data: data,
        success: function (response) {
            if (response.data == 'success') {
                message;
            }
        },
        error: function (resposse) {

        }
    });
}

$('#setting-deactive').click(function () {
    var ids = getCheckboxValueInList();
    if (ids == '') {
        alert('At least one checkbox check!');
        return;
    }

    var url = $(this).attr('data-url');
    url = url.replace('tmp_id', ids);
    ajaxSendRequest(url, 'get', {},location.reload());
});

$('#setting-delete').click(function () {
    var ids = getCheckboxValueInList();
    if (ids == '') {
        alert('At least one checkbox check!');
        return;
    }

    var con = confirm('Do you want to delete?');
    if (con == false) {
        return
    }

    var url = $(this).attr('data-url');
    url = url.replace('tmp_id', ids);
    ajaxSendRequest(url, 'get', {},location.reload());
});

function loadImagePath(event, obj) {
    var tmpPath = event.target.files[0];
    $(obj).parents('.wrap-image-upload').find('.imageUploadPreview').attr('src', URL.createObjectURL(tmpPath));
}



