$(function() {
    $('button').click(function(){
        
        var action = $( this ).data( 'action' );
        
        switch(action) {
            case 'user-delete':
                id = $( this ).data( 'id' );

                var url = '/admin/users/delete';
                data = { 'id': id, '_token': window.Laravel.csrfToken };

                callToUrl( url, data );
                break;
            
            case 'review-delete':
                id = $( this ).data( 'id' );

                var url = '/admin/reviews/delete';
                data = { 'id': id, '_token': window.Laravel.csrfToken };

                callToUrl( url, data );
                break;
            
            case 'review-active':
                var item = $( this );
                id = item.data( 'id' );

                var url = '/admin/reviews/active';
                data = { 'id': id, '_token': window.Laravel.csrfToken };

                callToUrlChange( url, data, item );
                break;
            
            case 'content-delete':
                id = $( this ).data( 'id' );

                var url = '/admin/contents/delete';
                data = { 'id': id, '_token': window.Laravel.csrfToken };

                callToUrl( url, data );
                break;
            
            case 'content-active':
                var item = $( this );
                id = item.data( 'id' );

                var url = '/admin/contents/active';
                data = { 'id': id, '_token': window.Laravel.csrfToken };

                callToUrlChange( url, data, item );
                break;
            
            case 'faq-delete':
                id = $( this ).data( 'id' );

                var url = '/admin/faq/delete';
                data = { 'id': id, '_token': window.Laravel.csrfToken };

                callToUrl( url, data );
                break;
            
            case 'faq-active':
                var item = $( this );
                id = item.data( 'id' );

                var url = '/admin/faq/active';
                data = { 'id': id, '_token': window.Laravel.csrfToken };

                callToUrlChange( url, data, item );
                break;
            
            case 'benefit-delete':
                id = $( this ).data( 'id' );

                var url = '/admin/benefits/delete';
                data = { 'id': id, '_token': window.Laravel.csrfToken };

                callToUrl( url, data );
                break;
            
            case 'benefit-active':
                var item = $( this );
                id = item.data( 'id' );

                var url = '/admin/benefits/active';
                data = { 'id': id, '_token': window.Laravel.csrfToken };

                callToUrlChange( url, data, item );
                break;
        default:
           action = '';
    }
    });
    
    $('.admin-tabs a').click(function(){
        var item = $( this );
        var tab_lang = item.attr('rel');
        $('.admin-tabs a.active').removeClass('active');
        item.addClass('active');
        $('.admin-tabs-item').addClass('hide');
        $('#tab_' + tab_lang ).removeClass('hide');
    });
});

function callToUrl( url, data ) {
        
    $.ajax({
        type: "POST",
        url: APP_URL + url,
        data: data,
        success: function() {
            hideTrElement( data.id );
        }
    });
}
function callToUrlChange( url, data, item ) {
        
    $.ajax({
        type: "POST",
        url: APP_URL + url,
        data: data,
        success: function() {
            changeStatus( item );
        }
    });
}

function changeStatus( item ) {
    
    if ( item.hasClass('btn-success') ) {
        item.removeClass('btn-success').addClass('btn-danger');
    } else {
        item.removeClass('btn-danger').addClass('btn-success');
    }
}

function hideTrElement( id ) {
    $( "tr[data-id='" + id + "']" ).hide();
}

