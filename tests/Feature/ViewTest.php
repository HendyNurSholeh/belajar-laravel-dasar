<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testView()
    {
        $this->get("/hello")->assertStatus(200)->assertSeeText("Hello Boss hendy");
        $this->get("/hello2")->assertStatus(200)->assertSeeText("Hello Boss joko");
    }

    public function testTemplateWithoutRouting(){
        $this->view("hello", ["name"=>"hendy"])->assertSeeText("Hello Boss hendy");
        $this->view("admin.hello", ["name"=>"ucup"])->assertSeeText("Hello Admin ucup");
    }
}