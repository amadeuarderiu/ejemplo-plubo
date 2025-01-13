<?php

namespace EjemploPlubo\Includes;

class Lyfecycle
{
    public static function activate($network_wide)
    {
        do_action('EjemploPlubo/setup', $network_wide);
    }

    public static function deactivate($network_wide)
    {
        do_action('EjemploPlubo/deactivation', $network_wide);
    }

    public static function uninstall()
    {
        do_action('EjemploPlubo/cleanup');
    }
}
