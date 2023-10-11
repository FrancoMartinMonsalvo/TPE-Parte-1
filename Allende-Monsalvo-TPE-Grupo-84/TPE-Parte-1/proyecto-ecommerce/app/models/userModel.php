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

    public function getByUsername($username)
    {
        $stmt = $this->conn->prepare("SELECT * FROM usuarios WHERE Username = :Username");
        $stmt->bindParam(':Username', $username);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        $this->closeConn;

        return $result;
    }

    public function createUser($Email, $Username, $Password)
    {
        $hashedPassword = password_hash($Password, PASSWORD_DEFAULT);
        $conn = $this->database->getConnection();

        $stmt = $conn->prepare("INSERT INTO usuarios (Email, Username, Password) VALUES (:Email, :Username, :Password)");
        $stmt->bindParam(':Email', $Email);
        $stmt->bindParam(':Username', $Username);
        $stmt->bindParam(':Password', $hashedPassword);

        $this->closeConn;

        return $stmt->execute();
    }
}
