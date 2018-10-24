<?php
/**
 * Description of CoordinateDAO-Class
 *
 * @author Usuario
 */
include ('CoordinateDb-Class.php');
class CoordinateDAO {
    
    public static function InsertCoordinate($latitude, $logitude, $data, $imei) {
        $con = new CoordinateDb();
        $result = $con->Insert($latitude,$logitude,$data,$imei);
        return $result;
    }
    
    public static function SelectCoordinateImei($imei) {
        $con = new CoordinateDb();
        $result = $con->SelectAllImei($imei);
        return $result;
    }
    
     public static function SelectCoordinateALL() {
        $con = new CoordinateDb();
        $result = $con->SelectAll();
        return $result;
    }
    
    public static function UpadateCoordinate($id, $latitude, $logitude, $data, $imei) {
        $con = new CoordinateDb();
        $result = $con->Upadate($id, $latitude, $logitude, $data, $imei);
        return $result;
    }
       
       

}
