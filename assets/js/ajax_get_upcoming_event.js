(function($) {
    $(document).on('click', '.container-element a', function(event){
        console.log("test");
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
        if(event.state.upcoming != null){
            $("#upcoming_event_id").find('.container-element').remove();
            $("#upcoming_event_id").append(event.state.upcoming);
        }
    };
})(jQuery);
