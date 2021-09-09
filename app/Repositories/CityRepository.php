<?php

namespace App\Repositories;

use App\Models\City;
use App\Interfaces\RepositoryInterface;

class CityRepository implements RepositoryInterface
{
    public function findById(int $id)
    {
        return City::find($id);
    }

    public function fetchAll(string $orderBy = 'id', string $order = 'DESC', int $paginate = 15, string $search = '')
    {
        if ($search !== '') {
            return $this->fetchWithLikeWhere($orderBy, strtoupper($order), $paginate, $search);
        }

        return City::select('id', 'name as label')->orderBy($orderBy)->get();
    }

    public function where(array $where)
    {
        return City::with(['state'])->where($where);
    }

    public function store(array $data): City
    {
        $city = new City();

        if (!$city->save()) {
            throw new \Exception('Registro não inserido');
        }

        return $city;
    }

    public function update(string $uuid, array $data)
    {
        $city = $this->where([
            'uuid' => $uuid
        ])->first();

        //$city->description = $data['description'];

        if (!$city->update()) {
            throw new \Exception('Registro não inserido');
        }
    }

    public function delete(string $uuid)
    {
        $city = $this->where([
            'uuid' => $uuid
        ])->first();

        if (!$city->delete()) {
            throw new \Exception('Registro não deletado');
        }

        return true;
    }

    public function fetchWithLikeWhere(string $orderBy, string $order, int $paginate, string $search)
    {
        return City::select('id', 'name as label')
            ->where('id', 'LIKE', "%{$search}%")
            ->orWhere('name', 'LIKE', "%{$search}%")
            ->orWhere('ibge_code', 'LIKE', "%{$search}%")
            ->orderBy($orderBy, $order)->get();
    }

    public function citiesByState(string $stateId)
    {
        return City::select('id', 'name as label')
            ->where('state_id', '=', $stateId)
            ->orderBy("name", "ASC")->get();
    }
}
