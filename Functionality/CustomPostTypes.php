<?php

namespace EjemploPlubo\Functionality;

use EjemploPlubo\Components\Books;

class CustomPostTypes
{

    protected $plugin_name;
    protected $plugin_version;

    public function __construct($plugin_name, $plugin_version)
    {
        $this->plugin_name = $plugin_name;
        $this->plugin_version = $plugin_version;

        add_action('init', [Books::class, 'register_post_type']);
    }

}
