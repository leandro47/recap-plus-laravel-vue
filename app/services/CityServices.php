<?php

namespace App\services;

use App\Models\City;

class CityServices
{
    public function selectCityFormat(City $city)
    {
        $data['city']['label'] = $city->name;
        $data['city']['id'] = $city->id;
        $data['state']['label'] = $city->state->name;
        $data['state']['id'] = $city->state->id;

        return $data;
    }
}
