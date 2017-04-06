(function( $ ){
    wp.customize('header_title', function(value){
        value.bind( function(newval){
            $('#home_id h1').text(newval);
        });
    });
})(jQuery)
