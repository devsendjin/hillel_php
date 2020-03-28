<?php

namespace App;

use Currency\Util\CurrencySymbolMapping;

class Currency
{
    /** @var array of strings */
    private array $CURRENCIES;

    /** @var string */
    private string $isoCode;

    public function __construct($isoCode)
    {
        $this->CURRENCIES = array_keys(CurrencySymbolMapping::values());
        $this->setIsoCode($isoCode);
    }

    /**
     * @return mixed
     */
    public function getIsoCode()
    {
        return $this->isoCode;
    }

    /** @param string $isoCode */
    private function setIsoCode($isoCode): void
    {
        if (!in_array($isoCode, $this->CURRENCIES)) {
            throw new \InvalidArgumentException('Passed wrong currency format!');
        }

        $this->isoCode = $isoCode;
    }

    /**
     * @param Currency $comparedCurrencyInstance
     * @return bool
     */
    public function equals(Currency $comparedCurrencyInstance): bool
    {
        return $this->getIsoCode() === $comparedCurrencyInstance->getIsoCode();
    }

}
