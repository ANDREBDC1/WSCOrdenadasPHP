<?php

/*
 * conxao com banco de dados
 */

class ConnectionDb {

    private $url;
    private $dbName;
    private $userName;
    private $passaword;
    private $conn;

    function __construct() {
        $this->url = 'localhost';
        $this->dbName = '';
        $this->userName = 'root';
        $this->passaword = '';
    }

    public function Connect() {
        if ($this->conn == null) {
            $this->conn = mysqli_connect($this->url, $this->userName, $this->passaword, $this->dbName) or date('Erro de conexão!');
            return $this->conn;
        }
        return $this->conn;
    }

    public function ExecSql($query){
        return mysqli_query($this->Connect(), $query);
    }
    
    public function GetListdb($sql) {
        return mysqli_fetch_assoc($this->ExecSql($sql));
    }

}
