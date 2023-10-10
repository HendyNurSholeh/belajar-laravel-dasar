<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ConfigurationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testConfiguration()
    {
        self::assertEquals(["first" => "Hendy", "last"=>"Ganteng"], config("contoh.name"));
        self::assertEquals("Hendy", config("contoh.name.first"));
        self::assertEquals("Ganteng", config("contoh.name.last"));
        self::assertEquals("hendynursholeh7213@gmail.com", config("contoh.email"));
        self::assertEquals(["game", "youtube", "coding", "coding", "coding", "coding"], config("contoh.hobi"));
    }
}