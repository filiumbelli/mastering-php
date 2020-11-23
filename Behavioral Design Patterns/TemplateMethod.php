<?php

abstract class Pasta
{
    public function __construct(bool $cheese = true)
    {
        $this->cheese = $cheese;
    }

    public function cook()
    {
        var_dump("Cooked pasta");
        $this->boilPasta();
        $this->addSauce();
        $this->addMeat();

        if ($this->cheese) {
            $this->addCheese();
        }
    }

    public function boilPasta(): bool
    {
        return true;
    }

    public abstract function addSauce():bool;
    public abstract function addMeat():bool;
    public abstract function addCheese():bool;
}


class MeatBallPasta extends Pasta
{
    public function addSauce(): bool
    {
        var_dump("Tomato Sauce is added");
        return true;
    }
    public function addMeat(): bool
    {
        var_dump("Meat is added");
        return true;
    }
    public function addCheese(): bool
    {
        var_dump("Added cheese");
        return true;
    }
}

class VeganPasta extends Pasta
{
    public function addSauce(): bool
    {
        var_dump("Added tomato sauce");
        return true;
    }

    public function addMeat(): bool
    {
        return false;
    }
    public function addCheese(): bool
    {
        return false;
    }
}

$meatPasta = new MeatBallPasta();
$meatPasta->cook();
$veganPasta = new VeganPasta(false);
$veganPasta->cook();

// Allows you to abstract your algorithm design and delegate that responsibility to subclasses 

