<?php

namespace ScientificNotation;


class Number
{
    /**
     * @var float
     */
    private $coefficient;

    /**
     * @var int
     */
    private $exponent;

    /**
     * @var int
     */
    private $base = 10;

    /**
     * @param float $coefficient
     * @param int $exponent
     * @param int $base
     */
    public function __construct($coefficient = 0.0, $exponent = 0, $base = 10)
    {
        $this->coefficient = $coefficient;
        $this->exponent = $exponent;
        $this->base = $base;
    }

    /**
     * Calculate the quantity of significant digits in the coefficient
     *
     * @return int
     */
    public function getSignificantDigits()
    {
        $parts = explode('.', (string) $this->getCoefficient());

        if (!isset($parts[1])) {
            return 1;
        }

        return strlen($parts[1]) + 1;
    }

    /**
     * @return float
     */
    public function getCoefficient()
    {
        return $this->coefficient;
    }

    /**
     * @param float $coefficient
     */
    public function setCoefficient($coefficient)
    {
        $this->coefficient = $coefficient;
    }

    /**
     * @return int
     */
    public function getExponent()
    {
        return $this->exponent;
    }

    /**
     * @param int $exponent
     */
    public function setExponent($exponent)
    {
        $this->exponent = $exponent;
    }

    /**
     * @return int
     */
    public function getBase()
    {
        return $this->base;
    }

    /**
     * @param int $base
     */
    public function setBase($base)
    {
        $this->base = $base;
    }



}