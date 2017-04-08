<?php
/**
 * Fancy Restaurant functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Fancy_Restaurant
 * @since 1.0
 */

/**
 * Fancy Restaurant only works in WordPress 4.7 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}

/* A custom template tag I created for our sections*/
function the_section_id() {
	$css_id = get_post_meta( get_the_ID(), 'css_id', true );
	if (! $css_id) {
		// Maybe we are lucky and the name corresponds to the id
		$css_id = strtolower(the_title(NULL, NULL, false)) . '_id';
		$css_id = str_replace(" ", "_", $css_id);
	}
	echo $css_id;
}
/* Another custom template tag I created for our sections,
 * currently only used to add the parallex tag
 */
function the_section_class() {
	$css_id = get_post_meta( get_the_ID(), 'css_class', true );
	echo $css_id;
}

require_once('customizer_settings.php');
require_once('ajax_handling.php');

/* Custom post type event
*/
if(!function_exists('create_event_post_type')):
	function create_event_post_type() {
		$labels = array(
			'name'          => __('Events'),
			'singular_name' => __('Event')
		);
		$args=array(
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'show_in_nav_menus' => true,
			'query_var' => true,
			'rewrite' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'supports' => array(
				'thumbnail'
			),
			'menu_position' => 5,
			'register_meta_box_cb' => 'add_event_post_type_metabox'
		);
		register_post_type('event', $args);
	}
	add_action('init','create_event_post_type');

	function add_event_post_type_metabox(){
		add_meta_box('event_metabox','Event Data','event_metabox','event','normal');
	}

	function event_metabox(){
		global $post;
		$custom = get_post_custom($post->ID);
		$ename = $custom['event_ename'][0];
		$office = $custom['event_start'][0];
		$email = $custom['event_end'][0];
	  $description = $custom['event_description'][0];
		?>
		<div class="person">
			<p><label>Event Title<br><input type="text" name="ename" size="50"
				value="<?php echo $ename;?>"></label>
			</p>
			<p><label>Start date<br><input type="datetime-local" name="start-date" size="50"
				value="<?php echo $office;?>"></label>
			</p>
			<p> <label>End date<br><input type="datetime-local" name="end-date" size="50"
				value="<?php echo $email;?>"></label>
			</p>
			<p> <label>Description<br><textarea rows="8" cols="60" name="description"
				><?php echo $description?></textarea></label>
			</p>
		</div>
	<?php
	}

	function event_post_save_meta($post_id, $post){
		// is the user allowed to edit the post or page?
		if(!current_user_can('edit_post', $post->ID )){
			return $post->ID;
		}
		$event_post_meta['event_ename'] = $_POST['ename'];
		$event_post_meta['event_start'] = $_POST['start-date'];
		$event_post_meta['event_end'] = $_POST['end-date'];
		$event_post_meta['event_description'] = $_POST['description'];
		// add values as custom fields
		foreach($event_post_meta as $key => $value){
			if(get_post_meta($post->ID, $key, false)){
				// if the custom field already has a value
				update_post_meta($post->ID, $key, $value);
			}else{
				// if the custom field doesn't have a value
				add_post_meta($post->ID, $key, $value);
			}
			if(!$value){
				// delete if blank
				delete_post_meta($post->ID, $key);
			}
		}
		// Remove the save_post action for the call to wp_update_post, to avoid
		// looping on it.
		remove_action('save_post', 'event_post_save_meta', 1, 2);
		wp_update_post(array(
			'ID'         => $post_id,
			'post_title' => get_post_meta( $post_id, 'event_ename', true )
		));
		add_action('save_post','event_post_save_meta',1,2);
  }
	add_action('save_post','event_post_save_meta',1,2);

  // Add start and end as columns to list of events
	function event_custom_columns($columns) {
		$columns['event_start'] = 'Start Date';
		$columns['event_end'] = 'End Date';
		return $columns;
	}
	add_filter('manage_edit-event_columns', 'event_custom_columns');
	add_filter('manage_edit-event_sortable_columns', 'event_custom_columns');

	function event_column( $colname, $cptid ) {
		if ( $colname == 'event_start')
		  echo get_post_meta( $cptid, 'event_start', true );
		elseif ($colname == 'event_end') {
			echo get_post_meta($cptid, 'event_end', true);
		}
	}
	add_action('manage_event_posts_custom_column', 'event_column', 10, 2);
	function sort_date( $vars ) {
		if( array_key_exists('orderby', $vars )) {
			if('Start Date' == $vars['orderby']) {
				$vars['orderby'] = 'event_start';
				$vars['meta_key'] = 'event_start';
			} elseif ('End Date' == $vars['orderby']) {
				$vars['orderby'] = 'event_end';
				$vars['meta_key'] = 'event_end';
			}
		}
		return $vars;
	}
	add_filter('request', 'sort_date');
endif;

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function fancyrestaurant_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/fancyrestaurant
	 * If you're building a theme based on Fancy Restaurant, use a find and replace
	 * to change 'fancyrestaurant' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'fancyrestaurant' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'fancyrestaurant-featured-image', 2000, 1200, true );

	add_image_size( 'fancyrestaurant-thumbnail-avatar', 100, 100, true );

	// Set the default content width.
	$GLOBALS['content_width'] = 525;

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'top'    => __( 'Top Menu', 'fancyrestaurant' ),
		'social' => __( 'Social Links Menu', 'fancyrestaurant' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'audio',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style( array( 'assets/css/editor-style.css', fancyrestaurant_fonts_url() ) );

	// Define and register starter content to showcase the theme on new sites.
	$starter_content = array(
		'widgets' => array(
			// Place three core-defined widgets in the sidebar area.
			'sidebar-1' => array(
				'text_business_info',
				'search',
				'text_about',
			),

			// Add the core-defined business info widget to the footer 1 area.
			'sidebar-2' => array(
				'text_business_info',
			),

			// Put two core-defined widgets in the footer 2 area.
			'sidebar-3' => array(
				'text_about',
				'search',
			),
		),

		// Specify the core-defined pages to create and add custom thumbnails to some of them.
		'posts' => array(
			'home',
			'about' => array(
				'thumbnail' => '{{image-sandwich}}',
			),
			'contact' => array(
				'thumbnail' => '{{image-espresso}}',
			),
			'blog' => array(
				'thumbnail' => '{{image-coffee}}',
			),
			'homepage-section' => array(
				'thumbnail' => '{{image-espresso}}',
			),
		),

		// Create the custom image attachments used as post thumbnails for pages.
		'attachments' => array(
			'image-espresso' => array(
				'post_title' => _x( 'Espresso', 'Theme starter content', 'fancyrestaurant' ),
				'file' => 'assets/images/espresso.jpg', // URL relative to the template directory.
			),
			'image-sandwich' => array(
				'post_title' => _x( 'Sandwich', 'Theme starter content', 'fancyrestaurant' ),
				'file' => 'assets/images/sandwich.jpg',
			),
			'image-coffee' => array(
				'post_title' => _x( 'Coffee', 'Theme starter content', 'fancyrestaurant' ),
				'file' => 'assets/images/coffee.jpg',
			),
		),

		// Default to a static front page and assign the front and posts pages.
		'options' => array(
			'show_on_front' => 'page',
			'page_on_front' => '{{home}}',
			'page_for_posts' => '{{blog}}',
		),

		// Set the front page section theme mods to the IDs of the core-registered pages.
		'theme_mods' => array(
			'panel_1' => '{{homepage-section}}',
			'panel_2' => '{{about}}',
			'panel_3' => '{{blog}}',
			'panel_4' => '{{contact}}',
		),

		// Set up nav menus for each of the two areas registered in the theme.
		'nav_menus' => array(
			// Assign a menu to the "top" location.
			'top' => array(
				'name' => __( 'Top Menu', 'fancyrestaurant' ),
				'items' => array(
					'link_home', // Note that the core "home" page is actually a link in case a static front page is not used.
					'page_about',
					'page_blog',
					'page_contact',
				),
			),

			// Assign a menu to the "social" location.
			'social' => array(
				'name' => __( 'Social Links Menu', 'fancyrestaurant' ),
				'items' => array(
					'link_yelp',
					'link_facebook',
					'link_twitter',
					'link_instagram',
					'link_email',
				),
			),
		),
	);

	/**
	 * Filters Fancy Restaurant array of starter content.
	 *
	 * @since Fancy Restaurant 1.1
	 *
	 * @param array $starter_content Array of starter content.
	 */
	$starter_content = apply_filters( 'fancyrestaurant_starter_content', $starter_content );

	add_theme_support( 'starter-content', $starter_content );
}
add_action( 'after_setup_theme', 'fancyrestaurant_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function fancyrestaurant_content_width() {

	$content_width = $GLOBALS['content_width'];

	// Get layout.
	$page_layout = get_theme_mod( 'page_layout' );

	// Check if layout is one column.
	if ( 'one-column' === $page_layout ) {
		if ( fancyrestaurant_is_frontpage() ) {
			$content_width = 644;
		} elseif ( is_page() ) {
			$content_width = 740;
		}
	}

	// Check if is single post and there is no sidebar.
	if ( is_single() && ! is_active_sidebar( 'sidebar-1' ) ) {
		$content_width = 740;
	}

	/**
	 * Filter Fancy Restaurant content width of the theme.
	 *
	 * @since Fancy Restaurant 1.0
	 *
	 * @param $content_width integer
	 */
	$GLOBALS['content_width'] = apply_filters( 'fancyrestaurant_content_width', $content_width );
}
add_action( 'template_redirect', 'fancyrestaurant_content_width', 0 );

/**
 * Register custom fonts.
 */
function fancyrestaurant_fonts_url() {
	$fonts_url = '';

	/**
	 * Translators: If there are characters in your language that are not
	 * supported by Libre Franklin, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$libre_franklin = _x( 'on', 'Libre Franklin font: on or off', 'fancyrestaurant' );

	if ( 'off' !== $libre_franklin ) {
		$font_families = array();

		$font_families[] = 'Libre Franklin:300,300i,400,400i,600,600i,800,800i';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

/**
 * Add preconnect for Google Fonts.
 *
 * @since Fancy Restaurant 1.0
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function fancyrestaurant_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'fancyrestaurant-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'fancyrestaurant_resource_hints', 10, 2 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function fancyrestaurant_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'fancyrestaurant' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'fancyrestaurant' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'fancyrestaurant' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'fancyrestaurant' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'fancyrestaurant' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'fancyrestaurant' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'fancyrestaurant_widgets_init' );

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 *
 * @since Fancy Restaurant 1.0
 *
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function fancyrestaurant_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}

	$link = sprintf( '<p class="link-more"><a href="%1$s" class="more-link">%2$s</a></p>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'fancyrestaurant' ), get_the_title( get_the_ID() ) )
	);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'fancyrestaurant_excerpt_more' );

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Fancy Restaurant 1.0
 */
function fancyrestaurant_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'fancyrestaurant_javascript_detection', 0 );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function fancyrestaurant_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
	}
}
add_action( 'wp_head', 'fancyrestaurant_pingback_header' );

/**
 * Display custom color CSS.
 */
function fancyrestaurant_colors_css_wrap() {
	if ( 'custom' !== get_theme_mod( 'colorscheme' ) && ! is_customize_preview() ) {
		return;
	}

	require_once( get_parent_theme_file_path( '/inc/color-patterns.php' ) );
	$hue = absint( get_theme_mod( 'colorscheme_hue', 250 ) );
?>
	<style type="text/css" id="custom-theme-colors" <?php if ( is_customize_preview() ) { echo 'data-hue="' . $hue . '"'; } ?>>
		<?php echo fancyrestaurant_custom_colors_css(); ?>
	</style>
<?php }
add_action( 'wp_head', 'fancyrestaurant_colors_css_wrap' );

/**
 * Enqueue scripts and styles.
 */
function fancyrestaurant_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'fancyrestaurant-fonts', fancyrestaurant_fonts_url(), array(), null );

	// Theme stylesheet.
	wp_enqueue_style( 'fancyrestaurant-style', get_stylesheet_uri() );

	// Load the dark colorscheme.
	if ( 'dark' === get_theme_mod( 'colorscheme', 'light' ) || is_customize_preview() ) {
		wp_enqueue_style( 'fancyrestaurant-colors-dark', get_theme_file_uri( '/assets/css/colors-dark.css' ), array( 'fancyrestaurant-style' ), NULL );
	}
	$fancyrestaurant_l10n = array(
		'quote'          => fancyrestaurant_get_svg( array( 'icon' => 'quote-right' ) ),
	);

	wp_enqueue_script( 'fancyrestaurant-main-script', get_theme_file_uri( '/assets/js/script.js' ), array( 'jquery' ), NULL, false );

	wp_enqueue_script('ajax_past_event_script', get_theme_file_uri('/assets/js/ajax_get_past_events.js'), array('jquery'), NULL, true);
	wp_localize_script('ajax_past_event_script', 'ajaxpagination', array(
		'ajaxurl' => admin_url('admin-ajax.php')
	));
}
add_action( 'wp_enqueue_scripts', 'fancyrestaurant_scripts' );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images.
 *
 * @since Fancy Restaurant 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function fancyrestaurant_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	if ( 740 <= $width ) {
		$sizes = '(max-width: 706px) 89vw, (max-width: 767px) 82vw, 740px';
	}

	if ( is_active_sidebar( 'sidebar-1' ) || is_archive() || is_search() || is_home() || is_page() ) {
		if ( ! ( is_page() && 'one-column' === get_theme_mod( 'page_options' ) ) && 767 <= $width ) {
			 $sizes = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
		}
	}

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'fancyrestaurant_content_image_sizes_attr', 10, 2 );

/**
 * Filter the `sizes` value in the header image markup.
 *
 * @since Fancy Restaurant 1.0
 *
 * @param string $html   The HTML image tag markup being filtered.
 * @param object $header The custom header object returned by 'get_custom_header()'.
 * @param array  $attr   Array of the attributes for the image tag.
 * @return string The filtered header image HTML.
 */
function fancyrestaurant_header_image_tag( $html, $header, $attr ) {
	if ( isset( $attr['sizes'] ) ) {
		$html = str_replace( $attr['sizes'], '100vw', $html );
	}
	return $html;
}
add_filter( 'get_header_image_tag', 'fancyrestaurant_header_image_tag', 10, 3 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails.
 *
 * @since Fancy Restaurant 1.0
 *
 * @param array $attr       Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size       Registered image size or flat array of height and width dimensions.
 * @return string A source size value for use in a post thumbnail 'sizes' attribute.
 */
function fancyrestaurant_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( is_archive() || is_search() || is_home() ) {
		$attr['sizes'] = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
	} else {
		$attr['sizes'] = '100vw';
	}

	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'fancyrestaurant_post_thumbnail_sizes_attr', 10, 3 );

/**
 * Use front-page.php when Front page displays is set to a static page.
 *
 * @since Fancy Restaurant 1.0
 *
 * @param string $template front-page.php.
 *
 * @return string The template to be used: blank if is_home() is true (defaults to index.php), else $template.
 */
function fancyrestaurant_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template',  'fancyrestaurant_front_page_template' );

/**
 * Implement the Custom Header feature.
 */
require get_parent_theme_file_path( '/inc/custom-header.php' );

/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path( '/inc/template-tags.php' );

/**
 * Additional features to allow styling of the templates.
 */
require get_parent_theme_file_path( '/inc/template-functions.php' );

/**
 * Customizer additions.
 */
require get_parent_theme_file_path( '/inc/customizer.php' );

/**
 * SVG icons functions and filters.
 */
require get_parent_theme_file_path( '/inc/icon-functions.php' );
