<?php
declare(strict_types=1);

namespace App;

use App\Algorithm\AlgorithmInterface;

/**
 * Interface PasswordInterface
 * @package Hash
 */
interface PasswordInterface
{
    /**
     * @param AlgorithmInterface $algorithm
     * @return string
     */
    public function hash(AlgorithmInterface $algorithm): string;

    /**
     * @param string $hash
     * @return bool
     */
    public function verify(string $hash): bool;

    /**
     * @param $hash
     * @param AlgorithmInterface $algorithm
     * @return bool
     */
    public static function needsRehash($hash, AlgorithmInterface $algorithm): bool;
}