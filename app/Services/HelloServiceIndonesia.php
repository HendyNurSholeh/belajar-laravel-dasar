<?php 
namespace App\Services;
class HelloServiceIndonesia implements HelloService{
    public function sayHello(string $name): string{
        return "Halo ". $name;
    }
}
?>