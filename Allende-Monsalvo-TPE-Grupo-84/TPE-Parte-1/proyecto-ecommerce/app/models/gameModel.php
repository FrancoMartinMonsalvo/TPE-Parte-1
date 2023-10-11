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
        $stmt = $this->conn->prepare("DELETE FROM juegos WHERE Id_juego = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $this->closeConn;
    }

    public function addGame($categoriaJuego, $nombreJuego, $precio, $imagen)
    {
        $stmt = $this->conn->prepare("INSERT INTO juegos (Id_categoria, Nombre, Precio, Imagen) VALUES (:id_categoria, :nombre, :precio, :imagen)");
        $stmt->bindParam(':id_categoria', $categoriaJuego);
        $stmt->bindParam(':nombre', $nombreJuego);
        $stmt->bindParam(':precio', $precio);
        $stmt->bindParam(':imagen', $imagen);
        $stmt->execute();

        $this->closeConn;

        return $this->conn->lastInsertId();
    }

    public function updateGame($id, $categoriaJuego, $nombreJuego, $precio, $imagen)
    {
        try {
            $stmt = $this->conn->prepare("UPDATE juegos SET Id_categoria = :id_categoria, Nombre = :nombre, Precio = :precio, Imagen = :imagen WHERE Id_juego = :id");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':id_categoria', $categoriaJuego);
            $stmt->bindParam(':nombre', $nombreJuego);
            $stmt->bindParam(':precio', $precio);
            $stmt->bindParam(':imagen', $imagen);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}
