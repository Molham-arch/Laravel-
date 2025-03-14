<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition()
    {
        return [
            'description' => $this->faker->sentence(),
            'is_completed' => false, 
        ];
    }

    // Define a factory state for completed tasks
    public function completed()
    {
        return $this->state([
            'is_completed' => true,
        ]);
    }
}
