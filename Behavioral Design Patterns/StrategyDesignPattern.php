<?php
interface Power
{
    public function raise(int $number):int;
}


class Square implements Power
{
    public function raise(int $number): int
    {
        return pow($number,2);
    }
}

class Cube implements Power
{
    public function raise(int $number): int
    {
        return pow($number,3);
    }
}

class RaiseNumber
{
    public function __construct(Power $strategy)
    {
        $this->strategy = $strategy;
    }

    public function raise(int $number)
    {
        return $this->strategy->raise($number);
    }
}

$processor = new RaiseNumber(new Square());

var_dump($processor->raise(5));
$processor = new RaiseNumber(new Cube());
var_dump($processor->raise(5));

//it is possible to use this pattern to change logic according to given input
//Used to alter the behaviour at runtime
// This pattern also encapsulates the algorithm within a class