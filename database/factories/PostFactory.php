<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PostFactory extends Factory
{
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'      => $this->faker->word,
            'post_text'  => $this->faker->text(500),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
