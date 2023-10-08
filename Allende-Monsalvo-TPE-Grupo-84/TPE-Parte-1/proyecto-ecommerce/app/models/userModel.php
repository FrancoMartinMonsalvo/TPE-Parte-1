<?php
require_once './config/db.php';


class UserModel {
    private $database;

    function __construct() {
        $this->database = new Database();
    }

    public function getByUsername($Username) {
        $conn = $this->database->getConnection();
        $query= $conn->prepare('SELECT * FROM usuarios WHERE Username = ?');
        $query->execute([$Username]);

        return $query->fetch(PDO::FETCH_OBJ);
    }
    public function createUser($Email, $Username, $Password)
    {
        $hashedPassword = password_hash($Password, PASSWORD_DEFAULT);
        $conn = $this->database->getConnection();
        
        $stmt = $conn->prepare("INSERT INTO usuarios (Email, Username, Password) VALUES (:Email, :Username, :Password)");
        $stmt->bindParam(':Email', $Email);
        $stmt->bindParam(':Username', $Username);
        $stmt->bindParam(':Password', $hashedPassword);
        return $stmt->execute();
    }
    public function verifyPassword($passwordFromDatabase, $passwordEnteredByUser)
    {
        return password_verify($passwordEnteredByUser, $passwordFromDatabase);
    }
}
