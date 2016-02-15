<?php

namespace ScientificNotationTests;


use ScientificNotation\Number;

class NumberTest extends \PHPUnit_Framework_TestCase
{

    public function testConstructor()
    {
        $number = new Number(1,2,3);

        $this->assertEquals(1, $number->getCoefficient());
        $this->assertEquals(2, $number->getExponent());
        $this->assertEquals(3, $number->getBase());
    }

    public function testGettersSetters()
    {
        $number = new Number();

        $number->setCoefficient(1);
        $number->setExponent(2);
        $number->setBase(3);

        $this->assertEquals(1, $number->getCoefficient());
        $this->assertEquals(2, $number->getExponent());
        $this->assertEquals(3, $number->getBase());
    }

    /**
     * @dataProvider significantDigitsProvider
     */
    public function testSignificantDigits(Number $number, $expectedSignificantDigits)
    {
        $this->assertEquals($expectedSignificantDigits, $number->getSignificantDigits());
    }

    public function significantDigitsProvider()
    {
        return [
            [new Number(0, 0), 1],
            [new Number(1, 0), 1],
            [new Number(2.0, 0), 1],
            [new Number(3, 6), 1],
            [new Number(8.093, -2), 4],
            [new Number(7.835, -7), 4],
            [new Number(6.5, 0), 2],
            [new Number(6.52, 0), 3],
            [new Number(6.0, 0), 1],
        ];
    }
}
