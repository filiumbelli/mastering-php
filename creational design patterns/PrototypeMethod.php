<?php

class Student
{

    private $name;
    private $id;
    public function __construct(String $name, int $id)
    {
        $this->name = $name;
        $this->id = $id;
    }

    public function setName(String $name): bool
    {
        $this->name = $name;
        return true;
    }

    public function setId(int $id): bool
    {
        $this->id = $id;
        return true;
    }
}


$student = new Student("harya", 23);
$newStuden = clone $student;
$newStuden->setName = "Harakiri";
$newStuden->setId = 45;
$newStuden->skills = "Dancing hard";
$newStuden->showSkills = function ($skills) {
    return "I have $skills skills.";
};

var_dump($newStuden->showSkills->__invoke($newStuden->skills));
