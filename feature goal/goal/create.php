<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");


include_once '../config/database.php';
include_once '../models/goal.php';

$database = new Database();
$db = $database->getConnection();

$goal = new Goal($db);

if (
    !empty($_POST['name']) &&
    !empty($_POST['description'])
) {


    $goal->name = $_POST['name'];
    $goal->description = $_POST['description'];




    if ($goal->create()) {

        http_response_code(201);
        echo json_encode(array("message" => "Пользователь был создан."));
    } else {
        http_response_code(503);

        echo json_encode(["message" => "Невозможно создать пользователя."]);
    }
} else {

    http_response_code(400);

    echo json_encode(["message" => "Невозможно создать пользователя. Данные неполные."]);
}