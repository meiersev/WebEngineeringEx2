(function($) {
    jQuery('.container-element a').click( function(event){ 
        event.preventDefault();
        var offset = $(this).attr("class");
        $.ajax({
            url: ajaxpagination.ajaxurl,
            type: 'post',
            data: {
                action: 'get_upcoming_event',
                offset: offset,
            },
            success: function(result){
                var stateobj = {upcoming: $("#upcoming_event_id").html() };
                window.history.pushState(stateobj, "", "#upcoming");

                $("#upcoming_event_id").find('.container-element').remove();
                $("#upcoming_event_id").append(result);

                stateobj = {upcoming: $("#upcoming_event_id").html() };
                window.history.pushState(stateobj, "", "#upcoming");


            }
        });
    });

    window.onpopstate = function(event){
        var stateobj = {upcoming: $("#upcoming_event_id").html() };
        window.history.pushState(stateobj, "", "#upcoming");

        $("#upcoming_event_id").find('.container-element').remove();
        $("#upcoming_event_id").append(event.state.upcoming);
    };
})(jQuery);
