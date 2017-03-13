$(function() {
    initMap( 'from', 'to' );
    
    $('.input__addon-right').click(function(){
        var from = $('#ride_from').val();
        var from_lat = $('#from_latitude').val();
        var from_lng = $('#from_longitude').val();
        var from_place = $('#from_place').val();
        var to = $('#ride_to').val();
        var to_lat = $('#to_latitude').val();
        var to_lng = $('#to_longitude').val();
        var to_place = $('#to_place').val();
        $('#ride_from').val( to );
        $('#from_latitude').val( to_lat );
        $('#from_longitude').val( to_lng );
        $('#from_place').val( to_place );
        $('#ride_to').val( from );
        $('#to_latitude').val( from_lat );
        $('#to_longitude').val( from_lng );
        $('#to_place').val( from_place );
    });
    
    $( '.datepicker' ).datepicker({ dateFormat: 'yy-mm-dd' });
});

function initMap( r_from, r_to ) {
    
    var from_ride = document.getElementById('ride_' + r_from );
    var to_ride = document.getElementById('ride_' + r_to );
    
    var options = {
        types: ['(cities)']
    };
    
    var from_autocomplete = new google.maps.places.Autocomplete( from_ride, options );
    var to_autocomplete = new google.maps.places.Autocomplete( to_ride, options );
    
    google.maps.event.addListener( from_autocomplete, 'place_changed', function() {
        $('#' + r_from + '_latitude').val( from_autocomplete.getPlace().geometry.location.lat() );
        $('#' + r_from + '_longitude').val( from_autocomplete.getPlace().geometry.location.lng() );
        $('#' + r_from + '_place').val( from_autocomplete.getPlace().place_id );
    });
    google.maps.event.addListener( to_autocomplete, 'place_changed', function() {
        $('#' + r_to + '_latitude').val( to_autocomplete.getPlace().geometry.location.lat() );
        $('#' + r_to + '_longitude').val( to_autocomplete.getPlace().geometry.location.lng() );
        $('#' + r_to + '_place').val( to_autocomplete.getPlace().place_id );
    });
    
    $('#ride_' + r_from ).on('blur', function() {
        setTimeout(function() {
            if (!$('#' + r_from + '_latitude').val() || !$('#' + r_from + '_longitude').val()) {
                resetCoordinatesForInput('ride_' + r_from, r_from + '_latitude', r_from + '_longitude', r_from + '_place');
            }
        }, 200);
    });
    
    $('#ride_' + r_to ).on('blur', function() {
        setTimeout(function() {
            if (!$('#' + r_to + '_latitude').val() || !$('#to_longitude').val()) {
                resetCoordinatesForInput('ride_' + r_to, r_to + '_latitude', r_to + '_longitude', r_to + '_place');
            }
        }, 200);
    });
    
    $('#ride_' + r_from ).on('keyup', function(){
        resetRideData( r_from );
    });
    $('#ride_' + r_to ).on('keyup', function(){
        resetRideData( r_to );
    });
}

function resetRideData( type ) {
    $('#' + type + '_latitude').val('');
    $('#' + type + '_longitude').val('');
    $('#' + type + '_place').val('');
}

function resetCoordinatesForInput( textInputId, latitudeInputId, longitudeInputId, placeIDInputId) {
    var geoCoder = new google.maps.Geocoder();

    geoCoder.geocode( { 'address': $('#'+textInputId).val()}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            $('#' + textInputId).val(results[0].formatted_address);
            $('#' + latitudeInputId).val(results[0].geometry.location.lat());
            $('#' + longitudeInputId).val(results[0].geometry.location.lng());
            $('#' + placeIDInputId).val(results[0].place_id);
        }
    });
}

function rideSearchSubmit( form ) {
    
    var data = $( form ).serialize();
    var errors = validateRide();
    
    if ( errors ) {
        
        return false;
    }
    
    rideLoading( 'ride_container', 'ride_loading');
    
    $.ajax({
        type: "POST",
        url: APP_URL + '/ride/search',
        data: data,
        success: function( response ) {
            $('#ride_container').html( response );
            rideLoading( 'ride_loading', 'ride_container');
        }
    });
    
    return false;
}

function rideLoading( from, to ) {
    
    $('#' + from ).hide();
    $('#' + to ).show();
}

function validateRide() {
    
    $('.invalid').removeClass( 'invalid' );
    
    var errors = 0;
    
    if ( !$( '#ride_from' ).val() && !$( '#ride_to' ).val() ) {
        
        $( '#ride_from' ).addClass( 'invalid' );
        $( '#ride_to' ).addClass( 'invalid' );
        errors++;
    }
    
    if ( !$( '#ride_date' ).val() ) {
        
        $( '#ride_date' ).addClass( 'invalid' );
        errors++;
    }
    
    return errors;
}

function copyToRequest() {
    $('#ride_popup_from').val( $('#ride_from').val() );
    $('#popup_from_latitude').val( $('#from_latitude').val() );
    $('#popup_from_longitude').val( $('#from_longitude').val() );
    $('#popup_from_place').val( $('#from_place').val() );
    
    $('#ride_popup_to').val( $('#ride_to').val() );
    $('#popup_to_latitude').val( $('#to_latitude').val() );
    $('#popup_to_longitude').val( $('#to_longitude').val() );
    $('#popup_to_place').val( $('#to_place').val() );
    
    $('#popup_ride_date').val( $('#ride_date').val() );
    $('#popup_ride_date_to').val( $('#ride_date').val() );
}

function requestFormSubmit( form ) {
    
    var data = $( form ).serialize();
    $('.invalid').removeClass('invalid');
    
    $.ajax({
        type: "POST",
        url: APP_URL + '/requests/submit',
        data: data,
        success: function( response ) {
            
            if ( response.successful == false ) {
                
                for ( key in response.errors ) {
                    
                    $("[name='" + key + "']").addClass('invalid');
                }
            } else {
                
                $( form ).parents('.modal-body').html( response.html );
                $( form ).parents( '.modal-dialog.modal-request-of-a-ride').addClass('modal-successfully-created').removeClass('modal-request-of-a-ride');
            }
        }
    });
}