<?php

namespace ScientificNotation;


class StandardNotationFormatter
{

    /**
     * Returns the simplified standard notation format for the given float, decimal number.
     *
     * @param Number $number
     * @return string
     */
    public function format(Number $number)
    {
        /**
         * Move the decimal point to the right for positive exponents of 10.
         * Move the decimal point to the left for negative exponents of 10.
         */

        $coefficient = (string) $number->getCoefficient();
        $decimalPointPosition = strpos($coefficient, ".");

        if ($decimalPointPosition === false) {
            $decimalPointPosition = 1;
        }

        $coefficientWithoutDecimal = str_replace(".", "", $coefficient);

        $newDecimalPointPosition = $decimalPointPosition + $number->getExponent();

        if ($number->getExponent() == 0) {
            // no change to be made from coefficient
            return (string) $number->getCoefficient();
        } else if ($number->getExponent() >= 0 && ($newDecimalPointPosition - $decimalPointPosition) < $number->getSignificantDigits()) {
            // move decimal point for number > 1
            return substr($coefficientWithoutDecimal, 0, $newDecimalPointPosition) . '.' . substr($coefficientWithoutDecimal, $newDecimalPointPosition);
        } else if ($newDecimalPointPosition > 0) {
            // pad number > 1 with zeros on the right
            return str_pad($coefficientWithoutDecimal, $newDecimalPointPosition - $number->getSignificantDigits() + 1, "0", STR_PAD_RIGHT);
        } else {
            // new decimal point position is less than or equal to zero
            // pad number < 1 with zeros on the left
            return "0." . str_pad($coefficientWithoutDecimal, abs($newDecimalPointPosition - $number->getSignificantDigits()), "0", STR_PAD_LEFT);
        }

    }

}