<?php

namespace App\Controllers; // 👈 Corrigé : App\Controllers avec un "s"

use App\Models\ServiceModel; // 👈 Corrigé : App\Models avec un "s"

class ServiceController
{
    private ServiceModel $serviceModel;

    public function __construct()
    {
        $this->serviceModel = new ServiceModel();
    }

    /**
     * Affiche la liste des services
     */
    public function index(): void
    {
        $services = $this->serviceModel->getAllServices();
        
        // Rendu de la vue
        require_once __DIR__ . '/../../views/services/index.php';
    }
}