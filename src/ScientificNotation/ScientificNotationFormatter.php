<?php

namespace ScientificNotation;


class ScientificNotationFormatter
{

    /**
     * Returns the simplified scientific notation format for the given float, decimal number.
     *
     * @param Number $number
     * @return string
     */
    public function format(Number $number)
    {
        return $number->getCoefficient() . 'x10^' . $number->getExponent();
    }



}