<?php
// src/models/Persona.php
class Persona {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    /*public function create($dni, $nombre, $apellido1, $apellido2, $email, $password, $fecha_nacimiento) {
        $sql = "INSERT INTO PERSONAS (dni, nombre, apellido1, apellido2, email, password, fecha_nacimiento) VALUES (:dni, :nombre, :apellido1, :apellido2, :email, :password, :fecha_nacimiento)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':dni', $dni);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido1', $apellido1);
        $stmt->bindParam(':apellido2', $apellido2);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':fecha_nacimiento', $fecha_nacimiento);
        return $stmt->execute();
    }*/
                    //create($dni, $nombre, $apellido1, $apellido2, $email, $passwd, $fecha_nacimiento);
    public function create($dni, $nombre, $apellido1, $apellido2, $email, $passwd, $fecha_nacimiento) {
        try {
            $sql = "INSERT INTO PERSONAS (dni, nombre, apellido1, apellido2, email, persona_password, fecha_nacimiento) VALUES (:dni, :nombre, :apellido1, :apellido2, :email, :passwd, :fecha_nacimiento)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':dni', $dni);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':apellido1', $apellido1);
            $stmt->bindParam(':apellido2', $apellido2);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':passwd', $passwd);
            $stmt->bindParam(':fecha_nacimiento', $fecha_nacimiento);
            return $stmt->execute();
        }
        catch ( PDOException $e ) {
            // Manejar el error
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function readAll() {
        $sql = "SELECT * FROM PERSONAS";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function read($id) {
        $sql = "SELECT * FROM PERSONAS WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $dni, $nombre, $apellido1, $apellido2, $email, $passwd, $fecha_nacimiento) {
        $sql = "UPDATE PERSONAS SET dni = :dni, nombre=:nombre, apellido1=:apellido1, apellido2=:apellido2, email=:email, persona_password=:passwd, fecha_nacimiento=:fecha_nacimiento WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':dni', $dni);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido1', $apellido1);
        $stmt->bindParam(':apellido2', $apellido2);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':passwd', $passwd);
        $stmt->bindParam(':fecha_nacimiento', $fecha_nacimiento);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $sql = "DELETE FROM PERSONAS WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>