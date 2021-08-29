<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('states')->insert([
            ['id' => 1, 'uuid' => Str::uuid(), 'name' => 'Acre', 'abbreviation' => 'AC'],
            ['id' => 2, 'uuid' => Str::uuid(), 'name' => 'Alagoas', 'abbreviation' => 'AL'],
            ['id' => 3, 'uuid' => Str::uuid(), 'name' => 'Amapá', 'abbreviation' => 'AP'],
            ['id' => 4, 'uuid' => Str::uuid(), 'name' => 'Amazonas', 'abbreviation' => 'AM'],
            ['id' => 5, 'uuid' => Str::uuid(), 'name' => 'Bahia', 'abbreviation' => 'BA'],
            ['id' => 6, 'uuid' => Str::uuid(), 'name' => 'Ceará', 'abbreviation' => 'CE'],
            ['id' => 7, 'uuid' => Str::uuid(), 'name' => 'Distrito Federal', 'abbreviation' => 'DF'],
            ['id' => 8, 'uuid' => Str::uuid(), 'name' => 'Espírito Santo', 'abbreviation' => 'ES'],
            ['id' => 9, 'uuid' => Str::uuid(), 'name' => 'Goiás', 'abbreviation' => 'GO'],
            ['id' => 10, 'uuid' => Str::uuid(), 'name' => 'Maranhão', 'abbreviation' => 'MA'],
            ['id' => 11, 'uuid' => Str::uuid(), 'name' => 'Mato Grosso', 'abbreviation' => 'MT'],
            ['id' => 12, 'uuid' => Str::uuid(), 'name' => 'Mato Grosso do Sul', 'abbreviation' => 'MS'],
            ['id' => 13, 'uuid' => Str::uuid(), 'name' => 'Minas Gerais', 'abbreviation' => 'MG'],
            ['id' => 14, 'uuid' => Str::uuid(), 'name' => 'Pará', 'abbreviation' => 'PA'],
            ['id' => 15, 'uuid' => Str::uuid(), 'name' => 'Paraíba', 'abbreviation' => 'PB'],
            ['id' => 16, 'uuid' => Str::uuid(), 'name' => 'Paraná', 'abbreviation' => 'PR'],
            ['id' => 17, 'uuid' => Str::uuid(), 'name' => 'Pernambuco', 'abbreviation' => 'PE'],
            ['id' => 18, 'uuid' => Str::uuid(), 'name' => 'Piauí', 'abbreviation' => 'PI'],
            ['id' => 19, 'uuid' => Str::uuid(), 'name' => 'Rio de Janeiro', 'abbreviation' => 'RJ'],
            ['id' => 20, 'uuid' => Str::uuid(), 'name' => 'Rio Grande do Norte', 'abbreviation' => 'RN'],
            ['id' => 21, 'uuid' => Str::uuid(), 'name' => 'Rio Grande do Sul', 'abbreviation' => 'RS'],
            ['id' => 22, 'uuid' => Str::uuid(), 'name' => 'Rondônia', 'abbreviation' => 'RO'],
            ['id' => 23, 'uuid' => Str::uuid(), 'name' => 'Roraima', 'abbreviation' => 'RR'],
            ['id' => 24, 'uuid' => Str::uuid(), 'name' => 'Santa Catarina', 'abbreviation' => 'SC'],
            ['id' => 25, 'uuid' => Str::uuid(), 'name' => 'São Paulo', 'abbreviation' => 'SP'],
            ['id' => 26, 'uuid' => Str::uuid(), 'name' => 'Sergipe', 'abbreviation' => 'SE'],
            ['id' => 27, 'uuid' => Str::uuid(), 'name' => 'Tocantins', 'abbreviation' => 'TO'],
        ]);
    }
}
