<?php

namespace App\Repositories;

use App\Models\FormPayment;
use App\Interfaces\RepositoryInterface;
use Illuminate\Support\Str;

class FormPaymentRepository implements RepositoryInterface
{
    public function findById(int $id)
    {
        return FormPayment::find($id);
    }

    public function fetchAll(string $orderBy = 'id', string $order = 'DESC', int $paginate = 15, string $search = '')
    {
        if ($search !== '') {
            return $this->fetchWithLikeWhere($orderBy, strtoupper($order), $paginate, $search);
        }

        return FormPayment::orderBy($orderBy, strtoupper($order))->paginate($paginate);
    }

    public function where(array $where)
    {
        return FormPayment::where($where);
    }

    public function store(array $data): FormPayment
    {
        $formPayment = new FormPayment();

        $formPayment->uuid = Str::uuid();
        $formPayment->description = $data['description'];

        if (!$formPayment->save()) {
            throw new \Exception('Registro não inserido');
        }

        return $formPayment;
    }

    public function update(string $uuid, array $data)
    {
        $formPayment = $this->where([
            'uuid' => $uuid
        ])->first();

        $formPayment->description = $data['description'];
        $formPayment->enable = $data['enable'];

        if (!$formPayment->update()) {
            throw new \Exception('Registro não atualizado');
        }

        return $formPayment;
    }

    public function delete(string $uuid)
    {
        $formPayment = $this->where([
            'uuid' => $uuid
        ])->first();

        if (!$formPayment->delete()) {
            throw new \Exception('Registro não deletado');
        }

        return true;
    }

    public function fetchWithLikeWhere(string $orderBy, string $order, int $paginate, string $search)
    {
        return FormPayment::where('id', 'LIKE', "%{$search}%")
        ->orWhere('description', 'LIKE', "%{$search}%")
        ->orderBy($orderBy, $order)
        ->paginate($paginate);
    }
}
