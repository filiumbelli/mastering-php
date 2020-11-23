<?php

abstract class Notifier
{
    protected $to;

    public function __construct(string $to)
    {
        $this->to = $to;
    }

    abstract public function validateTo(): bool;
    abstract public function sendNotification(): string;
}



class SMS extends Notifier
{
    public function validateTo(): bool
    {
        $pattern = '/^(\+44\s?7\d{3}|\(?07\d{3}\)?)\s?\d{3}\s?\d{3}$/';
        $isPhone = preg_match($pattern, $this->to);
        return $isPhone ? true : false;
    }

    public function sendNotification(): string
    {
        if ($this->validateTo() === false) {
            throw new Exception("Invalid phone number.");
        }
        $noficationType = get_class($this);
        return "This is a " . $noficationType . " to " . $this->to . " .\n";
    }
}

class Email extends Notifier
{
    private $from;

    public function __construct($to, $from)
    {
        parent::__construct($to);
        if (isset($from)) {
            $this->from = $from;
        } else {
            $this->from = "Anonymous";
        }
    }

    public function validateTo(): bool
    {
        $isEmail = filter_var($this->to, FILTER_VALIDATE_EMAIL);
        return $isEmail ? true : false;
    }

    public function sendNotification(): string
    {
        if ($this->validateTo() === false) {
            throw new Exception("Invalid email address");
        }
        $noficationType = get_class($this);
        return "This is a $noficationType to $this->to from  $this->from .";
    }
}


class NotifierFactory
{
    public static function getNotifier($notifier, $to)
    {
        if (empty($notifier)) {
            throw new Exception("No notifier passed");
        }

        switch ($notifier) {
            case "SMS":
                return new SMS($to);
                break;
            case "Email":
                return new Email($to, "Sayko");
                break;
            default:
                throw new Exception("Notifier Invaild");
                break;
        }
    }
}

$mobile = NotifierFactory::getNotifier("SMS","07111111111");
$email = NotifierFactory::getNotifier("Email","test@test.com");

echo $mobile->sendNotification();
echo $email->sendNotification();