<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage cagov-wp-theme
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}


/**
 * The template used for displaying page content in page.php
 *
 * @package cagov-wp-theme
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
?> 

<?php
// Pull header file from theme if it exists.
if (file_exists(get_stylesheet_directory() . '/header.php')) {
    require_once get_stylesheet_directory() . '/header.php';
}
?>

<div id="page-container" class="with-sidebar has-sidebar-left page-container-ds">
    <div id="main-content" class="main-content-ds single-column" tabindex="-1">
        <div class="narrow-page-title">
            <?php esc_html(the_title(sprintf('<h1 class="page-title">',), '</h1>')); ?>
        </div>

        <div class="ds-content-layout">
            <div class="sidebar-container everylayout" style="z-index: 1">
                <sidebar space="0" side="left">
                    <cagov-content-navigation data-selector="main" data-type="wordpress" data-label="On this page"></cagov-content-navigation>
                </sidebar>
            </div>
            <div class="everylayout">
                <main class="main-primary">
                    <div>
                        <?php
                        $category = get_the_category();
                        ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <category-label><?php echo isset($category[0]) ? $category[0]->cat_name : ""; ?></category-label>
                            <!-- Page Title-->
                            <?php

                            esc_html(the_title(sprintf('<h1 class="page-title">',), '</h1>'));

                            print '<div class="entry-content">';

                            the_content();

                            printf('<p class="page-date published">Updated: <time datetime="%1$s">%1$s</time></p>', get_the_date('F j, Y g:i a'));
                            print '</div>';
                            ?>
                        </article>
                        <span class="return-top hidden-print"></span>
                </main>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>