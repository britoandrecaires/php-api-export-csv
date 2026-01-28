<?php

include_once '../config/database.php';
include_once '../objects/categorias.php';

// Gerar CSV
$database = new Database();
$db = $database->getConnection();
$categoria = new Categoria($db);
$csv = $categoria->exportar_CSV();

// Headers FORÇADOS
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="categorias.csv"');
header('Content-Length: ' . strlen($csv));
header('Pragma: no-cache');
header('Expires: 0');

echo $csv;
exit;
