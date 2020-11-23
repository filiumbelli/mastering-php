<?php

class Manufacturer
{
    private $capacity;

    public function __construct(int $capacity)
    {
        $this->capacity = $capacity;
    }

    public function build():string{
        return uniqid();
    }
}

class Post
{
    private $sender;

    public function __construct(string $sender)
    {
        $this->sender = $sender;
    }

    public function dispatch(string $item, string $to):bool
    {
        if(strlen($item) !== 13){
            return false;
        }
        if(empty($to)){
            return false;
        }

        return true;
    }

}

class SMS 
{
    private $from;

    public function __construct(string $from)
    {
        $this->from = $from;
    }

    public function send(string $to, string $message):bool
    {
        if(empty ($to)){
            return false;
        }
        if (strlen($message) === 0 ){
            return false;
        }

        echo $to . " recieved memssage: " .$message;
        return true;
    }
}


class MixedClass
{

    private $courier;
    private $manufacturer;
    private $sms;

    public function __construct(String $factoryAddress,String $contactNumber,int $capacity)
    {
        $this->courier = new Post($factoryAddress);
        $this->sms = new SMS($contactNumber);
        $this->manufacturer = new Manufacturer($capacity);
    }


    public function processOrder(string $address,$phone){
        $item = $this->manufacturer->build();
        $this->courier->dispatch($item,$address);
        $this->sms->send($phone,"Your order has been shipped");
    }
}

$toy = new MixedClass("bluberry.street","909052525",250);

$toy->processOrder("redchia.street","2501672");