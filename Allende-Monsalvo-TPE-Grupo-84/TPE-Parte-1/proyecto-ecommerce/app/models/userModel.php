<?php
require_once './config/db.php';


class UserModel
{
    private $database;
    private $conn;
    private $closeConn;

    function __construct()
    {
        $this->database = new Database();
        $this->conn = $this->database->getConnection();
        $this->closeConn = $this->database->closeConnection();
    }

    public function getAllUsers()
    {
        $stmt = $this->conn->prepare("SELECT * FROM usuarios");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        $this->closeConn;

        return $result;
    }

    public function getByUsername($username)
    {
        $stmt = $this->conn->prepare("SELECT * FROM usuarios WHERE Username = :Username");
        $stmt->bindParam(':Username', $username);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        $this->closeConn;

        return $result;
    }

    public function createUser($email, $username, $password)
    {
        try {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $this->conn->prepare("INSERT INTO usuarios (Email, Username, Password) VALUES (:email, :username, :password)");
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $hashedPassword);
            $stmt->execute();

            $this->closeConn;

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function upgradeToAdmin($id)
    {
        try {
            $stmt = $this->conn->prepare("UPDATE usuarios SET EsAdmin = 1 WHERE Id_usuario = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $this->closeConn;

            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}
