<?php
// src/models/Evento.php
class Evento {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function create($nombre, $fecha_evento, $cartel_anunciador) {
        $sql = "INSERT INTO FIESTAS (nombre, fecha_evento, cartel_anunciador) VALUES (:nombre, :fecha_evento, :cartel_anunciador)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':fecha_evento', $fecha_evento);
        $stmt->bindParam(':cartel_anunciador', $cartel_anunciador, PDO::PARAM_LOB);
        return $stmt->execute();
    }

    public function readAll() {
        $sql = "SELECT * FROM FIESTAS";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function read($id_evento) {
        $sql = "SELECT * FROM FIESTAS WHERE id_evento = :id_evento";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_evento', $id_evento);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id_evento, $nombre, $fecha_evento, $cartel_anunciador) {
        $sql = "UPDATE FIESTAS SET nombre = :nombre, fecha_evento = :fecha_evento, cartel_anunciador = :cartel_anunciador WHERE id_evento = :id_evento";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':fecha_evento', $fecha_evento);
        $stmt->bindParam(':cartel_anunciador', $cartel_anunciador, PDO::PARAM_LOB);
        $stmt->bindParam(':id_evento', $id_evento);
        return $stmt->execute();
    }

    public function delete($id_evento) {
        $sql = "DELETE FROM FIESTAS WHERE id_evento = :id_evento";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_evento', $id_evento);
        return $stmt->execute();
    }
}
?>