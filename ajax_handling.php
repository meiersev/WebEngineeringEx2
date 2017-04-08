<?php
/*
 * Add actions related to AJAX requests
 */

// Get past events 4-7
function get_past_events() {
    $offset = $_POST['offset'];
    $queryArgs = array(
      'post_type'      => 'event',
      'posts_per_page' => 4,
      'orderby'        => 'meta_value',
      'meta_key'       => 'event_end',
      'meta_value'     => date('Y-m-dTH:i'),
      'meta_compare'   => '<',
      'offset'         => $offset
    );

    $events = new WP_Query($queryArgs);

    if ($events->have_posts()):
        while($events->have_posts()):
            $events->the_post();
            $postID = get_the_ID();
            $startDate = strtotime(get_post_meta($postID, 'event_start', true));
            $endDate = strtotime(get_post_meta($postID, 'event_end', true));
            $thumbnailUrl = wp_get_attachment_url(get_post_thumbnail_id($postID));?>
            <div class="container-element">
                <span >
                    <span style="background-image: <?php echo 'url('.$thumbnailUrl.')'?>"></span>
                </span>
                <a>
                    <h3><?php echo get_post_meta($postID, 'event_ename', true)?></h3>
                    <h2><?php echo date('d/m/Y H:i', $startDate).' - '.date('H:i', $endDate); ?></h2>
                </a>
            </div>
        <?php endwhile;
    endif;

	die();
}

add_action('wp_ajax_nopriv_get_past_events', 'get_past_events');
add_action('wp_ajax_get_past_events', 'get_past_events');
?>
