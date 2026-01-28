<?php

class Categoria {
    private $conn;
    private $table_name = "categorias";

    public $id, $nome, $descricao, $criacao;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Exporta categorias para CSV (separado por ;)
    public function exportar_CSV() {
        $qry = "SELECT id, nome, descricao, criacao FROM {$this->table_name}";
        $st = $this->conn->prepare($qry);
        $st->execute();

        // Cabeçalho CSV
        $output = "ID;Nome;Descrição;Criação\n";

        while ($row = $st->fetch(PDO::FETCH_ASSOC)) {
            $output .=
                $row['id'] . ';"' .
                $row['nome'] . '";"' .
                $row['descricao'] . '";"' .
                $row['criacao'] . "\"\n";
        }

        return $output;
    }
}
?>
