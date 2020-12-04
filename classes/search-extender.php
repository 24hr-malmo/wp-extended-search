<?php
namespace SearchExtender24HR;

class SearchExtender {
    public function __construct() {
        add_filter( 'posts_search', [$this, 'searcher'], 10, 2 );
        $this->remove_nested_pages_hook();
    }

    private function remove_nested_pages_hook() {
        // The Nested Pages plugin is hooking into the posts_where filter
        // and this interferes with this plugin. Remove its implementation.
        if (class_exists('NestedPages\Entities\Listing\ListingActions')) {
            Lib\remove_filters_for_anonymous_class('posts_where', 'NestedPages\Entities\Listing\ListingActions', 'titleSearch', 10);
        }
    }

    public function searcher( $search, $wp_query ) {
        // Bail if we are not in the admin area
        if ( ! is_admin() ) {
            return $search;
        }
    
    
        $search_string = get_query_var( 's' );
        if (!$search_string) {
            $search_string = $_GET['search'];
        }
        $search_string = preg_replace('/\s/', '( \\s*|\\_)', $search_string);

        $post_type = get_query_var('post_type');
        if (!$post_type) {
            $post_type = $_GET['page'];
        } 
        if ($post_type == 'nestedpages') {
            $post_type = 'page';
        } else {
            $post_type = preg_replace('/^nestedpages-/', '',$post_type);
        }
        
        // Return modified posts_search clause.
        $extended_clause = "AND post_type = '" . $post_type . "' AND (post_content RLIKE '" . $search_string . "' OR post_title RLIKE '" . $search_string . "')";
        return $extended_clause;
    }


}