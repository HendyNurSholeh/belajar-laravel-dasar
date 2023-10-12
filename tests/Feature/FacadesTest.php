<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class FacadesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testFacades()
    {
        $config = $this->app->make("config");
        $firstName1 = $config->get("contoh.name.first");
        $firstName2 = Config::get("contoh.name.first");
        self::assertEquals($firstName1, $firstName2);
        var_dump($config->all());
    }

    public function testMockConfig(){
        Config::shouldReceive("get")->with("contoh.name.first")->andReturn("Hendy Ganteng");
        self::assertEquals("Hendy Ganteng", Config::get("contoh.name.first"));
    }
}