<?php

namespace App\Controllers;

use App\Services\DriverService;

class DriverController
{

    /** @var DriverService */
    protected DriverService $driverService;

    public function __construct()
    {
        $this->driverService = new DriverService();
    }

    public function index()
    {

        $result = $this->driverService->all();

        $drivers = [];
        if ($result['success'] && !empty($result['drivers'])) {
            $drivers = $result['drivers'];
        }
        return require_once __DIR__ . '/../Views/DashboardView.php';

    }
}
