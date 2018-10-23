<?php
/**
 * Description of CoordinateDAO-Class
 *
 * @author Usuario
 */
include_once './CoordinateDb-Class.php';
class CoordinateDAO {
    
    public static function InsertCoordinate($latitude, $logitude, $data, $imei) {
        
    }
    
    public static function SelectCoordinateImei($imei) {
        $con = new CoordinateDb();
        $result = $con->SelectAllImei($imei);
        return $result;
    
    }
       
       

}
