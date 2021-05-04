<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        if (count(Post::all())) {

            $posts = Post::all()->toArray(); /* All exists posts */

            return [
                'content' => $this->faker->text(255),
                'post_id' => $posts[array_rand($posts)]['id'] /* id of random exists post */
            ];

        } else {

            return [];

        }
    }
}
