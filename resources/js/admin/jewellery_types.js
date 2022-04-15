$('.type-status-switcher').on('change', function() {
    let status = $(this).is(':checked') ? 1 : 0,
        id = $(this).data('id');
        
    $.ajax({
        type: "GET",
        url: `/admin/set_jewellery_type_status/${id}`,
        cache: false,
        dataType: 'json',
        data: {'status' : status},
    });
})