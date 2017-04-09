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

function get_upcoming_event(){
    $offset = $_POST['offset'];
    $num = 0;
    $args = array('post_type' => 'event',
            'posts_per_page' => 1,
            'offset'         => $offset,
            'orderby'        => 'meta_value',
            'order'          => 'ASC',
            'meta_key'       => 'event_end',
            'meta_value'     => date('Y-m-dTH:i'),
            'meta_compare'   => '>'
    );

    $loop = new WP_Query($args);

    
    while ($loop->have_posts()):
        $loop->the_post();
        $postID = get_the_ID();

        // get the values from our defined meta-tags
        $start_date = get_post_meta($postID, 'event_start');
        $end_date   = get_post_meta($postID, 'event_end');
        $description_array = get_post_meta($postID, 'event_description');

        // Convert the string and cut it after 200 words.
        $description = $description_array['0'];

        // load times and convert them into a readable format
        $start_time = strtotime($start_date['0']);
        $end_time   = strtotime($end_date['0']);

        ?>
            <div style="flex-basis : 100%;" class="container-element <?php $num ?>">
            <span><span style= "background-image: url(<?php the_post_thumbnail_url() ?>)"></span></span>
            <div class="<?php echo $num ?>" href="">
                    <h3><?php the_title() ?></h3>
                    <h2><?php
                        if($start_time == $end_time){
                            echo date('d/m/Y H:i a ', $start_time);
                        }else{
                            echo date('d/m/Y H:i - ', $start_time);
                            echo date('H:i', $end_time);
                        }
                    ?></h2>
                </div>
                <p><?php echo $description?></p>
            </div>

        <?php
        $num = $num + 1;
    endwhile;
    ?> 
        </div><br><br>
    <?php
    die();
}

add_action('wp_ajax_nopriv_get_upcoming_event', 'get_upcoming_event');
add_action('wp_ajax_get_upcoming_event', 'get_upcoming_event');
?>
