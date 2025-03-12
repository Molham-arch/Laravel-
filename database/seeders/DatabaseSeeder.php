<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task;


class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create 50 incomplete tasks
        Task::factory()->count(50)->create();

        // Create 50 completed tasks
        Task::factory()->count(50)->completed()->create();
    }
}
