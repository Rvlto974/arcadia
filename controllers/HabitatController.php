<?php

require_once __DIR__ . '/../models/Habitat.php';

class HabitatController {
    public function index() {
        $habitatModel = new Habitat();
        $habitats = $habitatModel->findAll();

        require_once __DIR__ . '/../views/habitats.php';
    }
}