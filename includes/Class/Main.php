<?php

namespace scheduleCatalogTime\Classes;

require 'TimeValidation.php';


class schedule_Catalog_Mode
{


    /**
     * main core function that check if Force catalog mode is activate or now we are in catalog mode schedules then run catalog Mode function
     */
    public function start(validtime $timeValidator){

        if(get_option('wc_scheduled_catalog_mode_forced', true )=="yes"){
            return self::catalogMode();
        }
        if(get_option('wc_scheduled_catalog_mode_'.$timeValidator->nowDay() , true )=="yes"){
            $timeValidator->is_time(get_option('wc_scheduled_catalog_mode_from',true),get_option('wc_scheduled_catalog_mode_to', true )) ? self::catalogMode():'';
        }
    }

    /**
     * catalogMode function is going to remove woocommerce_is_purchasable filter so then there is no Add To Cart Botton!
     */
    private static function catalogMode()
    {
        add_action('woocommerce_product_meta_start',function(){
            echo esc_html(get_option('wc_scheduled_catalog_mode_description', true ));
        });
        return add_filter('woocommerce_is_purchasable', '__return_false');

    }

}


