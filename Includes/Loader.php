<?php

namespace EjemploPlubo\Includes;

class Loader
{
    public function __construct()
    {
        $this->loadDependencies();

        add_action('plugins_loaded', [$this, 'loadPluginTextdomain']);
    }

    private function loadDependencies()
    {
        //FUNCTIONALITY CLASSES
        foreach (glob(EJEMPLOPLUBO_PATH . 'Functionality/*.php') as $filename) {
            $class_name = '\\EjemploPlubo\Functionality\\' . basename($filename, '.php');
            if (class_exists($class_name)) {
                try {
                    new $class_name(EJEMPLOPLUBO_NAME, EJEMPLOPLUBO_VERSION);
                } catch (\Throwable $e) {
                    pb_log($e);
                    continue;
                }
            }
        }

        //ADMIN FUNCTIONALITY
        if( is_admin() ) {
            foreach (glob(EJEMPLOPLUBO_PATH . 'Functionality/Admin/*.php') as $filename) {
                $class_name = '\\EjemploPlubo\Functionality\Admin\\' . basename($filename, '.php');
                if (class_exists($class_name)) {
                    try {
                        new $class_name(EJEMPLOPLUBO_NAME, EJEMPLOPLUBO_VERSION);
                    } catch (\Throwable $e) {
                        pb_log($e);
                        continue;
                    }
                }
            }
        }
    }

    public function loadPluginTextdomain()
    {
        load_plugin_textdomain('ejemplo-plubo', false, dirname(EJEMPLOPLUBO_BASENAME) . '/languages/');
    }
}
