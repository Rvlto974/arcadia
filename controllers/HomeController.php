<?php
// /var/www/html/controllers/HomeController.php

require_once __DIR__ . '/../models/Habitat.php'; 

class HomeController {
    public function index() {
        // 1. Récupérer tous les habitats depuis la base de données
        $habitatModel = new Habitat();
        $habitats = $habitatModel->findAll();

        // 2. Charger la vue principale depuis le dossier views/layouts/
        require_once __DIR__ . '/../views/layouts/main.php'; 
    }
}