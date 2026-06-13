<?php

namespace Database\Seeders;

use App\Models\ActivityData;
use Illuminate\Database\Seeder;

class ActivityDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $activityDatas = ActivityData::factory()->count(80)->create();
    }
}
