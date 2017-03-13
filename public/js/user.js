$(function() {
    $('.faq_item').click(function(){
        var item = $( this ).attr( 'rel' );
        $('#faq_' + item ).toggleClass( 'hide' );
    });
});

function submitLogin( form ) {
    
    var data = $( form ).serialize();
    $('.input__error').hide();
    
    $.ajax({
        type: "POST",
        url: APP_URL + '/user/login',
        data: data,
        success: function( response ) {
            
            if ( response.error == true ) {
                
                for ( key in response.data ) {
                    
                    $('#login_' + key ).parent().find('.input__error').show();
                    $('#login_' + key ).parent().find('.input__error-msg').html( response.data[ key ] );
                }
            } else {
                
                location.reload();
            }
        }
    });
}


function submitRegister( form ) {
    
    var data = $( form ).serialize();
    $('.input__error').hide();
    
    $.ajax({
        type: "POST",
        url: APP_URL + '/user/register',
        data: data,
        success: function( response ) {
            
            if ( response.error == true ) {
                
                for ( key in response.data ) {
                    
                    $('#register_' + key ).parent().find('.input__error').show();
                    $('#register_' + key ).parent().find('.input__error-msg').html( response.data[ key ] );
                }
            } else {
                
                location.reload();
            }
        }
    });
}