<?php

namespace App\Repositories;

use App\Models\State;
use App\Interfaces\RepositoryInterface;

class StateRepository implements RepositoryInterface
{
    public function findById(int $id)
    {
        return State::find($id);
    }

    public function fetchAll(string $orderBy = 'id', string $order = 'DESC', int $paginate = 30, string $search = '')
    {
        if ($search !== '') {
            return $this->fetchWithLikeWhere($orderBy, strtoupper($order), $paginate, $search);
        }

        return State::select('id', 'name as label')->orderBy($orderBy)->get();
    }

    public function where(array $where)
    {
        return State::select('id', 'name as label')->where($where);
    }

    public function store(array $data): State
    {
        $state = new State();

        if (!$state->save()) {
            throw new \Exception('Registro não inserido');
        }

        return $state;
    }

    public function update(string $uuid, array $data)
    {
        $state = $this->where([
            'uuid' => $uuid
        ])->first();

        if (!$state->update()) {
            throw new \Exception('Registro não inserido');
        }
    }

    public function delete(string $uuid)
    {
        $state = $this->where([
            'uuid' => $uuid
        ])->first();

        if (!$state->delete()) {
            throw new \Exception('Registro não deletado');
        }

        return true;
    }

    public function fetchWithLikeWhere(string $orderBy, string $order, int $paginate, string $search)
    {
        return State::select('id', 'name as label')->where('id', 'LIKE', "%{$search}%")
        ->orWhere('name', 'LIKE', "%{$search}%")
        ->orWhere('abbreviation', 'LIKE', "%{$search}%")
        ->orderBy($orderBy, $order)->get();
    }
}
