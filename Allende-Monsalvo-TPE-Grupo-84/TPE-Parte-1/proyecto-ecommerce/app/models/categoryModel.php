<?php
require_once 'config/db.php';

class CategoryModel
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

    public function getCategories()
    {
        $stmt = $this->conn->prepare("SELECT categorias.*, GROUP_CONCAT(juegos.Nombre) AS NombresJuegos FROM categorias LEFT JOIN juegos ON categorias.Id_categoria = juegos.Id_categoria
        GROUP BY categorias.Id_categoria ASC");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        $this->exitConn;

        return $result;
    }

    public function getCategoryById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM categorias WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        $this->exitConn;

        return $result;
    }
}
