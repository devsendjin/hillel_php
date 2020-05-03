<?php


namespace App\Algorithm;


abstract class AlgorithmAbstract
{
    protected array $options;

    /**
     * @param string $optionName
     * @param int|string $optionValue
     */
    protected function setOption(string $optionName, $optionValue): void
    {
        if (null !== $optionValue) {
            $this->options[$optionName] = $optionValue;
        }
    }

    /**
     * @return array
     */
    public function getOptions(): array
    {
        return $this->options;
    }
}
