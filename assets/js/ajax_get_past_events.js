(function($) {
    var offset = 4;
    jQuery('#past_event_see_more_id').click(function(event) {

        event.preventDefault();
        $.ajax({
            url: ajaxpagination.ajaxurl,
            type: 'post',
            data: {
                action: 'get_past_events',
                offset: offset
            },
            success: function(html) {
                jQuery('#past_event_id').append(html);
                var nItems = (html.match(/div.*class="container-element"/g) || []).length;
                if (nItems < 4) {
                    jQuery('#past_event_see_more_wrapper_id').remove();
                }
                offset += nItems;
            }
        });
    });
})(jQuery);
