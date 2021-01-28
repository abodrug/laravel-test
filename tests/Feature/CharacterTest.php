<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CharacterTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetCharacters()
    {
        $response = $this->get('/api/characters');
        $response->assertStatus(200);

        $response = $this->get('/api/characte');
        $response->assertStatus(404);

        $response = $this->get('/api/characters/?name=odes');
        $response->assertStatus(200);

        $response = $this->get('/api/characters/?name=123');
        $response->assertStatus(404);
    }
}
