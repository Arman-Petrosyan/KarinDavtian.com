import { find } from 'lodash';
import {uploadedImagePreview} from './functions.js';
import {deleteData} from './functions.js';

$(document).on('change', '.image-upload-input', function() {
    uploadedImagePreview($(this).parent().parent());
});

$(document).on('click', '.remove-image-from-input', function() {
    const $this = $(this);

    $this.parent().css({'display' : 'none', 'background-image' : ''});
    $this.parent().parent().find('.image-upload-input').val('');
    $this.parent().parent().find('.upload-label').html('Choose image');
});

$(document).on('click', '.add-new-image-block', function() {
    $('.image-item-block').first()
                          .clone()
                          .find('.image-input-wrapper')
                          .css({'border' : 'none'})
                          .end()
                          .find("input:file")
                          .val("")
                          .end()
                          .find('.is-main-input')
                          .val(0)
                          .end()
                          .find('.form-check-input')
                          .prop('checked', false)
                          .end()
                          .find('.upload-label')
                          .html('Choose image')
                          .end()
                          .find('.image-area')
                          .css({'display' : 'none', 'background-image' : 'none'})
                          .end()
                          .insertAfter($('.image-item-block').last())
                          .last()
                          .find('.add-new-image-block')
                          .html("<i class='fas fa-minus-circle text-danger'></i>")
                          .addClass('remove-this-image-block')
                          .removeClass('add-new-image-block')
                          .end()
});

$(document).on('click', '.remove-this-image-block', function() {
    $(this).parent().remove();
});

$(document).on('change', '.is-main', function() {
    if($(this).is(':checked')) {
        $('.is-main').prop('checked', false);
        $(this).prop('checked', true);
        $('.is-main-input').val(0);
        $(this).parent().find('.is-main-input').val(1)
    } else {
        $(this).parent().find('.is-main-input').val(0)
    }
});

$(document).on('click', '.is-main-label', function() {
    $(this).parent().find('.is-main').click();

});

$('#save').on('click', function() {
    let flag = 0,
        isAbout = $('#is-about').length;
    $('.image-upload-input').each(function() {
        if(!$(this).val().length && !isAbout) {
            flag = 1;
            $(this).parent().css({'border' : '2px solid red'})
        } else {
            $(this).parent().css({'border' : 'none'})
        }
    });

    console.log(flag);
    return !flag ? $('#action-form').submit() : false;
});

$(document).on('click', '.delete-image', function() {
    let id = $(this).data('id'),
        title = $(this).data('title');

    $('#item-title').html(title);
    $('#delete-confirm-button').data('id', id);
    $('#delete-modal').modal('show');
});

$('#delete-confirm-button').on('click', function() {
    let id = $(this).data('id'),
        parent = $(`#item-${id}`),
        target = parent.find('.delete-item').data('table');

    console.log(id)
    console.log(parent)
    console.log(target)
    id && parent && target ? deleteData(id, target, parent) : console.log('Something went wrong: Undefined ID or Parent or target');
        
});

$(document).on('click', '.delete-product', function() {
    let id = $(this).data('id'),
        title = $(this).data('title');

    $('#item-title').html(title);
    $('#delete-confirm-button').data('id', id);
    $('#delete-modal').modal('show');
})