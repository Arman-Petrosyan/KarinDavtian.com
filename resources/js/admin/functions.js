export function uploadedImagePreview(imageUploadBlock)
{
    const imageInput = imageUploadBlock.find('.image-upload-input'),
          infoArea = imageUploadBlock.find('.upload-label'),
          previewBlock = imageUploadBlock.find('.image-area');

    if(imageInput[0].files && imageInput[0].files[0]) {
        var reader = new FileReader(),
            fileName = imageInput[0].files[0].name;

        reader.onload = function (e) {
            previewBlock.css({'display' : 'block', 'background-image' : 'url(' + e.target.result + ')'});
        };
        reader.readAsDataURL(imageInput[0].files[0]);

        infoArea.textContent = 'File name: ' + fileName;
        infoArea.html(fileName);
    } else {
        previewBlock.css({'display' : 'none'});
    }
}

export function deleteData(id, target, parent)
{
    console.log(id, target, parent);
    $.ajax({
        type: "DELETE",
        url: `/admin/${target}/${id}`,
        cache: false,
        dataType: 'json',
        success: function (data) {
            let colorClass = data.success == 1 ? 'alert-success' : 'alert-danger',
                notifications = $(`<div class="alert ${colorClass} mb-5" role="alert">
                                    ${data.msg}
                                </div>`);

            $('#delete-modal').modal('hide');

                
            if(data.action === 1)
                notifications.insertBefore(parent);

            if(data.action === 2)
                $('#app').prepend(notifications);

            if(data.success == 1)
                parent.remove();

            setTimeout(function() {
                notifications.remove();
            }, 3000);
        }
    });
}