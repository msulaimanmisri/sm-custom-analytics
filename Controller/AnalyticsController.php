<?php

use AnalyticsController as CustomAnalyticsController;

class AnalyticsController
{

    public static function init()
    {
        add_action('wp_enqueue_scripts', [__CLASS__, 'enqueueScript']);

        //
    }

    public static function enqueueScript()
    {
        wp_enqueue_script('sm-smooth-package', 'https://cdnjs.cloudflare.com/ajax/libs/smooth-scrollbar/8.8.4/smooth-scrollbar.js', [], false, true);
        wp_enqueue_script('sm-smooth-script', plugins_url('/js/script.js', __FILE__), [], false, true);
    }
}

CustomAnalyticsController::init();
