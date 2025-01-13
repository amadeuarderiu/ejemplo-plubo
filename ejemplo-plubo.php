<?php

/**
 * @wordpress-plugin
 * Plugin Name:       EjemploPlubo
 * Plugin URI:        https://sirvelia.com/
 * Description:       A WordPress plugin made with PLUBO.
 * Version:           1.0.0
 * Author:            Sirvelia
 * Author URI:        https://sirvelia.com/
 * License:           GPL-3.0+
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:       ejemplo-plubo
 * Domain Path:       /languages
 * Update URI:        false
 * Requires Plugins:
 */

if (!defined('WPINC')) {
    die('YOU SHALL NOT PASS!');
}

// PLUGIN CONSTANTS
define('EJEMPLOPLUBO_NAME', 'ejemplo-plubo');
define('EJEMPLOPLUBO_VERSION', '1.0.0');
define('EJEMPLOPLUBO_PATH', plugin_dir_path(__FILE__));
define('EJEMPLOPLUBO_BASENAME', plugin_basename(__FILE__));
define('EJEMPLOPLUBO_URL', plugin_dir_url(__FILE__));
define('EJEMPLOPLUBO_ASSETS_PATH', EJEMPLOPLUBO_PATH . 'dist/' );
define('EJEMPLOPLUBO_ASSETS_URL', EJEMPLOPLUBO_URL . 'dist/' );

// AUTOLOAD
if (file_exists(EJEMPLOPLUBO_PATH . 'vendor/autoload.php')) {
    require_once EJEMPLOPLUBO_PATH . 'vendor/autoload.php';
}

// LYFECYCLE
register_activation_hook(__FILE__, [EjemploPlubo\Includes\Lyfecycle::class, 'activate']);
register_deactivation_hook(__FILE__, [EjemploPlubo\Includes\Lyfecycle::class, 'deactivate']);
register_uninstall_hook(__FILE__, [EjemploPlubo\Includes\Lyfecycle::class, 'uninstall']);

// LOAD ALL FILES
$loader = new EjemploPlubo\Includes\Loader();
