<?php

/**
 * Description of DateWs-class
 * @author André Rian
 */
class DateWs {

    public static function GetCurrentDate() {
        date_default_timezone_set('America/Sao_Paulo');
        $currentDate = date('Y-m-d H:i:s');
        return $currentDate;
    }
    
    public function FormatDate($date) {
        $dataFormat =  date_format($date,'d/m/Y H:i:s');
        return $dataFormat;
    }
    

}
