<?php


class Pizza{

    private $size;
    private $cheese;
    private $bacon;
    private $pepperoni;
    public function __construct(PizzaBuilder $builder)
    {
        $this->size = $builder->size;
        $this->cheese = $builder->cheese;
        $this->bacon = $builder->bacon;
        $this->pepperoni = $builder->pepperoni;
    }

    public function show(){
        $recipe = "$this->size inch pizza with the following toppins: cheese $this->cheese, $this->bacon,$this->pepperoni";
        return $recipe;
    }
}

class PizzaBuilder{
    public $size;
    public $cheese;
    public $pepperoni;
    public $bacon;

    public function __construct(int $size)
    {
        $this->size = $size;
    }

    public function cheese(bool $present):PizzaBuilder{
        $this->cheese = $present;
        return $this;
    }

    public function pepperoni(bool $present):PizzaBuilder{
        $this->pepperoni = $present;
        return $this;
    }
    public function bacon(bool $present):PizzaBuilder{
        $this->bacon = $present;
        return $this;
    }
    public function build(){
        return $this;
    }
}

$pizzaCreate = new PizzaBuilder(5);
$pizzaCreate->cheese(true);
$pizzaCreate->pepperoni(true);
$pizzaCreate->bacon(true);
$pizzaCreate->build();
$order = new Pizza($pizzaCreate);
echo $order->show();