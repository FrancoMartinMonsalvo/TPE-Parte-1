<?php
require_once 'config/db.php';

class GamesModel
{
    private $db;
    private $conn;
    private $exitConn;

    function __construct()
    {
        $this->db = new Database();
        $this->conn = $this->db->getConnection();
        $this->exitConn = $this->db->closeConnection();
    }

    public function getGames()
    {
        $stmt = $this->conn->prepare("SELECT juegos.*, categorias.Nombre AS Categoria FROM juegos JOIN categorias ON juegos.Id_categoria = categorias.Id_categoria");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        $this->exitConn;

        return $result;
    }
}
