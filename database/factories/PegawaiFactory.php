<?php

namespace Database\Factories;

use App\Models\Pegawai;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PegawaiFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pegawai::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
    
        return [
            'kode_pegawai' => "P".$this->faker->numberBetween($min = 1000, $max = 9999),
            'nama_pegawai' => $this->faker->firstName(),
            'telepon' => $this->faker->phoneNumber(),
            'username' => $this->faker->userName(),
            'password' => Hash::make('123'),
        ];
    }
}
