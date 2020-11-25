<?php
/**
 * Plugin Name: 24HR Extenden Wordpress Search
 * Plugin URI: https://gitlab.24hr.se/marcus/24hr-checklist-gutenberg-plugin
 * Description: Extends the admin search (default and Nested Pages) to search in content column in database as well.
 * Author: Marcus Thelin <marcus.thelin@24hr.se>
 * Version: 1.0.0
 * License: GPL2+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.txt
 *
 * @package Extended Search
 */

if (!defined('ABSPATH')) {
    exit;
}

require_once(plugins_url( './classes/search-extender' , __FILE__ ));

new SearchExtender24HR\SearchExtender();