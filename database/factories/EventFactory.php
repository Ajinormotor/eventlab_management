<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
       

        return [
            'title' => fake()->sentence(3), 
            'email' => fake()->unique()->safeEmail(),
            'user_id' => User::inRandomOrder()->first()?->id ?? User::factory(), 
            'date' => fake()->date(),
            'details' => fake()->paragraph(),
            'time'  => fake()->time(),
            'phone_no' => fake()->phoneNumber(),
            'speaker' => fake()->name(),
            'speaker_image' => fake()->imageUrl(),
            'type' => fake()->randomElement(['free', 'paid']),
            'price' => '$' . fake()->randomElement([20, 30, 40, 50, 100]), 
            'seat' => fake()->numberBetween(200, 500),
            'hall' => fake()->randomElement(['Harmony Hall', 'Mercy Hall', 'Unity Hall', 'Grand Auditorium']),
            'progress' => fake()->randomElement(['pending', 'canceled', 'approved']),
        ];
        
    }
}
