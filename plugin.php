<?php
/**
 * Plugin Name: 24HR Extended Wordpress Search
 * Plugin URI: https://github.com/24hr-malmo/wp-extended-search
 * Description: Extends the admin search (default and Nested Pages) to search in content column in database as well.
 * Author: Marcus Thelin <marcus.thelin@24hr.se>
 * Version: 2.0.0
 * License: GPL2+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.txt
 *
 * @package Extended Search
 */

if (!defined('ABSPATH')) {
    exit;
}
require_once( 'lib/wp-filter-helpers.php');
require_once('classes/search-extender.php');


/**
 * Make sure this plugin is loaded as late as possible to
 * avoid it being loaded before Nested Pages.
 */
add_action('plugins_loaded', 'init_search_extender');
function init_search_extender(){  
    new SearchExtender24HR\SearchExtender();
}


