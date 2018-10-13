<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ResponseHeaderTest extends TestCase
{
    /**
     * @dataProvider urlProvider
     */
    public function testResponseHeaderContailsXFrameOptions(String $url)
    {
        // $this->visit('/');
        $response = $this->get($url);
        $response->assertStatus(200)->assertHeader('X-Frame-Options', 'DENY');
    }

    public function urlProvider()
    {
        return [
            ["/"],
            ["/login"],
        ];
    }

}
