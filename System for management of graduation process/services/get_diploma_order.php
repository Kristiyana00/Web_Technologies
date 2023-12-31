<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");

include '../database/db_conf.php';

$data_array = array();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $database = new Db();
    $conn = $database->getConnection();
    $stmt = $conn->prepare("SELECT * 
                            FROM diploma_order");
    $stmt->execute();

    $rows = $stmt->fetchAll();

    if(count($rows) != 1) {
        $response = array("success" => false, "message" => "Все още няма генериран пореден списък за връчване на дипломи.");
        echo json_encode($response);
        http_response_code(200);
        die;
    }

    $response = array("success" => true, "order" => $rows);
    echo json_encode($response);
    http_response_code(200);
}
