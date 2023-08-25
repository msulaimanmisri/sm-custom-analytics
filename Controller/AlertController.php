<?php

class AlertController
{
    public static function init(): void
    {
        add_action('admin_notices', [__CLASS__, 'displayResetSuccessMessage']);
    }

    public static function displayResetSuccessMessage(): void
    {
        if (isset($_GET['reset_success']) && $_GET['reset_success'] == 1) {
            echo '<div class="notice notice-success is-dismissible"><p>Visitor count has been reset successfully!</p></div>';
        }
    }
}

AlertController::init();
