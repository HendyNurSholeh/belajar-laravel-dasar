<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\App;
use Tests\TestCase;

class AppEnvironmentTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testAppEnv()
    {
        var_dump(env("APP_ENV") == "testng");
        var_dump(App::environment("local", "prod", "testing"));
        $this->assertEquals(App::environment(), "testing");
    }
}