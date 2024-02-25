<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;

class FeatureUserTest extends TestCase
{

    use RefreshDatabase, WithFaker;

    public function test_create_user(): void
    {
        
        $data = [
            'email' => "lama@gmail.com",
            'firstName' => "Lama",
            'lastName' => "Adele",
        ];
        $user = User::factory()->create([
            'lastName' => fake()->name(),
            'firstName' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
        ]);
        
        $response = $this->actingAs($user, 'api')->json('POST', '/api/users',$data);
        $response->assertStatus(201);
        $response->assertJson(['message' => "User created successfully"]);        
    }

    public function test_throw_error_when_creating_user_with_existing_email(): void
    {
        
        $data = [
            'email' => "lama@gmail.com",
            'firstName' => "Lama",
            'lastName' => "Adele",
        ];
        $user = User::factory()->create([
            'lastName' => fake()->name(),
            'firstName' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
        ]);
            
        // First request
        $response1 = $this->json('POST', '/api/users', $data);

        // Asserting the response status and content for the first request
        $response1->assertStatus(201); 
        $response1->assertJson(['message' => "User created successfully"]); 
        
        // Second request
        $response2 = $this->json('POST', '/api/users', $data);

        // Asserting the response status and content for the second request
        $response2->assertStatus(400); 
        $response2->assertJson(['error' => "A user with this email already exists"]);
    }
}
