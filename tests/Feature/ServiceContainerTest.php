<?php

namespace Tests\Feature;

use App\Data\Bar;
use App\Data\Foo;
use App\Data\Person;
use App\Services\HelloService;
use App\Services\HelloServiceIndonesia;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ServiceContainerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testDependencyInjection()
    {
        $bar = new Bar($this->app->make(Foo::class)); 
        self::assertInstanceOf(Foo::class, $this->app->make(Foo::class));
        self::assertEquals($bar->bar(), "foo and bar");  
    }

    public function testCreatedependency():void{
        $bar1 = $this->app->make(Bar::class);
        $bar2 = $this->app->make(Bar::class);
        self::assertNotSame($bar1, $bar2);
    }

    public function testBind(): void{
        $this->app->bind(Person::class, function($app){
           return new Person("hendy", "nur sholeh"); 
        });
        $person = $this->app->make(Person::class);
        $person2 = $this->app->make(Person::class);
        self::assertEquals("hendy", $person->firstName);
        self::assertEquals("nur sholeh", $person->lastName);
        self::assertNotSame($person, $person2);
    }

    public function testSingleton(): void{
        $this->app->singleton(Person::class, function ($app){
            return new Person("hendy", "ganteng");
        });
        $person1 = $this->app->make(Person::class);
        $person2 = $this->app->make(Person::class);
        $this->assertSame($person1, $person2);
        $this->app->bind(Person::class, function ($app){
            return new Person("hendy", "Nursholeh");
        });
        $person3 = $this->app->make(Person::class);
        $person4 = $this->app->make(Person::class);
        $this->assertNotSame($person3, $person4);
    }

    public function testInstance(): void{
        $person = new Person("hendy", "nur sholeh");
        $person2 = $this->app->instance(Person::class, $person);
        $person3 = $this->app->make(Person::class);
        $person4 = $this->app->make(Person::class);
        self::assertSame($person, $person2);
        self::assertSame($person, $person3);
        self::assertSame($person, $person4);
    }

    public function testBar(): void{
        $this->app->singleton(Foo::class, function(){
            return new Foo();
        });
        $this->app->singleton(Bar::class, function($app){
            return new Bar($app->make(Foo::class));
        });
        $foo = $this->app->make(Foo::class);
        $bar1 = $this->app->make(Bar::class);
        $bar2 = $this->app->make(Bar::class);
        $bar3 = $this->app->make(Bar::class);
        self::assertSame($foo, $bar1->foo);
        self::assertSame($foo, $bar2->foo);
        self::assertSame($foo, $bar3->foo);
        self::assertSame($bar1, $bar3);
        self::assertSame($bar1, $bar2);
    }

    public function testBar2(): void{
        $bar1 = $this->app->make(Bar::class);
        $bar2 = $this->app->make(Bar::class);
        self::assertNotSame($bar1->foo, $bar2->foo);
    }

    public function testBindInterfaceToClass(){
        // $this->app->bind(HelloService::class, HelloServiceIndonesia::class);
        $this->app->singleton(HelloService::class, function ($app){
            return new HelloServiceIndonesia();
        });
        $helloService1 = $this->app->make(HelloService::class);
        $helloService2 = $this->app->make(HelloService::class);
        self::assertSame($helloService1, $helloService2);
    }

}