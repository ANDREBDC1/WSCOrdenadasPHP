<?php
include ('dao/CoordinateDAO-Class.php');
include ('dao/DateWs-class.php');
$response = array();
$response['erro'] = true;

    
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json; charset=utf-8');

    $json = file_get_contents('php://input');
    $obj = json_decode($json, true);
    $result = CoordinateDAO::InsertCoordinate($obj["Latitude"], $obj['Longitude'], DateWs::GetCurrentDate(), $obj['IMEI']);
    if ($result) {
        $response ['msg'] = "Cadastrado realizado com sucesso!";
        $response ['erro'] = false;
        
        echo json_encode($response);
    } else {
        $response ['msg'] = "Erro ao cadastra!";
        $response ['erro'] = true;
        echo json_encode($response);
    }
} else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    //var_dump($_GET);exit;
    if (count($_GET) > 0) {
        $imei = $_GET['IMEI'];
        $result = CoordinateDAO::SelectCoordinateImei($imei);
        echo json_encode($result);
    } else {
        $response ['msg'] = "Erro paramentro incorreto!";
        $response ['erro'] = true;
        echo json_encode($response);
    }
} else if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {


    if (count($_GET) > 0) {
        
        $id = $_GET['Id'];
        $result = CoordinateDAO::DeleteCoordinate($id);
        $response = array($result);
        echo json_encode($response);
    } else {
         $response ['msg'] = "Erro paramentro incorreto!";
          $response['erro'] = true;
        echo json_encode($response);
    }
} else {
    
     $response ['msg'] = "Erro requisição não encontrada";
      $response ['erro'] = true;
    echo json_encode($response);
}
