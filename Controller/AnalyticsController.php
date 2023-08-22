<?php

use AnalyticsController as CustomAnalyticsController;

class AnalyticsController
{
    public static function init(): void
    {
        add_action('wp', [__CLASS__, 'trackVisitor']);
        add_shortcode('sm_tracking', [__CLASS__, 'makeTrackingShortcode']);
    }

    /**
     * The user must be tracked unique
     */
    public static function trackVisitor(): void
    {
        if (!isset($_COOKIE['unique_visitor'])) {
            $visitorId = uniqid();
            setcookie('unique_visitor', $visitorId, time() + (999 * 365 * 24 * 60 * 60), '/'); // kita simpan selama 999 tahun

            $existingVisitorIds = get_option('unique_visitor_ids', array());
            if (!in_array($visitorId, $existingVisitorIds)) {
                $existingVisitorIds[] = $visitorId;
                update_option('unique_visitor_ids', $existingVisitorIds);
            }
        }
    }

    /**
     * Create a WordPress Shortcode
     */
    public static function makeTrackingShortcode(): string
    {
        $visitorCount = count(get_option('unique_visitor_ids', array()));
        return "Unique Visitors: $visitorCount";
    }
}

CustomAnalyticsController::init();
