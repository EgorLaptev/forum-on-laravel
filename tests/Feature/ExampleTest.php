<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        User::factory()
            ->count(50)
            ->hasPosts(random_int(0, 3))
            ->hasComments(random_int(0, 10))
            ->no_remember_token()
            ->create();

    }
}
