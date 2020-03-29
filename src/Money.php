<?php


namespace App;

use App\test\Currency;

class Money
{
    /** @var int|float */
    private $amount;

    /** @var Currency */
    private Currency $currency;

    public function __construct($amount, Currency $currency)
    {
        $this->setAmount($amount);
        $this->setCurrency($currency);
    }

    /** @return int|float */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param $amount int
     */
    public function setAmount($amount): void
    {
        if ($amount < 0) {
            throw new InvalidArgumentException('Amount should be above 0!');
        }
        $this->amount = $amount;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency->getIsoCode();
    }

    /**
     * @param Currency $currency
     */
    public function setCurrency(Currency $currency): void
    {
        $this->currency = $currency;
    }

    /**
     * @param Money $moneyInstance
     * @return string
     */
    static function fullName(Money $moneyInstance): string
    {
        return $moneyInstance->amount . ' ' . $moneyInstance->getCurrency();
    }

    /**
     *
     * @param Money $comparedMoneyInstance
     * @return bool
     */
    public function equals(Money $comparedMoneyInstance): bool
    {
        return $this->amount === $comparedMoneyInstance->getAmount() && $this->getCurrency() === $comparedMoneyInstance->getCurrency();
    }

    /**
     * @param array $moneyInstances - array of Money objects
     * @return string
     */
    public function add(array $moneyInstances): string
    {
        if (!is_array($moneyInstances)) {
            throw new \InvalidArgumentException('Passed argument should be an array!');
        }

        //check for currencies equality
        foreach ($moneyInstances as $moneyInstance) {
            if ($this->getCurrency() !== $moneyInstance->getCurrency()) {
                throw new \InvalidArgumentException('Currencies should be equal!');
            }
        }

        $totalAmount = $this->amount;
        foreach ($moneyInstances as $moneyInstance) {
            $totalAmount += $moneyInstance->amount;
        }

        return $totalAmount . ' ' . $this->getCurrency();
    }
}
