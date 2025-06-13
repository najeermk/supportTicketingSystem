<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TicketFactory extends Factory
{
    public function definition(): array
    {
        return [
            'ticket_type' => $this->faker->randomElement(['technical', 'billing', 'feedback', 'products', 'inquiries']),
            'subject' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'email' => $this->faker->safeEmail,
            'status' => 'Open',
            'note' => null,
        ];
    }
}