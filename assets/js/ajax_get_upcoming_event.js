(function($) {
    jQuery('.container-element a').click( function(event){ 
    /*$(document).on('click', '.container-element a', function( event ){*/
        event.preventDefault();
        var offset = $(this).attr("class");
        console.log(offset);
        $.ajax({
            url: ajaxpagination.ajaxurl,
            type: 'post',
            data: {
                action: 'get_upcoming_event',
                offset: offset,
            },
            success: function(result){
                $("#upcoming_event_id").find('.container-element').remove();
                $("#upcoming_event_id").append(result);
            }
        });
    });
})(jQuery);
