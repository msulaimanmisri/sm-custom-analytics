<?php

class ResetVisitorController
{
    public static function init(): void
    {
        add_action('admin_menu', [__CLASS__, 'addResetVisitorNumbersSubMenu']);
    }

    /**
     * WordPress Sub-menu
     */
    public static function addResetVisitorNumbersSubMenu(): void
    {
        add_submenu_page(
            'options-general.php',
            'Reset Visitor',
            'Reset Visitor',
            'manage_options',
            'reset-visitor',
            [__CLASS__, 'handleResetVisitor']
        );
    }

    public static function resetVisitorCount(): void
    {
        update_option('unique_visitor_ids', array());
        setcookie('unique_visitor', '', time() - 3600, '/');
        wp_safe_redirect('/index.php');
    }

    /**
     * Action
     */
    public static function handleResetVisitor(): void
    {
        self::resetVisitorCount();
    }
}

ResetVisitorController::init();
