$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function removeRow(id, url)
{
    if(confirm('Bạn có muốn xóa vĩnh viễn không?')){
        $.ajax({
            type: 'DELETE',
            datatype: 'JSON',
            data: { id },
            url: url,
            success : function(result){
                if(result.error === false){
                    alert(result.message);
                    location.reload();
                } else{
                    alert('Xoá lỗi vui lòng thử lại');
                }
            }
        })
    }
}

// uploadFile
$('#upload').change(function() {
    const form = new FormData();
    form.append('file', $(this)[0].files[0]);

    $.ajax({
        processData: false,
        contentType: false,
        type: 'POST',
        dataType: 'JSON',
        data: form,
        url: '/admin/upload/services',
        success: function (result) {
            if (result.error === false) {
                $('#img_show').html('<a href="'+ result.url +'" target="_blank"><img src="'+ result.url +'" style="width: 100px"></a>')
                $('#hinhanh').val(result.url)
            }
            else {
                alert('Upload file lỗi')
            }
        }
    })
});

// uploadFile Đăng kí
$('#upload1').change(function() {
    const form = new FormData();
    form.append('file', $(this)[0].files[0]);

    $.ajax({
        processData: false,
        contentType: false,
        type: 'POST',
        dataType: 'JSON',
        data: form,
        url: '/upload/services',
        success: function (result) {
            if (result.error === false) {
                $('#img_show').html('<a href="'+ result.url +'" target="_blank"><img src="'+ result.url +'" style="width:100px; border-radius: 50%; margin: 10px;"></a>')
                $('#hinhanh').val(result.url)
            }
            else {
                alert('Upload file lỗi')
            }
        }
    })
});