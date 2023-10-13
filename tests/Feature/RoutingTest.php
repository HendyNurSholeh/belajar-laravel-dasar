<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoutingTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetHendy()
    {
        $this->get('/hendy')->assertStatus(200)->assertSeeText("Hendy Ganteng");
    }

    public function testRedirect(){
        $this->get("/ganteng")->assertRedirect("/hendy");
        self::assertTrue($this->get("/ganteng")->isRedirect("/hendy"));
    }
    public function testGetGanteng()
    {
        $this->get('/hendy')->assertStatus(200)->assertSeeText("Hendy Ganteng");
    }

    public function testFallback(){
        $this->get("/salah")->assertSeeText("404 Halaman tidak ditemukan!");
    }
}