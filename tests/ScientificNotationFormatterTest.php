<?php

namespace ScientificNotationTests;


use ScientificNotation\Number;
use ScientificNotation\ScientificNotationFormatter;

class ScientificNotationFormatterTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @dataProvider dataProvider
     */
    public function testFormat($input, $expected)
    {
        $formatter = new ScientificNotationFormatter();

        $formatted = $formatter->format($input);

        $this->assertEquals($expected, $formatted);
        $this->assertInternalType('string', $formatted);
    }

    public function dataProvider()
    {
        return [
            [new Number(0.0,0), "0x10^0"],
            [new Number(1.0,0), "1x10^0"],
            [new Number(2.0,1), "2x10^1"],
            [new Number(3.0,6), "3x10^6"],
            [new Number(4.0,5), "4x10^5"],
            [new Number(8.093,-3), "8.093x10^-3"],
            [new Number(7.835,-3), "7.835x10^-3"],
            [new Number(3,-6), "3x10^-6"],
            [new Number(6.5,-7), "6.5x10^-7"],
        ];
    }
}
