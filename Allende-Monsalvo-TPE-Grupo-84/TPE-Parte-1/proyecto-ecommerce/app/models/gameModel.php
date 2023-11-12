<?php
require_once './config/db.php';


class GameModel
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

    public function getGames()
    {
        $stmt = $this->conn->prepare("SELECT juegos.*, categorias.Nombre AS Categoria FROM juegos JOIN categorias ON juegos.Id_categoria = categorias.Id_categoria GROUP BY juegos.Id_juego ASC");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        $this->closeConn;

        return $result;
    }

    public function deleteGame($id)
    {
        $stmt = $this->conn->prepare('SELECT Id_categoria FROM juegos WHERE Id_juego = :id');
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_OBJ);

        $stmt = $this->conn->prepare("DELETE FROM juegos WHERE Id_juego = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        if ($result) {
            $categotyId = $result->Id_categoria;
            $categoryModel = new CategoryModel();
            $categoryModel->gameCount($categotyId, '-');
        }

        $this->closeConn;
    }

    public function addGame($categoriaJuego, $nombreJuego, $descripcion, $precio, $imagen)
    {
        $stmt = $this->conn->prepare("INSERT INTO juegos (Id_categoria, Nombre, Descripcion, Precio, Imagen) VALUES (:id_categoria, :nombre, :descripcion, :precio, :imagen)");
        $stmt->bindParam(':id_categoria', $categoriaJuego);
        $stmt->bindParam(':nombre', $nombreJuego);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':precio', $precio);
        $stmt->bindParam(':imagen', $imagen);
        $stmt->execute();

        $categoryModel = new CategoryModel();
        $categoryModel->gameCount($categoriaJuego, '+');

        $this->closeConn;

        return $this->conn->lastInsertId();
    }

    public function updateGame($id, $categoriaJuego, $nombreJuego, $descripcion, $precio, $descuento, $precioDescuento, $imagen)
    {
        try {
            $stmt = $this->conn->prepare("UPDATE juegos SET Id_categoria = :id_categoria, Nombre = :nombre, Descripcion = :descripcion, Precio = :precio, Descuento = :descuento, PrecioDescuento = :precioDescuento, Imagen = :imagen WHERE Id_juego = :id");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':id_categoria', $categoriaJuego);
            $stmt->bindParam(':nombre', $nombreJuego);
            $stmt->bindParam(':descripcion', $descripcion);
            $stmt->bindParam(':precio', $precio);
            $stmt->bindParam(':descuento', $descuento);
            $stmt->bindParam(':precioDescuento', $precioDescuento);
            $stmt->bindParam(':imagen', $imagen);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}
