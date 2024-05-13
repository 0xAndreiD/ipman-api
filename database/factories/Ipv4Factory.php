<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Ipv4;

class Ipv4Factory extends Factory
{
    protected $model = Ipv4::class;

    public function definition()
    {
        return [
            'ipv4' => $this->faker->ipv4(),
            'comment' => $this->faker->paragraph,
        ];
    }
}
