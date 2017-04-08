(function( $ ) {
    wp.customize('header_title', function(value){
        value.bind( function(newval){
            $('#home_id h1').text(newval);
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
