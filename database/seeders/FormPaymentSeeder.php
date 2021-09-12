<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class FormPaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $id = 1;
        DB::table('form_payments')->insert([
            ['id' => $id++,   'uuid' => Str::uuid(), 'description' => '10/20', 'enable' => 'Y', 'created_at'=> now(), 'updated_at'=> null, 'deleted_at'=> null],
            ['id' => $id++, 'uuid' => Str::uuid(), 'description' => '10/15/20', 'enable' => 'Y', 'created_at'=> now(), 'updated_at'=> null, 'deleted_at'=> null],
            ['id' => $id++, 'uuid' => Str::uuid(), 'description' => 'A vista', 'enable' => 'Y', 'created_at'=> now(), 'updated_at'=> null, 'deleted_at'=> null],
            ['id' => $id++, 'uuid' => Str::uuid(), 'description' => 'Cartão master', 'enable' => 'Y', 'created_at'=> now(), 'updated_at'=> null, 'deleted_at'=> null],
            ['id' => $id++, 'uuid' => Str::uuid(), 'description' => 'Cartão Visa', 'enable' => 'Y', 'created_at'=> now(), 'updated_at'=> null, 'deleted_at'=> null],
            ['id' => $id++, 'uuid' => Str::uuid(), 'description' => '07 dias', 'enable' => 'Y', 'created_at'=> now(), 'updated_at'=> null, 'deleted_at'=> null],
            ['id' => $id++, 'uuid' => Str::uuid(), 'description' => '15 dias', 'enable' => 'Y', 'created_at'=> now(), 'updated_at'=> null, 'deleted_at'=> null],
            ['id' => $id++, 'uuid' => Str::uuid(), 'description' => '2x 28/56', 'enable' => 'Y', 'created_at'=> now(), 'updated_at'=> null, 'deleted_at'=> null],
            ['id' => $id++, 'uuid' => Str::uuid(), 'description' => '4x 28/56/84/112', 'enable' => 'Y', 'created_at'=> now(), 'updated_at'=> null, 'deleted_at'=> null],
            ['id' => $id++, 'uuid' => Str::uuid(), 'description' => 'Débito Master', 'enable' => 'Y', 'created_at'=> now(), 'updated_at'=> null, 'deleted_at'=> null],
            ['id' => $id++, 'uuid' => Str::uuid(), 'description' => '60 dias', 'enable' => 'Y', 'created_at'=> now(), 'updated_at'=> null, 'deleted_at'=> null],
            ['id' => $id++, 'uuid' => Str::uuid(), 'description' => '03 dias', 'enable' => 'Y', 'created_at'=> now(), 'updated_at'=> null, 'deleted_at'=> null],
            ['id' => $id++, 'uuid' => Str::uuid(), 'description' => 'Cheque', 'enable' => 'Y', 'created_at'=> now(), 'updated_at'=> null, 'deleted_at'=> null],
            ['id' => $id++, 'uuid' => Str::uuid(), 'description' => '18x Boleto', 'enable' => 'Y', 'created_at'=> now(), 'updated_at'=> null, 'deleted_at'=> null],
            ['id' => $id++, 'uuid' => Str::uuid(), 'description' => 'Garantia', 'enable' => 'Y', 'created_at'=> now(), 'updated_at'=> null, 'deleted_at'=> null],
            ['id' => $id++, 'uuid' => Str::uuid(), 'description' => 'Faturamento especial', 'enable' => 'Y', 'created_at'=> now(), 'updated_at'=> null, 'deleted_at'=> null],
            ['id' => $id++, 'uuid' => Str::uuid(), 'description' => 'Outros cartões', 'enable' => 'Y', 'created_at'=> now(), 'updated_at'=> null, 'deleted_at'=> null],
        ]);
    }
}
