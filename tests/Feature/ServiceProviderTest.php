<?php

namespace Tests\Feature;

use App\Data\Bar;
use App\Data\Foo;
use App\Services\HelloService;
use App\Services\HelloServiceIndonesia;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ServiceProviderTest extends TestCase
{

    
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testServiceProvider()
    {
        $foo1 = $this->app->make(Foo::class);
        $foo2 = $this->app->make(Foo::class);
        $bar = $this->app->make(Bar::class);
        self::assertSame($foo1, $foo2);
        self::assertSame($foo1, $bar->foo);
    }

    public function testSingletons(){
        $helloServiceIndonesia1 = $this->app->make(HelloService::class);
        $helloServiceIndonesia2 = $this->app->make(HelloService::class);
        self::assertSame($helloServiceIndonesia1, $helloServiceIndonesia2);
        self::assertInstanceOf(HelloServiceIndonesia::class, $helloServiceIndonesia1);
    }

    public function testLazyProvider(){
        // self::expectOutputString("FooBarServiceProvider");
        // $this->app->make(Bar::class);
    }
}