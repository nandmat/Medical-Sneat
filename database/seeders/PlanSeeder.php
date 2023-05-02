<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plans = [
            'name' => 'Plano Saúde Premium',
            'slug' => 'plano-saude-premium',
            'stripe_plan' => 'price_1N39SXKrXVRrlXyCIwITYrXY',
            'price' => 15,
            'description' => 'Plano Saúde Premium'
        ];

        Plan::create($plans);
    }
}
