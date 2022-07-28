<?php

namespace App\Repositories;

class DriverRepository

{

    /**
     * @return array
     */
    public function all(): array
    {
        $result = [
            'success' => false,
            'drivers' => null,
        ];

        $url = 'https://interview-test.tachodev.com/drivers?api_key=' . $_ENV['API_KEY'];
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        $response = curl_exec($ch);
        $drivers = json_decode($response, true);

        if (!empty($drivers)) {

            $result = [
                'success' => true,
                'drivers' => $drivers,
            ];
            curl_close($ch);
        }
        return $result;
    }
}