<?php

namespace EjemploPlubo\Components;

class Books
{

    public static function register_post_type()
    {
        register_post_type('book', [
            'public'    => true,
            'show_in_rest' => true,
            'label'     => __('Book', 'plugin-placeholder'),
            'menu_icon' => 'dashicons-book',
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => 20,
            'supports'           => ['title', 'editor', 'author', 'thumbnail'],
        ]);
    }
}
