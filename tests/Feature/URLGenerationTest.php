<?php

namespace Tests\Feature;

use Tests\TestCase;

class URLGenerationTest extends TestCase
{
    public function testCurrent(){
        $this->get("/url/current?name=hendy")
            ->assertStatus(200)
            ->assertSee("http://localhost/url/current?name=hendy");
    }

    public function testRouteNamed(){
        $this->get("/redirect")
            ->assertStatus(200)
            ->assertSee("http://localhost/hendy");
    }

    public function testAction(){
        $this->get("/url/action")
            ->assertSee("hello action");
    }
}