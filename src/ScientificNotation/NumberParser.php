<?php

namespace ScientificNotation;

class NumberParser
{

    /**
     *
     * @see http://php.net/manual/en/language.types.float.php
     *
     * @param string $input
     * @return \ScientificNotation\Number
     */
    public function parse($input)
    {
        $number = new Number();

        $input = trim($input);

        if ('-' == substr($input, 0, 1)) {
            throw new \InvalidArgumentException("Unable to parse number: negative numbers are not supported");
        }

        switch (true) {
            case ("0" === $input):
            case preg_match('/^[0-9]*\.?[0-9]+$/', $input):
                $this->populateNumberFromFloat($number, $input);
                break;
            default:
                throw new \InvalidArgumentException("Unable to parse number: invalid format");
        }

        return $number;
    }

    /**
     * @param \ScientificNotation\Number $number
     * @param string $input
     */
    private function populateNumberFromFloat(\ScientificNotation\Number $number, $input)
    {
        if ($input == 0) {
            $number->setCoefficient(0.0);
            $number->setExponent(0);
            return;
        }

        $exponent = (int) floor(log10($input));
        $coefficient = (float) pow(10, -$exponent) * $input;

        $number->setCoefficient($coefficient);
        $number->setExponent($exponent);
    }
}