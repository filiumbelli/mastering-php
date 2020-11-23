<?php

$workers = array();
$workers['A']  = new stdClass();
$workers['A']->title = "co-worker";
$workers['A']->department = "engineer";
$workers['B']  = new stdClass();
$workers['B']->title = "co-assistant";
$workers['B']->department = "manager";


interface EmployeeSpecification
{
    public function isSatisfiedBy(stdClass $customer):bool;
}


class EmployeeEngineer implements EmployeeSpecification
{
    public function isSatisfiedBy(stdClass $customer): bool
    {
        if($customer->department === "engineer"){
            return true;
        }
        return false;
    }
}

$isEngineer = new EmployeeEngineer();

foreach($workers as $id=>$worker){
    if($isEngineer->isSatisfiedBy($worker)){
        var_dump($id);
    }
}

//Encapsulate business logic to state something about an object.
