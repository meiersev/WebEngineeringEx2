<?php

/* Register customizer object for the opening hours and contacts
 */
function hours_contacts_customize_register($wp_customize) {
	$wp_customize->add_section('hours_section', array(
		'title' => __('Opening Hours'),
		'description' => __('Add the opening hours here'),
		'capabilities' => 'edit_theme_options'
	));

	$wp_customize->add_setting('monday_hours', array(
    'default'    => 'closed',
    'type'       => 'theme_mod',
    'capability' => 'edit_theme_options'
  ));

	$wp_customize->add_control('monday_hours_text', array(
    'settings' => 'monday_hours',
    'label'    => __( 'Monday hours' ),
    'section'  => 'hours_section',
    'type'     => 'text',
	));

	$wp_customize->add_setting('tue_fri_hours', array(
    'default'    => 'closed',
    'type'       => 'theme_mod',
    'capability' => 'edit_theme_options'
	));

	$wp_customize->add_control('tue_fri_hours_text', array(
    'settings' => 'tue_fri_hours',
    'label'    => __( 'Tuesday-Friday hours' ),
    'section'  => 'hours_section',
    'type'     => 'text',
	));

	$wp_customize->add_setting('sat_sun_hours', array(
    'default'    => 'closed',
    'type'       => 'theme_mod',
    'capability' => 'edit_theme_options'
	));

	$wp_customize->add_control('sat_sun_hours_text', array(
		'settings' => 'sat_sun_hours',
		'label'    => __( 'Saturday-Sunday hours' ),
		'section'  => 'hours_section',
		'type'     => 'text',
	));

	$wp_customize->add_setting('holidays', array(
    'default'    => 'closed',
    'type'       => 'theme_mod',
    'capability' => 'edit_theme_options'
	));

	$wp_customize->add_control('holidays_text', array(
    'settings' => 'holidays',
    'label'    => __( 'Holidays' ),
    'section'  => 'hours_section',
    'type'     => 'text',
	));

	$wp_customize->add_section('contacts_section', array(
		'title' => __('Contacts'),
		'description' => __('Put your contact information here'),
		'capabilities' => 'edit_theme_options'
	));

	$wp_customize->add_setting('address', array(
    'default'    => 'Musterstadt',
    'type'       => 'theme_mod',
    'capability' => 'edit_theme_options'
  ));

	$wp_customize->add_control('address_text', array(
    'settings' => 'address',
    'label'    => __( 'Address' ),
    'section'  => 'contacts_section',
    'type'     => 'text',
	));

	$wp_customize->add_setting('street', array(
    'default'    => 'Musterstrasse 123',
    'type'       => 'theme_mod',
    'capability' => 'edit_theme_options'
	));

	$wp_customize->add_control('street_text', array(
    'settings' => 'street',
    'label'    => __( 'Street' ),
    'section'  => 'contacts_section',
    'type'     => 'text',
	));

	$wp_customize->add_setting('phone_nr', array(
    'default'    => '012 345 67 89',
    'type'       => 'theme_mod',
    'capability' => 'edit_theme_options'
	));

	$wp_customize->add_control('phone_nr_text', array(
		'settings' => 'phone_nr',
		'label'    => __( 'Phone Number' ),
		'section'  => 'contacts_section',
		'type'     => 'text',
	));

	$wp_customize->add_setting('email_addr', array(
    'default'    => 'your@mail.here',
    'type'       => 'theme_mod',
    'capability' => 'edit_theme_options'
	));

	$wp_customize->add_control('email_addr_text', array(
    'settings' => 'email_addr',
    'label'    => __( 'E-Mail Address' ),
    'section'  => 'contacts_section',
    'type'     => 'text',
	));

}
add_action('customize_register', 'hours_contacts_customize_register');

function website_title_customize_register($wp_customize){
    $wp_customize->add_section('header_section', array(
        'title'       => __('Header'),
        'description' => __('You can change the header  here'),
    ));

    $wp_customize->add_setting('header_title', array(
        'default'   => 'LaPlace - Zurich',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_setting('header_picture', array(
        'default' => get_template_directory_uri().'/assets/images/header.jpg',
    ));

    $wp_customize->add_setting('background-color',array(
        'default' => '#443333',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize,
        'background-color',
        array(
            'label'     => __('background-color', fancyrestaurant),
            'section'   => 'header_section',
            'setting'   => 'background_color',
        )
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control(
        $wp_customize, 'header_picture', array(
            'label'     =>  __('Upload your header picture','mytheme'),
            'section'   => 'header_section',
            'settings'  => 'header_picture',
        )
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'header_title',
        array(
            'label' => __('What is your title name', 'fancyrestaurant'),
            'section' => 'header_section',
            'settings'=> 'header_title',
        )
    ));
}
add_action('customize_register','website_title_customize_register');

function fancyrestaurant_color_css(){
?>
    <style type="text/css">
        .lp-brown{
            background-color: <?php echo get_theme_mod('background-color')?>;
    }
    </style>
<?php
}
add_action('wp_head', 'fancyrestaurant_color_css');

function fancyrestaurant_custom_css(){
?>
    <style type="text/css">
        #home_id{
            background-image: url(<?php echo get_theme_mod('header_picture');?>);}
    </style>
<?php
}
add_action('wp_head', 'fancyrestaurant_custom_css');

function fancyrestaurant_costumizer_life_preview(){
    wp_enqueue_script(
        'fancyrestaurant_customizer',
        get_template_directory_uri().'/assets/js/fancy_customizer.js',
        array('jquery', 'customize_preview'),
        '',
        true
    );
}
add_action('customize_preview_init', 'fancyrestaurant_costumizer_life_preview');

?>
