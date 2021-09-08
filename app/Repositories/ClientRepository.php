<?php

namespace App\Repositories;

use App\Models\Client;
use App\Interfaces\RepositoryInterface;
use Illuminate\Support\Str;

class ClientRepository implements RepositoryInterface
{
    public function findById(int $id)
    {
        return Client::find($id);
    }

    public function fetchAll(string $orderBy = 'id', string $order = 'DESC', int $paginate = 15, string $search = '')
    {
        if ($search !== '') {
            return $this->fetchWithLikeWhere($orderBy, strtoupper($order), $paginate, $search);
        }

        return Client::with(['city'])->orderBy($orderBy, strtoupper($order))->paginate($paginate);
    }

    public function where(array $where)
    {
        return Client::where($where);
    }

    public function store(array $data): Client
    {
        $client = new Client();

        $client->uuid = Str::uuid();
        $client->type = $data['type'];
        $client->name = $data['name'];
        $client->cpf_cnpj = $data['cpf_cnpj'];
        $client->city_id = $data['city']['id'];
        $client->cep = $data['cep'];
        $client->district = $data['district'];
        $client->street = $data['street'];
        $client->number = $data['number'];
        $client->email = $data['email'];
        $client->phone = $data['phone'];
        $client->cell_phone = $data['cell_phone'];

        if (!$client->save()) {
            throw new \Exception('Registro não inserido');
        }

        return $client;
    }

    public function update(string $uuid, array $data)
    {
        $client = $this->where([
            'uuid' => $uuid
        ])->first();

        //$client->description = $data['description'];

        if (!$client->update()) {
            throw new \Exception('Registro não inserido');
        }
    }

    public function delete(string $uuid)
    {
        $client = $this->where([
            'uuid' => $uuid
        ])->first();

        if (!$client->delete()) {
            throw new \Exception('Registro não deletado');
        }

        return true;
    }

    public function fetchWithLikeWhere(string $orderBy, string $order, int $paginate, string $search)
    {
        return Client::where('id', 'LIKE', "%{$search}%")
        ->with(['city'])
        ->orWhere('name', 'LIKE', "%{$search}%")
        ->orWhere('cpf_cnpj', 'LIKE', "%{$search}%")
        ->orWhere('street', 'LIKE', "%{$search}%")
        ->orWhere('email', 'LIKE', "%{$search}%")
        ->orWhere('phone', 'LIKE', "%{$search}%")
        ->orWhere('cell_phone', 'LIKE', "%{$search}%")
        ->orderBy($orderBy, $order)
        ->paginate($paginate);
    }
}
