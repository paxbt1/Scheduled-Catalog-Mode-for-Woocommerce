<?php

namespace  scheduleCatalogTime\core;

use  scheduleCatalogTime\Classes\schedule_Catalog_Mode;
use  scheduleCatalogTime\Classes\validtime;

/**
 * Plugin Name:       scheduled catalog mode for woocommerce
 * Plugin URI:        http://wordpressgeek.net/scheduled-catalog-mode-for-wc/
 * Description:       scheduled catalog mode make you be able to close your online shop in exact time of days of week
 * Version:           1.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Saeed Ghourbanian
 * Author URI:        https://www.linkedin.com/in/saeed-ghourbanian/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       scheduled-catalog-mode-for-wc
 * Domain Path:       /Languages
 */

// If this file is called directly, abort.
if (!defined('ABSPATH')) exit;

include 'includes/loader.php';

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('WC_Scheduled_Catalog_Mode_VERSION', '1.0.0');

/**
 * The code that runs during plugin activation.
 */
register_activation_hook(__FILE__, 'scheduled_catalog_mode_activation');

function scheduled_catalog_mode_activation()
{
    if (!get_option('timezone_string')) {
        die(__('There is no Time Zone has been Setted up please select your time zone from: Settings/General/Timezone', 'scheduled-catalog-mode-for-wc'));
    }
}

/*
* Core class instanceiation and run main function called start()
*/
$schdule=new  schedule_Catalog_Mode();
$schdule->start(new validtime());




