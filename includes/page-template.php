<?php

/**
 * CADesignSystem Page template 
 *
 * @package CADesignSystem
 */

/* WP Filters */
// add_filter( 'get_post_metadata', 'cagov_modify_ca_custom_post_title_display', 100, 3 );
add_filter('template_include', 'cagov_page_template_filter');
add_filter('body_class', 'cagov_body_class', 20);
add_filter('post_class', 'cagov_body_class', 20);

// @TODO Double check
// require_once 'page-resources.php';


/**
 * Include plugin's template if there's one chosen for the rendering page.
 *
 * @category add_filter( 'template_include', 'cagov_page_template_filter' );
 * @param  string $template Array of page templates. Keys are filenames, values are translated names.
 * @link https://developer.wordpress.org/reference/hooks/template_include/
 * @return string The path of the template to include.
 */
function cagov_page_template_filter($template)
{
    global $post;

    if (!isset($post->ID)) {
        return $template;
    }

    $user_selected_template = get_page_template_slug($post->ID);
    $file_name              = pathinfo($user_selected_template, PATHINFO_BASENAME);
    $template_dir           = CAGOV_DESIGN_SYSTEM_HEADLESS_WORDPRESS__DIR_PATH . 'includes/templates/';
    
    $is_plugin = false;
    if (file_exists($template_dir . $file_name)) {
        $is_plugin = true;
    }

    if ('' !== $user_selected_template && $is_plugin) {
        $template = $user_selected_template;
    }

    if (is_category() && $is_plugin) {
        $template = $template_dir . 'plugin/category-template.php';
    }

    return $template;
}

/**
 *
 * Filter the list of CSS body class names for the current page/post.
 *
 * @link https://developer.wordpress.org/reference/hooks/body_class/
 * @link https://developer.wordpress.org/reference/hooks/post_class/
 * @param  array $wp_classes An array of body class names.
 *
 * @category {
 * add_filter( 'body_class','cagov_body_class' , 20 );
 * add_filter( 'post_class','cagov_body_class' , 20 );
 * }
 * @return array
 */
function cagov_body_class($wp_classes)
{
    global $post;

    /* List of the classes that need to be removed */
    $blacklist = array('divi_builder');

    /* List of extra classes that need to be added to the body */
    $whitelist = array('non_divi_builder');

    /* Remove any classes in the blacklist from the wp_classes */
    $wp_classes = array_diff($wp_classes, $blacklist);

    /* Return filtered wp class */
    return array_merge($wp_classes, (array) $whitelist);
}

/**
 * Filters the CAWeb Theme Page Title Class
 *
 * @category add_filter( 'caweb_page_title_class', 'cagov_page_title_class' );
 * @param  string $class Page Title class.
 * @return string
 */
function cagov_page_title_class($class)
{
    return $class . ' wide-page-title'; // Hide alternate title @TODO fix aria references between different title placements mobile/desktop.
}

/**
 * Filters the CAWeb Theme Page Container Class
 *
 * @category add_filter( 'caweb_page_container_class', 'cagov_page_container_class' );
 * @param  string $class Page Container class.
 * @return string
 */
function cagov_page_container_class($class)
{
    global $post;
    $cagov_content_menu_sidebar_class = '';

    // if not FrontPage.
    if (!is_front_page()) {
        $cagov_content_menu_sidebar = get_post_meta($post->ID, '_cagov_content_menu_sidebar', true);

        // if display content menu sidebar.
        if ('on' === $cagov_content_menu_sidebar) {
            $cagov_content_menu_sidebar_class = ' with-sidebar has-sidebar-left';
        }
    }

    return "page-container-ds$cagov_content_menu_sidebar_class";
}

/**
 * Filters the CAWeb Theme Main Content Class
 *
 * @category add_filter( 'caweb_page_main_content_class', 'cagov_page_main_content_class' );
 * @param  string $class Main Content class.
 * @return string
 */
function cagov_page_main_content_class($class)
{
    global $post;
    $main_content = ' single-column-default';

    // if not FrontPage.
    if (!is_front_page()) {
        $cagov_content_menu_sidebar = get_post_meta($post->ID, '_cagov_content_menu_sidebar', true);

        // if display content menu sidebar is enabled then not single column.
        if ('on' === $cagov_content_menu_sidebar) {
            $main_content = '';
        }
    }

    return "main-content-default$main_content";
}

/**
 * Filters the CAWeb Theme Post Title Class
 *
 * @category add_filter( 'caweb_post_title_class', 'cagov_post_title_class' );
 * @param  string $class Post Title class.
 * @return string
 */
function cagov_post_title_class($class)
{
    $caweb_padding = get_option('ca_default_post_date_display', false) ? ' pb-0' : '';
    return $class . $caweb_padding;
}

/**
 * Filters the CAWeb Theme Post Container Class
 *
 * @category add_filter( 'caweb_post_container_class', 'cagov_post_container_class' );
 * @param  string $class Post Container class.
 * @return string
 */
function cagov_post_container_class($class)
{
    global $post;
    $post_container_class = '';

    return "page-container-default$post_container_class";
}

/**
 * Filters the CAWeb Theme Post Main Content Class
 *
 * @category add_filter( 'caweb_post_main_content_class', 'cagov_post_main_content_class' );
 * @param  string $class Post Main Content class.
 * @return string
 */
function cagov_post_main_content_class($class)
{
    global $post;
    $main_content = ' single-column-default';

    return "main-content-default$main_content";
}
