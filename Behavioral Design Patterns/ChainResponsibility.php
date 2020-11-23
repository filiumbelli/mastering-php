<?php

//when we need multiple objects to solve a specific problem, it is called chain of responsibility.

interface Purchaser
{
    public function setNextPurchaser(Purchaser $nextPurchaser): bool;
    public function buy($price):bool;
}

class AssociatePurchaser implements Purchaser
{
    public function setNextPurchaser(Purchaser $nextPurchaser): bool
    {
        $this->nextPurchaser = $nextPurchaser;
        return true;
    }

    public function buy($price): bool
    {
        if($price<100){
            var_dump("Associate purchased");
            return true;
        }else{
            if(isset($this->nextPurchaser)){
                return $this->nextPurchaser->buy($price);
            }else{
                var_dump("Could not buy");
                return false;
            }
        }
    }
}
