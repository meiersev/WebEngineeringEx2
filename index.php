
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
                    <div class="menu-float">
                        <a href="#bruschette_with_tomatoes" >
                            <img src=<?php echo get_theme_file_uri('assets/images/pic01.jpg') ?> alt="" />
                            <div class="menu-title">
                                <span>Bruschette with Tomatoes</span>
                            </div>
                        </a>
                    </div>
                    <div id="bruschette_with_tomatoes" class="popup">
                        <article>
                            <header>
                                <h3>Bruschette with Tomatoes</h3>
                                <a class="close-button" href="#close">x</a>
                            </header>
                            <img src="wp-content/themes/fancyRestaurant/assets/images/pic01.jpg">
                            <p>
                                Our bruschette with tomatoes are fabulous! We have been awarded internationally for <i>#1 Best Bruschette with Tomatoes outside of Italy served at lunch time</i> every year for the last two decades.
                            </p>
                        </article>
                    </div>

                    <div class="menu-float">
                        <a href="#green_rolls" >
                            <img src="wp-content/themes/fancyRestaurant/assets/images/pic02.jpg" alt="" />
                            <div class="menu-title" >
                                <span> Green Rolls </span>
                            </div>
                        </a>
                    </div>
                    <div id="green_rolls" class="popup">
                        <article>
                            <header>
                                <h3>Green Rolls</h3>
                                <a class="close-button" href="#close">x</a>
                            </header>
                            <img src="wp-content/themes/fancyRestaurant/assets/images/pic02.jpg">
                            <p>
                                They are green. They roll. What else would you ask for?
                            </p>
                        </article>
                    </div>

                    <div class="menu-float">
                        <a href="#eggplants" >
                            <img  src="wp-content/themes/fancyRestaurant/assets/images/eggplants.jpg" alt="" />
                            <div class="menu-title">
                                <span> Eggplants  </span>
                            </div>
                        </a>
                    </div>
                    <div id="eggplants" class="popup">
                        <article>
                            <header>
                                <h3>Eggplants</h3>
                                <a class="close-button" href="#close">x</a>
                            </header>
                            <img src="wp-content/themes/fancyRestaurant/assets/images/eggplants.jpg">
                            <p>
                                Our chef has developed his unique own way to deal with dreadful eggplants, such that they are almost completely harmless for human beings.
                            </p>
                        </article>
                    </div>

                    <div class="menu-float">
                        <a href="#bruschette" >
                            <img src="wp-content/themes/fancyRestaurant/assets/images/pic04.jpg" alt="" />
                            <div class="menu-title">
                                <span>Bruschette</span>
                            </div>
                        </a>
                    </div>
                    <div id="bruschette" class="popup">
                        <article>
                            <header>
                                <h3>Bruschette</h3>
                                <a class="close-button" href="#close">x</a>
                            </header>
                            <img src="wp-content/themes/fancyRestaurant/assets/images/pic04.jpg">
                            <p>
                                The classic bruchette of our magnificent cuisine is almost as delicate as the bruchette with tomatoes!
                            </p>
                        </article>
                    </div>

                    <div class="menu-float">
                        <a href="#bell_pepper" >
                            <img src="wp-content/themes/fancyRestaurant/assets/images/pic03.jpg" alt="" />
                            <div class="menu-title">
                                <span>Bell pepper</span>
                            </div>
                        </a>
                    </div>
                    <div id="bell_pepper" class="popup">
                        <article>
                            <header>
                                <h3>Bell pepper</h3>
                                <a class="close-button" href="#close">x</a>
                            </header>
                            <img src="wp-content/themes/fancyRestaurant/assets/images/pic03.jpg">
                            <p>
                                Some people really like bell pepper. Other's have never tasted it.
                            </p>
                        </article>
                    </div>

                    <div class="menu-float">
                        <a href="#spicy_beans" >
                            <img src="wp-content/themes/fancyRestaurant/assets/images/pic06.jpg" alt="" />
                            <div class="menu-title">
                                <span> Spicy Beans</span>
                            </div>
                        </a>
                    </div>
                    <div id="spicy_beans" class="popup">
                        <article>
                            <header>
                                <h3>Spicy Beans</h3>
                                <a class="close-button" href="#close">x</a>
                            </header>
                            <img src="wp-content/themes/fancyRestaurant/assets/images/pic06.jpg">
                            <p>
                                We will not accept any liability if they are too spicy.
                            </p>
                        </article>
                    </div>
                </div>

				<!-- Fresh Pasta -->
				<div id="fresh_pasta_id" class="menu-float-wrapper">
                    <div class="menu-float">
                        <a href="#spaghetti" >
                            <img src="wp-content/themes/fancyRestaurant/assets/images/spaghetti.jpg" alt="" />
                            <div class="menu-title">
                                <span> Spaghetti Carbonara</span>
                            </div>
                        </a>
                    </div>
                    <div id="spaghetti" class="popup">
                        <article>
                            <header>
                                <h3>Spaghetti Carbonara</h3>
                                <a class="close-button" href="#close">x</a>
                            </header>
                            <img src="wp-content/themes/fancyRestaurant/assets/images/spaghetti.jpg">
                            <p>
                                We usually eat them with a fork and a spoon, but if you like we can also cut it for you so cou can eat with a spoon only.
                            </p>
                        </article>
                    </div>

                    <div class="menu-float">
                        <a href="#whole_grain" >
                            <img src="wp-content/themes/fancyRestaurant/assets/images/whole_grain.jpg" alt="" />
                            <div class="menu-title" >
                                <span> Whole grain pasta </span>
                            </div>
                        </a>
                    </div>
                    <div id="whole_grain" class="popup">
                        <article>
                            <header>
                                <h3>Whole grain pasta</h3>
                                <a class="close-button" href="#close">x</a>
                            </header>
                            <img src="wp-content/themes/fancyRestaurant/assets/images/whole_grain.jpg">
                            <p>
                                You will probably not taste the difference, but at least you can tell yourself you are eating extra-healthy pasta.
                            </p>
                        </article>
                    </div>

                    <div class="menu-float">
                        <a href="#tortellini" >
                            <img  src="wp-content/themes/fancyRestaurant/assets/images/tortellini.jpg" alt="" />
                            <div class="menu-title">
                                <span> Tortellini  </span>
                            </div>
                        </a>
                    </div>
                    <div id="tortellini" class="popup">
                        <article>
                            <header>
                                <h3>Tortellini</h3>
                                <a class="close-button" href="#close">x</a>
                            </header>
                            <img src="wp-content/themes/fancyRestaurant/assets/images/tortellini.jpg">
                            <p>
                                You should try to make them by yourself, it is really tedious!
                            </p>
                        </article>
                    </div>

                    <div class="menu-float">
                        <a href="#arrabiata" >
                            <img src="wp-content/themes/fancyRestaurant/assets/images/arrabiata.jpg" alt="" />
                            <div class="menu-title">
                                <span>Pasta Arrabiata</span>
                            </div>
                        </a>
                    </div>
                    <div id="arrabiata" class="popup">
                        <article>
                            <header>
                                <h3>Pasta Arrabiata</h3>
                                <a class="close-button" href="#close">x</a>
                            </header>
                            <img src="wp-content/themes/fancyRestaurant/assets/images/arrabiata.jpg">
                            <p>
                                It can somteimes be a bit spicy, but it mostly depends on the chefs mood.
                            </p>
                        </article>
                    </div>

                    <div class="menu-float">
                        <a href="#pasta" >
                            <img src="wp-content/themes/fancyRestaurant/assets/images/pasta.jpg" alt="" />
                            <div class="menu-title">
                                <span>Normal pasta</span>
                            </div>
                        </a>
                    </div>
                    <div id="pasta" class="popup">
                        <article>
                            <header>
                                <h3>Normal pasta</h3>
                                <a class="close-button" href="#close">x</a>
                            </header>
                            <img src="wp-content/themes/fancyRestaurant/assets/images/pasta.jpg">
                            <p>
                                Sometimes it is also important to mention that we do actually serve normal pasta, too.
                            </p>
                        </article>
                    </div>

                    <div class="menu-float">
                        <a href="#fsm" >
                            <img src="wp-content/themes/fancyRestaurant/assets/images/fsm.jpg" alt="" />
                            <div class="menu-title">
                                <span> Flying Spaghetti Monster</span>
                            </div>
                        </a>
                    </div>
                    <div id="fsm" class="popup">
                        <article>
                            <header>
                                <h3>Flying Spaghetti Monster</h3>
                                <a class="close-button" href="#close">x</a>
                            </header>
                            <img src="wp-content/themes/fancyRestaurant/assets/images/fsm.jpg">
                            <p>
                                The almighty flying spaghetti monster is watching you.
                            </p>
                        </article>
                    </div>
                </div>

				<!-- Meat - Fish -->
				<div id="meat_fish_id" class="menu-float-wrapper">
                    <div class="menu-float">
                        <a href="#haxen" >
                            <img src="wp-content/themes/fancyRestaurant/assets/images/haxen.jpg" alt="" />
                            <div class="menu-title">
                                <span> Haxen</span>
                            </div>
                        </a>
                    </div>
                    <div id="haxen" class="popup">
                        <article>
                            <header>
                                <h3>Haxen</h3>
                                <a class="close-button" href="#close">x</a>
                            </header>
                            <img src="wp-content/themes/fancyRestaurant/assets/images/haxen.jpg">
                            <p>
                                Although they are more famously served in Bayern, but whatever, we also like them.
                            </p>
                        </article>
                    </div>

                     <div class="menu-float">
                        <a href="#meatballs" >
                            <img src="wp-content/themes/fancyRestaurant/assets/images/pic05.jpg" alt="" />
                            <div class="menu-title">
                                <span>Meatballs</span>
                            </div>
                        </a>
                    </div>
                    <div id="meatballs" class="popup">
                        <article>
                            <header>
                                <h3>Meatballs</h3>
                                <a class="close-button" href="#close">x</a>
                            </header>
                            <img src="wp-content/themes/fancyRestaurant/assets/images/pic05.jpg">
                            <p>
                                Also available for vegatarians as almost-meatballs with tofu instead of animal's mortal remains.
                            </p>
                        </article>
                    </div>

                    <div class="menu-float">
                        <a href="#fish" >
                            <img  src="wp-content/themes/fancyRestaurant/assets/images/fish.jpg" alt="" />
                            <div class="menu-title">
                                <span> Fish & Chips  </span>
                            </div>
                        </a>
                    </div>
                    <div id="fish" class="popup">
                        <article>
                            <header>
                                <h3>Fish & Chips</h3>
                                <a class="close-button" href="#close">x</a>
                            </header>
                            <img src="wp-content/themes/fancyRestaurant/assets/images/fish.jpg">
                            <p>
                                A perfect match for our youngest guests.
                            </p>
                        </article>
                    </div>

                    <div class="menu-float">
                        <a href="#prawn" >
                            <img src="wp-content/themes/fancyRestaurant/assets/images/prawn.jpg" alt="" />
                            <div class="menu-title">
                                <span>Prawns</span>
                            </div>
                        </a>
                    </div>
                    <div id="prawn" class="popup">
                        <article>
                            <header>
                                <h3>Prawns</h3>
                                <a class="close-button" href="#close">x</a>
                            </header>
                            <img src="wp-content/themes/fancyRestaurant/assets/images/prawn.jpg">
                            <p>
                                It might be hard to believe, but they are actually eatable.
                            </p>
                        </article>
                    </div>

                    <div class="menu-float">
                        <a href="#steak" >
                            <img src="wp-content/themes/fancyRestaurant/assets/images/steak.jpg" alt="" />
                            <div class="menu-title">
                                <span>Steak on a hot stone plate</span>
                            </div>
                        </a>
                    </div>
                    <div id="steak" class="popup">
                        <article>
                            <header>
                                <h3>Steak on a hot stone plate</h3>
                                <a class="close-button" href="#close">x</a>
                            </header>
                            <img src="wp-content/themes/fancyRestaurant/assets/images/steak.jpg">
                            <p>
                                The size of the meat loaf goes down as the reputation of the restaurant and the prize go up. But the stone is always large and heavy.
                            </p>
                        </article>
                    </div>

                    <div class="menu-float">
                        <a href="#burger" >
                            <img src="wp-content/themes/fancyRestaurant/assets/images/burger.jpg" alt="" />
                            <div class="menu-title">
                                <span> Burger</span>
                            </div>
                        </a>
                    </div>
                    <div id="burger" class="popup">
                        <article>
                            <header>
                                <h3>Burger</h3>
                                <a class="close-button" href="#close">x</a>
                            </header>
                            <img src="wp-content/themes/fancyRestaurant/assets/images/burger.jpg">
                            <p>
                                A nice peace of beef with a bacon slice, tomatoes and lattice is found inside of home-made bread.
                            </p>
                        </article>
                    </div>
                </div>


				<!-- Dessert -->
				<div id="dessert_id" class="menu-float-wrapper">
                    <div class="menu-float">
                        <a href="#banana_cake" >
                            <img src="wp-content/themes/fancyRestaurant/assets/images/banana_cakes.jpg" alt="" />
                            <div class="menu-title">
                                <span> Banana cakes</span>
                            </div>
                        </a>
                    </div>
                    <div id="banana_cake" class="popup">
                        <article>
                            <header>
                                <h3>Banana cakes</h3>
                                <a class="close-button" href="#close">x</a>
                            </header>
                            <img src="wp-content/themes/fancyRestaurant/assets/images/banana_cakes.jpg">
                            <p>
                                Because bananas are awesome!
                            </p>
                        </article>
                    </div>

                    <div class="menu-float">
                        <a href="#raspberry_pie" >
                            <img src="wp-content/themes/fancyRestaurant/assets/images/raspberry_pie.jpg" alt="" />
                            <div class="menu-title" >
                                <span> Raspberry pie </span>
                            </div>
                        </a>
                    </div>
                    <div id="raspberry_pie" class="popup">
                        <article>
                            <header>
                                <h3>Raspberry pie</h3>
                                <a class="close-button" href="#close">x</a>
                            </header>
                            <img src="wp-content/themes/fancyRestaurant/assets/images/raspberry_pie.jpg">
                            <p>
                                This is easily confused with a british single-board computer.
                            </p>
                        </article>
                    </div>

                    <div class="menu-float">
                        <a href="#apple_pie" >
                            <img  src="wp-content/themes/fancyRestaurant/assets/images/apple_pie.jpg" alt="" />
                            <div class="menu-title">
                                <span> Apple pie  </span>
                            </div>
                        </a>
                    </div>
                    <div id="apple_pie" class="popup">
                        <article>
                            <header>
                                <h3>Apple pie</h3>
                                <a class="close-button" href="#close">x</a>
                            </header>
                            <img src="wp-content/themes/fancyRestaurant/assets/images/apple_pie.jpg">
                            <p>
                                The apple slices are layerd in spiral shapes and are enormously tasty.
                            </p>
                        </article>
                    </div>

                    <div class="menu-float">
                        <a href="#icecream" >
                            <img src="wp-content/themes/fancyRestaurant/assets/images/icecream.jpg" alt="" />
                            <div class="menu-title">
                                <span>Ice Cream</span>
                            </div>
                        </a>
                    </div>
                    <div id="icecream" class="popup">
                        <article>
                            <header>
                                <h3>Ice cream</h3>
                                <a class="close-button" href="#close">x</a>
                            </header>
                            <img src="wp-content/themes/fancyRestaurant/assets/images/icecream.jpg">
                            <p>
                                Be amazed by the incredible variety of different ice cream flavors and be even more astonished by the factorial high number of possible combinations! (The order matters for aesthetic reasons.)
                            </p>
                        </article>
                    </div>

                    <div class="menu-float">
                        <a href="#hot_berry" >
                            <img src="wp-content/themes/fancyRestaurant/assets/images/hot_berry.jpg" alt="" />
                            <div class="menu-title">
                                <span>Hot berries</span>
                            </div>
                        </a>
                    </div>
                    <div id="hot_berry" class="popup">
                        <article>
                            <header>
                                <h3>Hot berries</h3>
                                <a class="close-button" href="#close">x</a>
                            </header>
                            <img src="wp-content/themes/fancyRestaurant/assets/images/hot_berry.jpg">
                            <p>
                                A special mix of frozen ice cream and steaming, hot berries in a glass cup. Hurry quickly while eating this dessert!
                            </p>
                        </article>
                    </div>

                    <div class="menu-float">
                        <a href="#seasonal" >
                            <img src="wp-content/themes/fancyRestaurant/assets/images/seasonal.jpg" alt="" />
                            <div class="menu-title">
                                <span> Seasonal desserts</span>
                            </div>
                        </a>
                    </div>
                    <div id="seasonal" class="popup">
                        <article>
                            <header>
                                <h3>Seasonal desserts</h3>
                                <a class="close-button" href="#close">x</a>
                            </header>
                            <img src="wp-content/themes/fancyRestaurant/assets/images/seasonal.jpg">
                            <p>
                                We serve different desserts fitting the season, don't hesitate to ask our chef about the weekly changes and be surprised by new flavors each time you visit us.
                            </p>
                        </article>
                    </div>
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
            <div class="container-element cooking-event">


                <span ><span  ></span></span>


                <a href="">
                    <h3>Learning to Cook</h3>
                    <h2>12/03/2017 10:30 a.m.</h2>
                </a>

                <p>Get the basic skills every home cook needs to be successful and happy in the kitchen. Ditch recipes by learning basic cooking formulas. Come and learn how to <a href=""> [Read More]</a></p>

            </div>
            <div class="container-element pasta-event">

                <span ><span  ></span></span>

                <a href="">
                    <h3>Pasta Day</h3>
                    <h2>11/03/2017 18:00 - 23:00</h2>
                </a>

                <p>The fresh pastas offered at LaPlace are made right in our restaurant. And if you've only ever had boxed pastas, you are truly missing out! Once evert two months we celebrate Pasta with an event <a href=""> [Read More]</a></p>

            </div>
            <div class="container-element happy-event">

                <span ><span  ></span></span>

                <a href="">
                    <h3>Happy Hour</h3>
                    <h2>03/03/2017 18:00 - 23:00</h2>
                </a>

                <p>It's Friday!!! Come and enjoy the start of the weekend with us. Our Happy Hours offer the best combination of nice drinks and food. To reserve a sit please register to the event <a href=""> [Read More]</a> </p>

            </div>
        </div>
        <br> <br>
        <h3> <b> Past Events </b> </h3>
        <div id="past_event_id" class="event-container">
            <div  class="container-element birthday-event">

                <span ><span  ></span></span>

                <a href="">
                    <h3>10th Anniversary</h3>
                    <h2>01/12/2016 18:00 - 23:00</h2>
                </a>



            </div>
            <div  class="container-element pasta-event">

                <span ><span  ></span></span>

                <a href="">
                    <h3>Pasta Day</h3>
                    <h2>20/11/2016 18:00 - 23:00</h2>
                </a>



            </div>

            <div class="container-element happy-event" >

                <span ><span  ></span></span>

                <a href="">
                    <h3>Happy Hour</h3>
                    <h2>11/11/2016 18:00 - 23:00</h2>
                </a>



            </div>

            <div class="container-element cooking-event" >

                <span ><span  ></span></span>

                <a href="">
                    <h3>Salsa</h3>
                    <h2>01/11/2016 18:00 - 23:00</h2>
                </a>



            </div>
        </div>
        <br> <br>
        <div >
            <div >

                <a href="#second" class="lp-button hover-dark-gray" >See More</a>

            </div>
        </div>
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
        <p> <b> MONDAY : </b><?php echo get_theme_mod('monday_hours', 'closed')?> </p> <br>
        <p> <b>TUE-FRI : </b><?php echo get_theme_mod('tue_fri_hours', 'closed')?></p> <br>
        <p> <b>SAT-SUN : </b><?php echo get_theme_mod('sat_sun_hours', 'closed')?></p> <br>
        <p> <b>HOLYDAYS : </b><?php echo get_theme_mod('holidays', 'always')?></p> <br>
    </div>
    <div  class="footer-col">
        <h2>  Contacts </h2>
        <p> <b>ADDRESS : </b><?php echo get_theme_mod('address', 'Musterstadt')?></p> <br>
        <p> <?php echo get_theme_mod('street', 'Musterstrasse 1')?></p> <br>
        <p> <b>PHONE : </b><?php echo get_theme_mod('phone_nr', '123 456 78 90')?></p> <br>
        <p> <b>EMAIL : </b><?php echo get_theme_mod('email_addr', 'your@mail.here')?></p> <br>
    </div>
</section>


<?php get_footer();
