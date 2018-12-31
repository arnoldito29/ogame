$( ".delete-item" ).click(function() {
    url = $(this).data('url');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax(
        {
            url: url,
            type: 'post',
            dataType: "JSON",
            data: {
                "_method": 'DELETE'
            },
            success: function ()
            {
                location.reload();
            }
        });
});