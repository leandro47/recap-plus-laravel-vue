<?php

namespace App\Interfaces;

interface RepositoryInterface
{
    public function findById(int $id);

    public function fetchAll(
        string $orderBy,
        string $order,
        int $paginate,
        string $search
    );

    public function where(array $where);

    public function store(array $data);

    public function update(string $uuid, array $data);

    public function delete(string $uuid);

    public function fetchWithLikeWhere(
        string $orderBy,
        string $order,
        int $paginate,
        string $search
    );
}
