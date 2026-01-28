<?php
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: http://localhost:3000");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");


include_once "../config/database.php";
include_once "../objects/categorias.php";

$database = new Database();
$db = $database->getConnection();

$categoria = new Categoria($db);

$stmt = $categoria->listar();
$num = $stmt->rowCount();

$categorias_arr = [];

if ($num > 0) {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $categorias_arr[] = [
            "id" => $id,
            "nome" => $nome,
            "descricao" => $descricao,
            "criacao" => $criacao
        ];
    }
}

echo json_encode($categorias_arr);
