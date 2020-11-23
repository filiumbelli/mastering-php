<?php
declare(strict_types=1);
trait Sling
{
    function gunSlinger():string{
        return 'Joe used gunslinger';
    }
}

class Person{
    private $id = 23;

    public function setName(string $name):bool{
        $this->name = $name;
        return true;
    }
    public function getName():string{
        return $this->name;
    }

    public function __debugInfo()
    {
        return call_user_func('get_object_vars',$this);
    }


}

class Joe extends Person{
    use Sling;


}

$joe = new Joe();
var_dump($joe);