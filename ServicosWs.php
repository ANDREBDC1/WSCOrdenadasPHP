<?php
include ('dao/CoordinateDAO-Class.php');
include ('dao/DateWs-class.php');
$response = array();
$response['erro'] = true;

    
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json; charset=utf-8');

    $json = file_get_contents('php://input');
    $obj = json_decode($json, true);
    $result = CoordinateDAO::InsertCoordinate($obj->Latitude, $obj->Logitude, DateWs::GetCurrentDate(), $obj->IMEI);
    if ($result) {
        $response = array('msg' => "Cadastrado com sucesso!",
            'erro' => false
        );
        echo json_encode($response);
    } else {
        $response = array('msg' => "Erro ao inserir!",
            'erro' => true
        );
        echo json_encode($response);
    }
} else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    //var_dump($_GET);exit;
    if (count($_GET) > 0) {
        $imei = $_GET['IMEI'];
        $result = CoordinateDAO::SelectCoordinateImei($imei);
        
        $response ['json'] = $result;
        $response ['erro'] = false;
        echo json_encode($response);
    } else {
        $response ['msg'] = "Erro paramentro incorreto!";
        $response ['erro'] = true;
        echo json_encode($response);
    }
} else if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {


    if ($_GET['Id'] != null) {

        $id = $_GET['Id'];
        $result = CoordinateDAO::DeleteCoordinate($id);
        $response = array($result);
        echo json_encode($response);
    } else {
        $response = array('msg' => "Erro paramentro incorreto!",
            'erro' => true
        );
        echo json_encode($response);
    }
} else {
    $response = array('msg' => "Erro requisição não encontrada",
        'erro' => true
    );
    echo json_encode($response);
}
