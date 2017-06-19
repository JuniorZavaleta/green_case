<?php

namespace App\Services;

use Log;

class LimaException extends \Exception
{
    public function __construct()
    {
        parent::__construct("Ubicación fuera de Lima.");
    }
}

class GMaps
{
    public function __construct()
    {
        $this->base_url = 'https://maps.googleapis.com/maps/api/geocode/json';
        $this->key = env('GOOGLE_MAPS_KEY');
    }

    private function checkLima($results)
    {
        $departament_types = ['colloquial_area', 'locality', 'political'];

        foreach ($results as $result) {
            foreach ($result['address_components'] as $item) {
                if ($item['types'] == $departament_types && $item['long_name'] == 'Lima') {
                    return true;
                }
            }
        }

        return false;
    }

    public function getDistrictName($lat, $lng)
    {
        $url = "{$this->base_url}?latlng={$lat},{$lng}&location_type=APPROXIMATE&result_type=locality&key={$this->key}";

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $results = json_decode(curl_exec($ch), true);

        $district_types = ['locality', 'political'];

        if ($results['status'] == 'OK') {
            $data = $results['results'];

            if ($this->checkLima($data)) {
                foreach ($data as $result) {
                    foreach ($result['address_components'] as $item) {
                        if ($item['types'] == $district_types) {
                            return $item['long_name'];
                        }
                    }
                }
            } else {
                throw new LimaException;
            }
        }

        Log::error(print_r($response, true));
    }
}
