<?php

/*
Plugin Name: Iosys Testimonials
Plugin URI: http://iosys.in/
Description: Easy way to add testimonials in your website
Author: Iosys
Author URI: https://www.iosys.in/
Version: 1.0
License: GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/


function add_ioStyle1097()
{
    wp_enqueue_style('stylesheet', plugin_dir_url(__FILE__) . "/css/style.css");
    wp_enqueue_style('slickCss', "//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css");
}

add_action('wp_enqueue_scripts', 'add_ioStyle1097');


function add_ioScript1097()
{
    wp_enqueue_script('jquery', '//code.jquery.com/jquery-3.3.1.slim.min.js', null, null, true);
    wp_enqueue_script('slickjs', "//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js", null, null, true);
    wp_enqueue_script('script', plugin_dir_url(__FILE__) . "/js/script.js", null, null, true);
}

add_action('wp_enqueue_scripts', 'add_ioScript1097');


class iosysTestimonial1097
{
    private static $instance;

    public static function getInstance()
    {
        if (self::$instance == NULL) {
            self::$instance = new self();
        }

        return self::$instance;

    }


    private function __construct()
    {

        add_action('init', array($this, 'iosys_testimonials1097'));

        add_shortcode('testimonial_io', array($this, 'iosys_testimonial_shortcode'));
    }


    public function iosys_testimonials1097()
    {

        register_post_type('iotestimonials', array(
            'labels' => array(
                'name' => __("Testimonials"),
                'singular_name' => __("Testimonial"),
            ),

            'description' => __("Add Your Testimonials Easily"),
            'supports' => array(
                'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'comments', 'custom-fields',),

            'public' => TRUE,
            'menu_icon' => 'dashicons-groups',
            'menu_position' => 20,
            'show_in_nav_menus' => FALSE,
            'taxonomies' => array('category'),

        ));

    }


    public function iosys_testimonial_shortcode($atts)
    {
        ob_start();

        $a = shortcode_atts(array(
            'category' => ''
        ), $atts);

        $catShort = $a['category'];
        $testQuery = new WP_query(array(
            'post_type' => 'iotestimonials',
            'color' => 'blue',
            'order' => 'DESC',
            'orderby' => 'date',
            'category_name' => $catShort,
            'posts_per_page' => 20,
        ));

        ?>
        <div class="io-pth-testimonial">
            <?php
            if ($testQuery->have_posts()) {
                ?>
                <div class="io-testimonial-container">
                    <?php while ($testQuery->have_posts()) : $testQuery->the_post(); ?>
                        <div class="io-slide-container">
                            <h4><?php the_title(); ?></h4>
                            <p><?php the_content(); ?></p>
                            <?php if (!get_the_post_thumbnail_url() == '') { ?>
                            <a href="<?php $lmeta = get_post_meta(get_the_ID(), 'Link', true);

                            echo $lmeta;
                            ?>" target="_blank"><img style="width: 180px;"
                                                     src="<?php echo get_the_post_thumbnail_url(); ?>"/></a><?php } ?>
                            <h4><?php $meta = get_post_meta(get_the_ID(), 'Author', true);

                                echo $meta;
                                ?></h4>
                            <h5><?php $dmeta = get_post_meta(get_the_ID(), 'Description', true);

                                echo $dmeta;
                                ?></h5>
                        </div>
                    <?php
                    endwhile; ?>

                </div>
                <?php
                wp_reset_postdata();

                $resultTest = ob_get_clean();
                return $resultTest;
            }
            ?>
        </div>
        <?php

    }

}

iosysTestimonial1097::getInstance();
?>
