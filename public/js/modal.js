$("#myModal").on("show.bs.modal", function(e) {
    var link = $(e.relatedTarget);
    $(this).find(".modal-body").load(link.attr("href"));
});

$("#modalRequest-of-a-ride").on("show.bs.modal", function(e) {
    
    var link = $(e.relatedTarget);
    $(this).find(".modal-body").load( link.data('href'), function(){
        
        initMap( 'popup_from', 'popup_to' );
        copyToRequest();
    });
});