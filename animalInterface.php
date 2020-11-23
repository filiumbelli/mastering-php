<?php

interface Animal1{
    public function eat(string $food): bool;
    public function talk(bool $shout): string;
}

abstract  class Animal2{
    abstract public function eat(string $food):bool;
    abstract public function talk(bool $shout):string;
    final public function walk(int $speed):bool{
        if($speed >0 ){
            return true;
        }else{
            return false;
        }
    }
    public function jump(bool $learnt):string{
        if($learnt == true){
            return 'Jumpy animo';
        }else{
            return '';
        }
    }
}

class Cat implements Animal1
{
    public function  eat(string $food): bool
    {
        if($food === "tuna"){
            return true;
        }else{
            return false;
        }
    }

    public function talk(bool $shout): string
    {
        if($shout === true){
            return 'Miy';
        }else{
            return '';
        }
    }
}
$barny = new Cat();

/* 
echo $barny->eat('tuna');
echo $barny->talk(true); */


class Dog extends Animal2{

    public function eat(string $food):bool{
        if($food == 'dog food' && $food == 'meat'){
            return 1;
        }else{
            return 0;
        }
    }
    public function talk(bool $shout):string{
        if($shout == true){
            return 'Woof';
        }else{
            return 'Woof Woof';
        }
    }
    public function jump(bool $jump):string{
        if($jump == true){
            return 'Hello';
        }
    }
}

$dogs = new Dog();
/* echo $dogs->eat('meat');
echo $dogs->talk(true);
echo $dogs->walk(5); */

// Accessing directly on instantiation
/* echo (new Dog())->walk(5);
echo (new Dog())->jump(true); */
