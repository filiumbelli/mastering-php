<?php

class Insurance
{
    private $limit;
    private $excess;

    public function __construct(float $limit, float $excess)
    {
        if ($excess >= $limit) {
            throw new Exception("Excess must be less than premium.");
        }
        $this->limmit = $limit;
        $this->excess = $excess;
    }
    public function monthlyPremium(): float
    {
        return ($this->limit - $this->excess) / 200;
    }
    public function annualPremium(): float
    {
        return $this->monthlyPremium() * 11.5;
    }
}


interface MarketCompare
{
    public function __construct(float $limit, float $excess);
    public function getAnnualPremium();
    public function getMonthlyPremium();
}


class InsuranceMarketCompare implements MarketCompare
{
    private $premium;

    public function __construct(float $limit, float $excess)
    {
        $this->premium = new Insurance($limit, $excess);
    }

    public function getAnnualPremium()
    {
        return $this->premium->annualPremium();
    }

    public function getMonthlyPremium()
    {
        return $this->premium->monthlyPremium();
    }
}

$insurance = new Insurance(10000,2000);
echo $insurance->monthlyPremium();
echo $insurance->annualPremium();