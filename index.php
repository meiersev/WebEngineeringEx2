
<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header();
get_template_part( 'nav' );
 ?>


<a class="anchor" id="home"></a>
<header id="home_id" >
    <h1> <?php echo get_theme_mod('header_title', 'LaPlace - Zurich');?> </h1>
    <a href="#book" class="lp-button hover-dark-gray" >Book a Table</a>
	<p id="description"> 
		<?php echo get_theme_mod('description_text', 'This is a description');?>
	</p>
</header>
<!-- First About-->

<a class="anchor" id="about"></a>

<?php
	// Display the first 3 pages
	$args = array(
	  'post_type' => 'page',
	  'meta_key'   => 'position',
	  'orderby' => 'meta_value_num',
	  'order' => 'ASC',
	  'meta_query' => array(
			array(
				'key'     => 'position',
				'value'   => array( 0, 1, 2 ),
				'compare' => 'IN',
			),
		),
	);
	$page_query = new WP_Query( $args );
	while ( $page_query->have_posts() ) : $page_query->the_post();
		get_template_part( 'page_content' );
	endwhile;
?>

<!-- Start Menu -->

<a class="anchor" id="menu"></a>
<section id="menu_id" class="lp-brown">
    <div class="menu-table">
        <div class="menu-row">
            <div id="menu_description_id" class="menu-cell">
                <h3>Our Menu</h3>
                <h2 id="appetizers_id">Appetizers</h2>
                <p id="appetizers_id">We serve a seasonal tasting menu that focuses on local ingredients. Our appetizers may vary during the year to always ensure the best quality. For the appetizers, we are famous for our bruschettas that we serve in several different variants.</p>

				<h2 id="fresh_pasta_id">Fresh Pasta</h2>
                <p id="fresh_pasta_id">Our pasta is more than just a side dish. Pasta is love, pasta is life. Because of your love twoards pasts, the LaPlace restaurant is also known to be a very popular place for religious meetings of pastafarians .</p>

				<h2 id="meat_fish_id">Meat - Fish</h2>
                <p id="meat_fish_id">Our Chef is happy to present you only the best from our main dish collection. Meat for the common cavemen and fish for semi-vegetarians. Only local ingredients are used for the meat whereas the fish is from any ocean we can grab it.</p>

				<h2 id="dessert_id">Dessert</h2>
                <p id="dessert_id">After finishing the main dish, most customers fell like they are too full to eat something before the next morning. Until they see the dessert selection, that is.</p>

                <div class="flex-col">
                    <a id="appetizers_btn" href="javascript:void(0)" class="lp-button selected" >Appetizers</a>
                    <a id="fresh_pasta_btn" href="javascript:void(0)" class="lp-button" >Fresh Pasta</a>
                    <a id="meat_fish_btn" href="javascript:void(0)" class="lp-button" >Meat - Fish</a>
                    <a id="dessert_btn" href="javascript:void(0)" class="lp-button" >Dessert</a>
                </div>

            </div>
            <div class="menu-cell">
			<!-- Appetizers -->
                <div id="appetizers_id" class="menu-float-wrapper">
					<?php
						$args = array(
						  'post_type' => 'dish',
						  'meta_query' => array(
								array(
									'key'     => 'dish_category',
									'value'   => 'starter'
								),
							),
						);
						$page_query = new WP_Query( $args );
						while ( $page_query->have_posts() ) : $page_query->the_post();
							get_template_part( 'dish' );
						endwhile;
					?>
                </div>

				<!-- Fresh Pasta -->
				<div id="fresh_pasta_id" class="menu-float-wrapper">
					<?php
						$args = array(
						  'post_type' => 'dish',
						  'meta_query' => array(
								array(
									'key'     => 'dish_category',
									'value'   => 'pasta'
								),
							),
						);
						$page_query = new WP_Query( $args );
						while ( $page_query->have_posts() ) : $page_query->the_post();
							get_template_part( 'dish' );
						endwhile;
					?>        
                        
                </div>

				<!-- Meat - Fish -->
				<div id="meat_fish_id" class="menu-float-wrapper">
					<?php
						$args = array(
						  'post_type' => 'dish',
						  'meta_query' => array(
								array(
									'key'     => 'dish_category',
									'value'   => 'meat'
								),
							),
						);
						$page_query = new WP_Query( $args );
						while ( $page_query->have_posts() ) : $page_query->the_post();
							get_template_part( 'dish' );
						endwhile;
					?>
                </div>

				<!-- Dessert -->
				<div id="dessert_id" class="menu-float-wrapper">
					<?php
						$args = array(
						  'post_type' => 'dish',
						  'meta_query' => array(
								array(
									'key'     => 'dish_category',
									'value'   => 'dessert'
								),
							),
						);
						$page_query = new WP_Query( $args );
						while ( $page_query->have_posts() ) : $page_query->the_post();
							get_template_part( 'dish' );
						endwhile;
					?>
                </div>
				
            </div>
        </div>
    </div>
</section>
<!-- End Menu -->

<!-- Third -->

<a class="anchor" id="events"></a>
<?php
	// Display the 4th page
	$args = array(
	  'post_type' => 'page',
	  'meta_key'   => 'position',
	  'orderby' => 'meta_value_num',
	  'order' => 'ASC',
	  'meta_query' => array(
			array(
				'key'     => 'position',
				'value'   => array( 3 ),
				'compare' => 'IN',
			),
		),
	);
	$page_query = new WP_Query( $args );
	while ( $page_query->have_posts() ) : $page_query->the_post();
		get_template_part( 'page_content' );
	endwhile;
?>

<div id="WTF_id">
    <section id="events_id" class="lp-brown">
        <h3><b> Upcoming Events </b></h3>
        <div id="upcoming_event_id" class="event-container">
<?php
    $args = array('post_type' => 'event',
            'posts_per_page' => 3,
            'orderby'        => 'meta_value',
            'order'          => 'ASC',
            'meta_key'       => 'event_end',
            'meta_value'     => date('Y-m-dTH:i'),
            'meta_compare'   => '>'
    );
    $loop = new WP_Query($args);
    $num = 0;

    while ($loop->have_posts()):
        $loop->the_post();

        // get the values from our defined meta-tags
        $start_date = get_post_meta($post->ID, 'event_start');
        $end_date   = get_post_meta($post->ID, 'event_end');
        $description_array = get_post_meta($post->ID, 'event_description');

        // Convert the string and cut it after 200 words.
        $description = $description_array['0'];
        $description = substr($description, 0, 200).'...';

        // load times and convert them into a readable format
        $start_time = strtotime($start_date['0']);
        $end_time   = strtotime($end_date['0']);

        ?>
            <div class="container-element <?php $num ?>">
            <span><span style= "background-image: url(<?php the_post_thumbnail_url() ?>)"></span></span>
            <a class="<?php echo $num ?>" href="">
                    <h3><?php the_title() ?></h3>
                    <h2><?php
                        if($start_time == $end_time){
                            echo date('d/m/Y H:i a ', $start_time);
                        }else{
                            echo date('d/m/Y H:i - ', $start_time);
                            echo date('H:i', $end_time);
                        }
                    ?></h2>
                </a>
                <p><?php echo $description?><a class="<?php echo $num ?>" href="">[READ MORE]</a></p>
            </div>

        <?php
        $num = $num + 1;
    endwhile;
?>
        </div>
        <br> <br>
        <?php $queryArgs = array(
          'post_type'      => 'event',
          'posts_per_page' => 4,
          'orderby'        => 'meta_value',
          'meta_key'       => 'event_end',
          'meta_value'     => date('Y-m-dTH:i'),
          'meta_compare'   => '<'
        );
        $eventPosts = new WP_Query($queryArgs);
        if ($eventPosts->have_posts()): ?>
            <h3> <b> Past Events </b> </h3>
            <div id="past_event_id" class="event-container">
            <?php while($eventPosts->have_posts()):
            $eventPosts->the_post();
            $postID = get_the_ID();
            $startDate = strtotime(get_post_meta($postID, 'event_start', true));
            $endDate = strtotime(get_post_meta($postID, 'event_end', true));
            $thumbnailUrl = wp_get_attachment_url(get_post_thumbnail_id($postID));
            ?>
                <div class="container-element">
                    <span >
                        <span style="background-image: <?php echo 'url('.$thumbnailUrl.')'?>"></span>
                    </span>
                    <a>
                        <h3><?php echo get_post_meta($postID, 'event_ename', true)?></h3>
                        <h2><?php echo date('d/m/Y H:i', $startDate).' - '.date('H:i', $endDate); ?></h2>
                    </a>
                </div>
            <?php endwhile; ?>
            </div>
            <br> <br>
            <div id="past_event_see_more_wrapper_id">
                <div>
                    <a id="past_event_see_more_id" href="" class="lp-button hover-dark-gray" >See More</a>
                </div>
            </div>
        <?php endif; ?>
    </section>
    <!-- Basic Elements -->

    <!-- Fourth -->
    <a class="anchor" id="contacts"></a>
    <section id="about_contact_id">
        <h2>Contact us</h2>
        <p>Feel free to contact us for any kind of issues or questions</p>
    </section>

    <section id="contact_form_id">
        <div id="contact_form_container_id">
            <form method="post" action="#">
                <div class="contact-two-col-row">
                    <div class="half-width-column"><input class="lp-input" type="text" placeholder="Name" /></div>
                    <div class="half-width-column"><input class="lp-input" type="text" placeholder="Email" /></div>
                </div>
                <div >
                    <div id="contact_message_id"><textarea class="lp-input" name="message" placeholder="Message"></textarea></div>
                </div>
                <div id="contact_buttons_list_container_id">
                    <div >
                        <ul id="contact_buttons_list_id">
                            <li><input type="submit"  class="lp-button hover-dark-gray"  value="Send Message" /></li>
                            <li><input type="reset"  class="lp-button hover-light-gray" value="Clear Form" /></li>
                        </ul>
                    </div>
                </div>
            </form>
        </div>
    </section>


    <!-- 5th -->
    <a class="anchor" id="book"></a>
    <section id="booking_id" class="parallax">
        <div id="booking_inner_id">
            <h2  id="booking_title_id">Book a table</h2>
            <div id="booking_form_container_id">
                <!-- <div id="booking_form_id"> -->
                <form method="post" action="#">
                    <div class="booking-two-col-row">
                        <div class="half-width-column"><input class="lp-input" type="text" placeholder="Name" /></div>
                        <div class="half-width-column"><input class="lp-input" type="text" placeholder="Phone" /></div>
                    </div>
                    <div class="booking-two-col-row">
                        <div class="half-width-column"><input class="lp-input" type="text" placeholder="Date" /></div>
                        <div class="half-width-column"><input class="lp-input" type="text" placeholder="Time" /></div>
                    </div>

                    <div id="booking_message_id">
                        <div ><textarea class="lp-input" name="message" placeholder="Message"></textarea></div>
                    </div>
                    <!-- </br> -->
                    <input id="booking_button_id" type="submit" class="lp-button hover-dark-gray" value="Book" />

                    <!-- </div> -->
                </form>
            </div>
        </div>
    </section>
</div>
<!-- Footer -->
<section id="footer_id" class="footer-table">
    <div  class="footer-col" >
        <h2> Opening Hour </h2>
        <p>
          <b> MONDAY : </b>
          <span id="monday_hours_id"><?php echo get_theme_mod('monday_hours', 'closed')?></span>
        </p> <br>
        <p>
          <b>TUE-FRI : </b>
          <span id="tue_fri_hours_id"><?php echo get_theme_mod('tue_fri_hours', 'closed')?></span>
        </p> <br>
        <p>
          <b>SAT-SUN : </b>
          <span id="sat_sun_hours_id"><?php echo get_theme_mod('sat_sun_hours', 'closed')?></span>
        </p> <br>
        <p>
          <b>HOLYDAYS : </b>
          <span id="holidays_id"><?php echo get_theme_mod('holidays', 'always')?></span>
        </p> <br>
    </div>
    <div  class="footer-col">
        <h2>  Contacts </h2>
        <p>
          <b>ADDRESS : </b>
          <span id="address_id"><?php echo get_theme_mod('address', 'Musterstadt')?></span>
        </p> <br>
        <p>
          <span id="street_id"><?php echo get_theme_mod('street', 'Musterstrasse 1')?></span>
        </p> <br>
        <p>
          <b>PHONE : </b>
          <span id="phone_nr_id"><?php echo get_theme_mod('phone_nr', '123 456 78 90')?></span>
        </p> <br>
        <p>
          <b>EMAIL : </b>
          <span id="email_addr_id"><?php echo get_theme_mod('email_addr', 'your@mail.here')?></span>
        </p> <br>
    </div>
</section>


<?php get_footer(); ?>
