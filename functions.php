<?php


if (!function_exists('hardwarenation_setup')) :
function hardwarenation_setup()
{
    add_theme_support('title-tag');
}

endif; // hardwarenation_setup
add_action( 'after_setup_theme', 'hardwarenation_setup' );


/*Menu*/
register_nav_menus(array(
    'header_menu' => 'Header Menu',
    'footer_menu' => 'Footer Menu',
    'sub_footer_menu' => 'Sub Footer Menu',
    'page_menu' => 'Page Menu',
    'products_menu' => 'products menu'
));

function vc_remove_wp_ver_css_js($src)
{
    if (strpos($src, 'ver='))
        $src = remove_query_arg('ver', $src);
    return $src;
}


register_sidebar(array(
    'name' => 'default sidebar',
    'id' => 'default_sidebar',
    'before_widget' => '<div class="widget %2$s"><div class="widget-wrap">',
    'after_widget' => '</div></div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
));


register_sidebar(array(
    'name' => 'footer sidebar',
    'id' => 'sidebar_footer',
    'before_widget' => '<div class="widget %2$s col-lg-3 col-md-3 col-sm-6"><div class="widget-wrap">',
    'after_widget' => '</div></div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
));


/**
 * Enqueue scripts and styles
 */
function hardwarenation_scripts_styles()
{
    //wp_enqueue_style('bootstrapcdn-style', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css', array(), null);
    wp_enqueue_style('bootstrapcdn-style', get_template_directory_uri() . '/css/bootstrap.min.css', array(), null);
    wp_enqueue_style('hardwarenation-style', get_template_directory_uri() . '/css/styles.css', array(), null);
}

add_action('wp_enqueue_scripts', 'hardwarenation_scripts_styles');

add_filter('style_loader_src', 'vc_remove_wp_ver_css_js', 9999);
add_filter('script_loader_src', 'vc_remove_wp_ver_css_js', 9999);
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
add_filter('the_generator', '__return_empty_string');


function my_acf_google_map_api($api)
{
    $api['key'] = 'AIzaSyBvCROYVLl3deCtRpgpEtF9lIkHEVmGVA4';
    return $api;
}

add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');


/* faq */
add_action('init', 'faq_register');

function faq_register()
{
    $args = array(
        'label' => __('FAQs'),
        'singular_label' => __('FAQs'),
        'public' => true,
        'show_ui' => true,
        'publicy_queryable' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => true,
        'supports' => array('title', 'editor'),
        'taxonomies' => array('faq')
    );
    register_post_type('faq', $args);
}

if (function_exists('acf_add_options_page')) {
    //acf_add_options_page();
    acf_add_options_page('Footer Banner');
}


add_filter('loop_shop_per_page', 'new_loop_shop_per_page', 20);

function new_loop_shop_per_page($cols)
{
    $cols = 5;
    return $cols;
}

/**
 * Change number or products per row to 3
 */
add_filter('loop_shop_columns', 'loop_columns', 999);
if (!function_exists('loop_columns')) {
    function loop_columns()
    {
        return 5; // 3 products per row
    }
}

function featured_items()
{
    if (is_shop()) {
        echo do_shortcode("[product_categories columns='5']");
    }
}

add_action('woocommerce_after_shop_loop', 'featured_items', 10);


/**
 * Remove product data tabs
 */
add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

function woo_remove_product_tabs( $tabs ) {

    unset( $tabs['description'] );      	// Remove the description tab
    unset( $tabs['reviews'] ); 			// Remove the reviews tab
    //unset( $tabs['additional_information'] );  	// Remove the additional information tab

    return $tabs;
}


?>
