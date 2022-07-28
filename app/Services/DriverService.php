<?php

namespace App\Services;

use App\Repositories\DriverRepository;

class DriverService
{
    /** @var DriverRepository */
    protected DriverRepository $driverRepository;

    public function __construct()
    {
        $this->driverRepository = new DriverRepository();
    }

    /**
     * @return array
     */
    public function all(): array
    {

        $result = [
            'success' => false,
            'drivers' => null
        ];

        $drivers = $this->driverRepository->all();

        if ($drivers['success'] && !empty($drivers['drivers'])) {
            $result = [
                'success' => true,
                'drivers' => $drivers['drivers']
            ];
        }

        return $result;
    }

}