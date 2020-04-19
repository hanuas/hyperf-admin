<?php declare(strict_types=1);

return [
    /*
    |--------------------------------------------------------------------------
    | Login page title
    |--------------------------------------------------------------------------
    |
    | This value is the name of Hyperf-admin, This setting is displayed on the
    | login page.
    |
    */
    'name' => '<span style="color:white"> Hyperf Admin </span>',

    /*
    |--------------------------------------------------------------------------
    | Hyperf-admin html title
    |--------------------------------------------------------------------------
    |
    | Html title for all pages.
    |
    */
    'title' => 'Admin',

    /*
    |--------------------------------------------------------------------------
    | Hyperf-admin logo
    |--------------------------------------------------------------------------
    |
    | The logo of all admin pages.
    |
    */
    'logo' => '/vendor/hyperf-admin/AdminLTE/dist/img/AdminLTELogo.png',

    /*
    |--------------------------------------------------------------------------
    | Login page background image
    |--------------------------------------------------------------------------
    |
    | This value is used to set the background image of login page.
    |
    */
    'login_background_image' => '/vendor/hyperf-admin/AdminLTE/dist/img/bg.jpeg',

    /*
    |--------------------------------------------------------------------------
    | Application layout
    |--------------------------------------------------------------------------
    |
    | This value is the layout of admin pages.
    |
    | Supported: "sidebar-mini", "layout-boxed", "layout-fixed", "layout-navbar-fixed", "layout-footer-fixed"
    |
    */
    'layout' => ['sidebar-mini', 'layout-fixed'],

    /*
    |--------------------------------------------------------------------------
    | Lock screen page setting
    |--------------------------------------------------------------------------
    */
    'lockscreen' => [
        'enable'           => true,
        'background_image' => '/vendor/hyperf-admin/AdminLTE/dist/img/bg.jpeg',
    ],

];
