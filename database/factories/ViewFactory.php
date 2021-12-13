<?php

namespace Database\Factories;

use App\Models\ShortLink;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

class ViewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $shortLink = ShortLink::all()->random();
        $pictures = Storage::disk('public')->files('/ads');
        $picture = basename($pictures[array_rand($pictures)]);

        return [
            'client_ip' => $this->faker->ipv4(),
            'short_link_id' => $shortLink->id,
            'picture' => $shortLink->type == 'commercial' ? $picture : null,
            'created_at' => $this->faker->dateTimeThisMonth($max = 'now', $timezone = null)
        ];
    }
}
