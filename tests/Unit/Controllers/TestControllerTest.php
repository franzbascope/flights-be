<?php

namespace Tests\Unit\Controllers;

use App\Http\Controllers\TestController;
use PHPUnit\Framework\TestCase;

class TestControllerTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testIndexs()
    {
        $controller = new TestController();
        $response = $controller->index();
        $this->assertIsArray($response);
    }
}
