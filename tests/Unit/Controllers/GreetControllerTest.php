<?php

namespace Tests\Unit\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class GreetControllerTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testGreet()
    {
        $name = 'test';
        $response = $this->get("/greet?name=$name");
        $this->assertEquals($name,$response->json(['name']));
    }
}
