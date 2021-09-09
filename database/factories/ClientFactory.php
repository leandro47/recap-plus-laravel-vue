<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Client::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'uuid' => $this->faker->uuid(),
            'city_id' => $this->faker->numberBetween(1, 5565),
            'cpf_cnpj' => $this->faker->numberBetween(11111111111111, 99999999999999),
            'name' => $this->faker->name,
            'cep' => preg_replace( '/[^0-9]/', '', $this->faker->postcode),
            'district' => $this->faker->streetName,
            'street' => $this->faker->streetName,
            'number' => $this->faker->numberBetween(1, 1000),
            'phone' => preg_replace( '/[^0-9]/', '', $this->faker->phoneNumber),
            'cell_phone' => preg_replace( '/[^0-9]/', '', $this->faker->phoneNumber),
            'email' => $this->faker->email,
            'type' => 'F',
            'created_at'=> now(),
            'updated_at'=> null,
            'deleted_at'=> null,
        ];
    }
}
