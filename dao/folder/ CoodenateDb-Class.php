<?php

/**
 * Description of ConnectionDbPDO-class
 *
 * @author Usuario
 */
include_once './Conection-Class.php';

class CoodinateDb {

    private $pdo;

    function __construct() {
        
    }

    function Connect() {
        try {
            if (pdo == null) {
                $this->pdo = new PDO('mysql:host=' . Connection::$URL . ';dbname=' . Connection::$DB_NAME, Connection::$USER_NAME, Connection::$PASSAWORD);
            }
        } catch (Exception $ex) {
            echo 'Erro ao conectar com o MySQL: ' . $ex->getMessage();
        }
    }

    public function insert($latitude, $logitude, $data, $imei) {
        try {
            $this->Connect();
            $query = "INSERT INTO Cordenadas (Latitude,Longitude,Data,IMEI) VALUES(:Latitude,:Longitude,:Data,:IMEI)";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':Latitude', $latitude);
            $stmt->bindParam(':Longitude', $logitude);
            $stmt->bindParam(':Data', $data);
            $stmt->bindParam(':IMEI', $imei);
            $result = $stmt->execute();
            if (!$result) {
                return FALSE;
            }
            return TRUE;
        } catch (Exception $ex) {
            echo 'Erro ao Inserir: ' . $ex->getMessage();
        }
    }

    function DeleteById($Id) {
        try {
            $this->Connect();
            $query = "DELETE FROM Cordenadas WHERE Id= :Id";
            $stmt = $PDO->prepare($sql);
            $stmt->bindParam(':Id', $Id);
            $result = $stmt->execute();
            if (!$result) {
                return FALSE;
            }
            return TRUE;
        } catch (Exception $ex) {
            echo 'Erro ao Deletar: ' . $ex->getMessage();
        }
    }
    
    
     public function Upadate($id,$latitude, $logitude, $data, $imei) {
        try {
            $this->Connect();
            $query = "UPDATE Cordenadas SET Id= :Id, Latitude=:Latitude,Longitude=:Longitude,Data=:Data,IMEI= :IMEI  WHERE Id= :Id";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':Latitude', $latitude,PDO::PARAM_INT);
            $stmt->bindParam(':Longitude', $logitude, PDO::PARAM_INT);
            $stmt->bindParam(':Data', $data);
            $stmt->bindParam(':IMEI', $imei);
             $stmt->bindParam(':Id', $id, PDO::PARAM_INT);
            $result = $stmt->execute();
            if (!$result) {
                return FALSE;
            }
            return TRUE;
        } catch (Exception $ex) {
            echo 'Erro ao Atualizar: ' . $ex->getMessage();
        }
    }
    
    public function SelectAll() {
        try {
            $this->Connect();
            $query = "SELECT * FROM  Cordenadas";
            $result = $this->pdo->query($query);
           
            $row = $result->fetchAll( PDO::FETCH_ASSOC );
            
            return $row;
        } catch (Exception $ex) {
            echo 'Erro ao Selecionar: ' . $ex->getMessage();
        }
    }
    
    public function SelectAllImei($imei) {
        try {
            $this->Connect();
            $query = "SELECT * FROM  Cordenadas IMEI = :IMEI";
             $stmt = $this->pdo->prepare($query);
             $result = $stmt->bindParam(':IMEI', $imei);
            $row = $result->fetchAll( PDO::FETCH_ASSOC );
            
            return $row;
        } catch (Exception $ex) {
            echo 'Erro ao Selecionar: ' . $ex->getMessage();
        }
    }

}
