<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Quest;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UsersTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        // $books = Category::factory(29)->create();
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertViewHas('books');
        $books = $response->viewData('books');
        
        $this->assertCount(5,$books);

        $books->each(function ($book) {
            $this->assertInstanceOf(Category::class, $book);
        });
            }
}
