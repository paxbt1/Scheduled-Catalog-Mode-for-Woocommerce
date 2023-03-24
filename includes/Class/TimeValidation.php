<?php

namespace scheduleCatalogTime\Classes;

class validtime
{

    public function __construct()
    {
        date_default_timezone_set(get_option('timezone_string'));
    }

    public function nowTime(){
        return date('Hi', $_SERVER['REQUEST_TIME']);
    }
    public function nowDay(){
        return date('l', $_SERVER['REQUEST_TIME']);
    }

    public function is_time($from,$to)
    {       
        if($this->nowTime()>=str_replace(':', '', $from)  && $this->nowTime() <= str_replace(':', '', $to) ){
            return true;
        }
        else{
        return false;}
    }

}