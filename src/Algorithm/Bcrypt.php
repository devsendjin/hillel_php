<?php


namespace App\Algorithm;


class Bcrypt extends AlgorithmAbstract implements AlgorithmInterface
{
    /**
     * Bcrypt constructor.
     * @param string|null $salt
     * @param int $cost
     */
    public function __construct(?string $salt = null, int $cost = 10)
    {
        $this->setOption('salt', $salt);
        $this->setOption('cost', $cost);
    }

    /**
     * @return string
     */
    public function getIdentifier(): string
    {
        return PASSWORD_BCRYPT;
    }
}
