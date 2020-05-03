<?php


namespace App\Algorithm;


class Argon2i extends AlgorithmAbstract implements AlgorithmInterface
{
    /**
     * Argon2i constructor.
     * @param int|null $memory_cost
     * @param int|null $time_cost
     * @param int|null $threads
     */
    public function __construct(
        ?int $memory_cost = PASSWORD_ARGON2_DEFAULT_MEMORY_COST,
        ?int $time_cost  = PASSWORD_ARGON2_DEFAULT_TIME_COST,
        ?int $threads  = PASSWORD_ARGON2_DEFAULT_MEMORY_COST
    )
    {
        $this->setOption('memory_cost ', $memory_cost);
        $this->setOption('time_cost ', $time_cost);
        $this->setOption('threads ', $threads);
    }

    /**
     * @return string
     */
    public function getIdentifier(): string
    {
        return PASSWORD_ARGON2I;
    }
}
