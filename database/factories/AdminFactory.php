<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class AdminFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Admin::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'kode_admin'  => "A".$this->faker->numberBetween($min = 1000, $max = 9999),
            'nama_admin' => $this->faker->firstName(),
            'telepon'  => $this->faker->phoneNumber(),
            'username' => $this->faker->userName(),
            'password' => Hash::make('123'),
        ];
    }
}
