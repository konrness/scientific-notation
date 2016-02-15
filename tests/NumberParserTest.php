<?php

namespace ScientificNotationTests;


use ScientificNotation\NumberParser;

class NumberParserTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @dataProvider dataProvider
     */
    public function testParse($input, $expectedCoefficient, $expectedExponent)
    {
        $parser = new NumberParser();

        $number = $parser->parse($input);

        $this->assertEquals($expectedCoefficient, $number->getCoefficient(), "Coefficient doesn't match");
        $this->assertInternalType('float', $number->getCoefficient());

        $this->assertEquals($expectedExponent, $number->getExponent(), "Exponent doesn't match");
        $this->assertInternalType('int', $number->getExponent());

        $this->assertEquals(10, $number->getBase(), "Base doesn't match");
        $this->assertInternalType('int', $number->getBase());

    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Unable to parse number: negative numbers are not supported
     */
    public function testParseNegativeNumber()
    {
        $parser = new NumberParser();

        $parser->parse("-0.0234");
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Unable to parse number: invalid format
     */
    public function testParseNonNumber()
    {
        $parser = new NumberParser();

        $parser->parse("foo");
    }

    public function dataProvider()
    {
        return [
            ["0", 0, 0],
            ["1", 1, 0],
            ["20", 2, 1],
            ["3000000", 3, 6],
            ["0.008093", 8.093, -3],
            ["0.007835000000000", 7.835, -3],
            ["0.000003000000", 3, -6],
            ["0.00000065", 6.5, -7],
            ["65.38759", 6.538759, 1],
        ];
    }

}
