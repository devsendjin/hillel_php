<?php


namespace App;


use App\Algorithm\AlgorithmInterface;

class Password implements PasswordInterface
{
    private string $password;

    /**
     * Password constructor.
     * @param string $password
     */
    public function __construct(string $password)
    {
        $this->setPassword($password);
    }

    /**
     * @param AlgorithmInterface $algorithm
     * @return string
     */
    public function hash(AlgorithmInterface $algorithm): string
    {
        return password_hash($this->password, $algorithm->getIdentifier(), $algorithm->getOptions());
    }

    /**
     * @param string $hash
     * @return bool
     */
    public function verify(string $hash): bool
    {
        return password_verify($this->password, $hash);
    }

    /**
     * @param $hash
     * @param AlgorithmInterface $algorithm
     * @return bool
     */
    public static function needsRehash($hash, AlgorithmInterface $algorithm): bool
    {
        return password_needs_rehash($hash, $algorithm->getIdentifier());
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }
}
