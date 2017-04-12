(function( $ ) {
    wp.customize('header_title', function(value){
        value.bind( function(newval){
            $('#home_id h1').text(newval);
        });
    });

    wp.customize('background_color', function (value){
        value.bind( function(newval) {
        jQuery('.lp-brown').css('background-color', newval);
        });
    });

    wp.customize('description_text', function (value) {
      value.bind( function(newval) {
        jQuery('#description').text(newval);
      });
    });

    wp.customize('header_picture', function (value){
        value.bind( function(newval){
            jQuery('#home_id').css('background-image', 'url(' + newval + ')');
        });
    });

    wp.customize('monday_hours', function (value) {
      value.bind( function(newval) {
        jQuery('#monday_hours_id').text(newval);
      });
    });

    wp.customize('tue_fri_hours', function (value) {
      value.bind( function(newval) {
        jQuery('#tue_fri_hours_id').text(newval);
      });
    });

    wp.customize('sat_sun_hours', function (value) {
      value.bind( function(newval) {
        jQuery('#sat_sun_hours_id').text(newval);
      });
    });

    wp.customize('holidays', function (value) {
      value.bind( function(newval) {
        jQuery('#holidays_id').text(newval);
      });
    });
    
    wp.customize('address', function (value) {
      value.bind( function(newval) {
        jQuery('#address_id').text(newval);
      });
    });

    wp.customize('street', function (value) {
      value.bind( function(newval) {
        jQuery('#street_id').text(newval);
      });
    });

    wp.customize('phone_nr', function (value) {
      value.bind( function(newval) {
        jQuery('#phone_nr_id').text(newval);
      });
    });
    wp.customize('email_addr', function (value) {
      value.bind( function(newval) {
        jQuery('#email_addr_id').text(newval);
      });
    });
}(jQuery))
