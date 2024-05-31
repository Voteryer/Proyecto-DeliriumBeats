<?php
  // src/controllers/EventoController.php
require_once __DIR__ . '/../models/Evento.php';

class EventoController {
    private $eventoModel;

    public function __construct($pdo) {
        $this->eventoModel = new Evento($pdo);
    }

    public function createEvento($nombre, $fecha_evento, $cartel_anunciador) {
        return $this->eventoModel->create($nombre, $fecha_evento, $cartel_anunciador);
    }

    public function getAllEventos() {
        return $this->eventoModel->readAll();
    }

    public function getEvento($id_evento) {
        return $this->eventoModel->read($id_evento);
    }

    public function updateEvento($id_evento, $nombre, $fecha_evento, $cartel_anunciador) {
        return $this->eventoModel->update($id_evento, $nombre, $fecha_evento, $cartel_anunciador);
    }

    public function deleteEvento($id_evento) {
        return $this->eventoModel->delete($id_evento);
    }
}
?>