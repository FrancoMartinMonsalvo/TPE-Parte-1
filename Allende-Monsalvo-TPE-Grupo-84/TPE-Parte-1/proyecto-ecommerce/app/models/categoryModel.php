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
        $stmt = $this->conn->prepare("SELECT categorias.*, GROUP_CONCAT(juegos.Nombre) AS NombresJuegos, GROUP_CONCAT(juegos.Imagen) AS ImagenesJuegos FROM categorias JOIN juegos ON categorias.Id_categoria = juegos.Id_categoria
        GROUP BY categorias.Id_categoria ASC");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        $this->exitConn;

        return $result;
    }
}
