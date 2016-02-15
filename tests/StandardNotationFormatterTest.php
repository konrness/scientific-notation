<?php

namespace ScientificNotationTests;


use ScientificNotation\Number;
use ScientificNotation\StandardNotationFormatter;

class StandardNotationFormatterTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @dataProvider dataProvider
     */
    public function testFormat($input, $expected)
    {
        $formatter = new StandardNotationFormatter();

        $formatted = $formatter->format($input);

        $this->assertEquals($expected, $formatted);
        $this->assertInternalType('string', $formatted);
    }

    public function dataProvider()
    {
        return [
            [new Number(0.0,0), "0"],
            [new Number(1.0,0), "1"],
            [new Number(2.0,1), "20"],
            [new Number(3.0,6), "3000000"],
            [new Number(8.093,-3), "0.008093"],
            [new Number(7.835,-3), "0.007835"],
            [new Number(6.5,-7), "0.00000065"],
            [new Number(3,-6), "0.000003"],
            [new Number(6.538759,2), "653.8759"],
            [new Number(6.538759,1), "65.38759"],
            [new Number(6.538759,0), "6.538759"],
            [new Number(6.538759,-1), "0.6538759"],
            [new Number(6.538759,-2), "0.06538759"],
        ];
    }
}
