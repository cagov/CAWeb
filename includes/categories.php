<?php 

/**
 * CADesignSystem Category Template
 *
 * @category add_filter( 'caweb_category_template', 'cagov_category_template' );
 * @param string $output CAWeb Theme Category Template output.
 * @return HTML
 */
function cagov_category_template($output)
{
    global $wp_query;
    $category = get_category(get_query_var('cat'), false);

    $page_title = sprintf('<h1 class="page-title">%1$s</h1>', $category->name);
    $post_list  = sprintf(
        '<cagov-post-list class="post-list" data-category="%1$s" data-count="10" data-order="desc" data-endpoint="/wp-json/wp/v2" data-show-excerpt="true" data-show-paginator="true" data-show-published-date="true" data-no-results="No results found"></cagov-post-list>',
        $category->slug
    );
    $block_div  = sprintf('<div class="wp-block-ca-design-system-post-list cagov-post-list cagov-stack"><div>%1$s</div></div>', $post_list);

    return sprintf('%1$s%2$s<span class="return-top hidden-print"></span>', $page_title, $block_div);
}

/**
 * CADesignSystem Category Template Sidebar
 *
 * @category add_filter( 'caweb_category_template_sidebar', 'cagov_category_template_sidebar' );
 * @param string $output CAWeb Theme Category Template Sidebar output.
 * @return HTML
 */
function cagov_category_template_sidebar($output)
{
    return '';
}
