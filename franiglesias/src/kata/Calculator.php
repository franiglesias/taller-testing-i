<?php

namespace kata;

class Calculator
{
    public function add($inputString)
    {
        $inputString = str_replace("\n", ',', $inputString);

        $this->ensureThatInputIsValid($inputString);

        $numbers = explode(',', $inputString);
        return intval(array_sum($numbers));
    }

    /**
     * @param $inputString
     */
    protected function ensureThatInputIsValid($inputString): void
    {
        if (substr($inputString, -1, 1) == ',') {
            throw new \InvalidArgumentException('Malformed string');
        }
    }
}
