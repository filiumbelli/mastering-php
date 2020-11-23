<?php


interface Messenger
{
    public function send($body);
}

class InterfaceMessenger implements Messenger
{
    public function send($body)
    {
        echo "Instant message: $body";
    }
}

class SMSMessage implements Messenger
{
    public function send($body){
        echo "SMS: " .$body;
    }
}

interface Transmitter
{
    public function setSender(Messenger $sender);
    public function send($body);
    
}

abstract class Device implements Transmitter
{
    protected $sender;
    public function setSender(Messenger $sender)
    {
        $this->sender = $sender;
    }
}

class Phone extends Device{
    public function send($body){
       $body .=" sended from phone";
       $this->sender->send($body);
    }
}

class Tablet extends Device{
    public function send($body)
    {
        $body .= " sended by tablet";
        $this->sender->send($body);
    }
}


$phone = new Phone();
$tablet = new Tablet();
$phone->setSender(new SMSMessage());
$tablet->setSender(new InterfaceMessenger());
$phone->send("This is body and ");
echo "\n";
$tablet->send("This is body and ");

//Bridge pattern is interested with main class groups. By doing that it will be easy to use them under
//the same body and bridge interfaces with those classes.
//We created main messengar interface to implement other sub classes.
//After that we have generated another interface which takes the subclasses as argument
//Bridge interface implemented to set the subclass variables from the previous class schema
//This class is used for the subclasses that has the nearly same functionality.
// Methods used in these subclasses called from the subclasses on the above with the super classes inheritedç
