<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EpisodeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetEpisodes()
    {
        $response = $this->get('/api/episodes');
        $response->assertStatus(200);

        $response = $this->get('/api/episod');
        $response->assertStatus(404);

        $response = $this->get('/api/episodes/1');
        $response->assertStatus(200);

        $response = $this->get('/api/episodes/0');
        $response->assertStatus(404);
    }
}
