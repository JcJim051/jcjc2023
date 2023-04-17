<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Seller;

class SellerFactory extends Factory
{

    protected $model = Seller::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cedula' => $this->faker->randomFloat([10, null]),
            'nombre' => $this->faker->sentences([3, true], null),
            'email' => $this->faker->unique()->safeEmail(),
            'telefono' => $this->faker->phoneNumber([10, null]),
        ];
    }
}
