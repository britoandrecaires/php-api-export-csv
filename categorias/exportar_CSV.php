<?php
ini_set('display_errors', '0');
ini_set('display_startup_errors', '0');
error_reporting(0);
include_once "../config/database.php";
include_once "../objects/categorias.php";

$database = new Database();
$db = $database->getConnection();

$categoria = new Categoria($db);

header("Content-Type: text/csv; charset=UTF-8");
header("Content-Disposition: attachment; filename=categorias.csv");
header("Pragma: no-cache");
header("Expires: 0");

echo $categoria->exportar_CSV();
exit;
