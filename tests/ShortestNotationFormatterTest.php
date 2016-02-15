<?php

namespace ScientificNotationTests;


use ScientificNotation\Number;
use ScientificNotation\ShortestNotationFormatter;

class ShortestNotationFormatterTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @dataProvider dataProvider
     */
    public function testFormat($input, $expected)
    {
        $formatter = new ShortestNotationFormatter();

        $this->assertEquals($expected, $formatter->format($input));

    }

    public function dataProvider()
    {
        return [
            [new Number(0.0,0), "0"],
            [new Number(1.0,0), "1"],
            [new Number(2.0,1), "20"],
            [new Number(3.0,6), "3x10^6"],
            [new Number(4.0,5), "400000"],
            [new Number(8.093,-3), "0.008093"],
            [new Number(7.835,-3), "0.007835"],
            [new Number(3,-6), "3x10^-6"],
            [new Number(6.5,-7), "6.5x10^-7"],
        ];
    }
}
