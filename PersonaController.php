<?php
  // src/controllers/PersonaController.php
require_once __DIR__ . '/../models/Persona.php';

class PersonaController {
    private $personaModel;

    public function __construct($pdo) {
        $this->personaModel = new Persona($pdo);
    }
                    //createPersona($dni, $nombre, $apellido1, $apellido2, $email, $passwd, $fecha_nacimiento);
    public function createPersona($dni, $nombre, $apellido1, $apellido2, $email, $passwd, $fecha_nacimiento) {
        return $this->personaModel->create($dni, $nombre, $apellido1, $apellido2, $email, $passwd, $fecha_nacimiento);
    }

    public function getAllPersonas() {
        return $this->personaModel->readAll();
    }

    public function getPersona($id) {
        return $this->personaModel->read($id);
    }

    public function updatePersona($dni, $nombre, $apellido1, $apellido2, $email, $passwd, $fecha_nacimiento) {
        return $this->personaModel->update($dni, $nombre, $apellido1, $apellido2, $email, $passwd, $fecha_nacimiento);
    }

    public function deletePersona($id) {
        return $this->personaModel->delete($id);
    }
}
?>