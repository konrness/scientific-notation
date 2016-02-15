<?php

namespace ScientificNotation;


class ShortestNotationFormatter
{
    /**
     * @var ScientificNotationFormatter
     */
    private $scientificNotationFormatter;

    /**
     * @var StandardNotationFormatter
     */
    private $standardNotationFormatter;

    public function __construct()
    {
        $this->scientificNotationFormatter = new ScientificNotationFormatter();
        $this->standardNotationFormatter = new StandardNotationFormatter();
    }

    public function format(Number $number)
    {
        $scientificNotation = $this->scientificNotationFormatter->format($number);
        $standardNotation   = $this->standardNotationFormatter->format($number);

        return (strlen($scientificNotation) < strlen($standardNotation)) ? $scientificNotation : $standardNotation;
    }

}