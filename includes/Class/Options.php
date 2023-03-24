<?php

namespace scheduleCatalogTime\Classes;

class WC_Settings_Scheduled_Catalog_Mode
{

    /**
     * Bootstraps the class and hooks required actions & filters.
     *
     */
    public static function init()
    {
        add_filter('woocommerce_settings_tabs_array', __CLASS__ . '::add_settings_tab', 50);
        add_action('woocommerce_settings_tabs_scheduled_catalog_mode_settings_tab', __CLASS__ . '::settings_tab');
        add_action('woocommerce_update_options_scheduled_catalog_mode_settings_tab', __CLASS__ . '::update_settings');
    }


    /**
     * Add a new settings tab to the WooCommerce settings tabs array.
     *
     * @param array $settings_tabs Array of WooCommerce setting tabs & their labels, excluding the Subscription tab.
     * @return array $settings_tabs Array of WooCommerce setting tabs & their labels, including the Subscription tab.
     */
    public static function add_settings_tab($settings_tabs)
    {
        $settings_tabs['scheduled_catalog_mode_settings_tab'] = __('Scheduled Catalog Mode', 'scheduled-catalog-mode-for-wc');
        return $settings_tabs;
    }


    /**
     * Uses the WooCommerce admin fields API to output settings via the @see woocommerce_admin_fields() function.
     *
     * @uses woocommerce_admin_fields()
     * @uses self::get_settings()
     */
    public static function settings_tab()
    {
        woocommerce_admin_fields(self::get_settings());
    }


    /**
     * Uses the WooCommerce options API to save settings via the @see woocommerce_update_options() function.
     *
     * @uses woocommerce_update_options()
     * @uses self::get_settings()
     */
    public static function update_settings()
    {
        woocommerce_update_options(self::get_settings());
    }


    /**
     * Get all the settings for this plugin for @see woocommerce_admin_fields() function.
     *
     * @return array Array of settings for @see woocommerce_admin_fields() function.
     */
    public static function get_settings()
    {
        

        $settings = array(

            'section_title' => array(
                'name'     => __('Woocommerce schedule Catalog Mode Settings', 'scheduled-catalog-mode-for-wc'),
                'type'     => 'title',
                'desc'     => __('With this you can schedule the catalog mode automatically .','scheduled-catalog-mode-for-wc'),
                'id'       => 'wc_scheduled_catalog_mode_section_title'
            ),
            'description' => array(
                'name' => __('Message', 'scheduled-catalog-mode-for-wc'),
                'type' => 'textarea',
                'desc' => __('Show this message instead of Add To Cart Button', 'scheduled-catalog-mode-for-wc'),
                'id'   => 'wc_scheduled_catalog_mode_description'
            ),
            'from' => array(
                'name' => __('From:', 'scheduled-catalog-mode-for-wc'),
                'type' => 'time',
                'desc' => __('Select time to start catalog mode, you can scroll for other houres number', 'scheduled-catalog-mode-for-wc'),
                'id'   => 'wc_scheduled_catalog_mode_from',
                
            ),
            'to' => array(
                'name' => __('To:', 'scheduled-catalog-mode-for-wc'),
                'type' => 'time',
                'desc' => __('Select time to end catalog mode, you can scroll for other houres number', 'scheduled-catalog-mode-for-wc'),
                'id'   => 'wc_scheduled_catalog_mode_to'
            ),
            
            'section_end' => array(
                'type' => 'sectionend',
                'id' => 'wc_scheduled_catalog_mode_section_end'
            ),

            'section_title_days' => array(
                'name'     => __('Select the days that you want to schedule for', 'scheduled-catalog-mode-for-wc'),
                'type'     => 'title',
                'desc'     => '',
                'id'       => 'wc_scheduled_catalog_mode_section_title ',

            ),
            'Sunday' => array(
                'name' => __('Sunday', 'scheduled-catalog-mode-for-wc'),
                'type' => 'checkbox',
                'id'   => 'wc_scheduled_catalog_mode_sunday',

            ),
            'Monday' => array(
                'name' => __('Monday', 'scheduled-catalog-mode-for-wc'),
                'type' => 'checkbox',
                'id'   => 'wc_scheduled_catalog_mode_monday',

            ),
            'Tuesday'  => array(
                'name' => __('Tuesday', 'scheduled-catalog-mode-for-wc'),
                'type' => 'checkbox',
                'id'   => 'wc_scheduled_catalog_mode_tuesday',

            ),
            'Wednesday' => array(
                'name' => __('Wednesday', 'scheduled-catalog-mode-for-wc'),
                'type' => 'checkbox',
                'id'   => 'wc_scheduled_catalog_mode_wednesday',

            ),
            'Thursday' => array(
                'name' => __('Thursday', 'scheduled-catalog-mode-for-wc'),
                'type' => 'checkbox',
                'id'   => 'wc_scheduled_catalog_mode_thursday',

            ),
            'Friday' => array(
                'name' => __('Friday', 'scheduled-catalog-mode-for-wc'),
                'type' => 'checkbox',
                'id'   => 'wc_scheduled_catalog_mode_friday',

            ),
            'Saturday' => array(
                'name' => __('Saturday', 'scheduled-catalog-mode-for-wc'),
                'type' => 'checkbox',
                'id'   => 'wc_scheduled_catalog_mode_saturday',

            ),
            'section_end_days' => array(
                'type'  => 'sectionend',
                'id'    => 'wc_scheduled_catalog_mode_section_end',
            ),
            'section_title_force' => array(
                'name'     => __('Force to catalog mode all time !', 'scheduled-catalog-mode-for-wc'),
                'type'     => 'title',
                'desc'     => __('by checking this Catalog mode is enabled for 24/7', 'scheduled-catalog-mode-for-wc'),

                'id'       => 'wc_scheduled_catalog_mode_section_title ',

            ),
            'Catalog Mode' => array(
                'name' => __('Catalog Mode', 'scheduled-catalog-mode-for-wc'),
                'type' => 'checkbox',
                'id'   => 'wc_scheduled_catalog_mode_forced',

            ),
            'section_end_force' => array(
                'type'  => 'sectionend',
                'id'    => 'wc_scheduled_catalog_mode_section_end',
            ),
            
        );

        return apply_filters('wc_settings_scheduled_catalog_mode_settings', $settings);
    }

}

WC_Settings_Scheduled_Catalog_Mode::init();