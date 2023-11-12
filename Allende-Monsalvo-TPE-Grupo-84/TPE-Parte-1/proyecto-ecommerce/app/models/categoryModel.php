<?php
require_once './config/db.php';


class CategoryModel
{
    private $db;
    private $conn;
    private $closeConn;

    function __construct()
    {
        $this->db = new Database();
        $this->conn = $this->db->getConnection();
        $this->closeConn = $this->db->closeConnection();
    }

    public function getCategories()
    {
        $stmt = $this->conn->prepare("SELECT * FROM categorias");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);

        $this->closeConn;

        return $result;
    }

    public function getGamesByCategory($categoryId)
    {

        $stmt = $this->conn->prepare("SELECT juegos.*, categorias.Nombre AS nombreCategoria, categorias.Descripcion AS descCategoria, categorias.Cantidad_juegos AS cantidadJuegos FROM juegos
        INNER JOIN categorias ON juegos.Id_categoria = categorias.Id_categoria WHERE juegos.Id_categoria = :categoryId");
        $stmt->bindParam(':categoryId', $categoryId);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);

        $this->closeConn;

        return $result;
    }

    public function deleteCategory($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM categorias WHERE categorias.Id_categoria = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $this->closeConn;
    }

    public function addCategory($nombre, $descripcion)
    {
        $stmt = $this->conn->prepare("INSERT INTO categorias (Nombre, Descripcion) VALUES (:nombre, :descripcion)");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->execute();

        $this->closeConn;

        return $this->conn->lastInsertId();
    }

    public function updateCategory($id, $nombre, $descripcion)
    {
        try {
            $stmt = $this->conn->prepare("UPDATE categorias SET Nombre = :nombre, Descripcion = :descripcion WHERE Id_categoria = :id");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':descripcion', $descripcion);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    function gameCount($id, $sign)
    {
        $query = $this->conn->prepare("UPDATE categorias SET Cantidad_juegos = Cantidad_juegos $sign 1 WHERE Id_categoria = :id");
        $query->bindParam(':id', $id);
        $query->execute();
    }
}
