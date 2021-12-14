<?php

namespace Database\Factories;

use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class SupplierFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Supplier::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $nama = $this->faker->firstName();
        return [
            'kode_supplier' => "S".$this->faker->numberBetween($min = 1000, $max = 9999),
            'nama_supplier' => $nama,
            'alamat' => $this->faker->address(),
            'telepon' => $this->faker->phoneNumber(),
            'email' => $nama.'@gmail.com',
            'username' => $this->faker->userName(),
            'password' => Hash::make('123'),
        ];
    }
}
