<?php
/**
 * Challenge Yourselph - 039
 * Efficient Scientific Notation
 *
 * Usage:
 *  php scientific-notation 300000
 *  php scientific-notation 0.00783500000
 *
 * @author Konr Ness <konr.ness@gmail.com>
 */


// parse command options
$input = isset($argv[1]) ? $argv[1] : null;

if (null === $input) {
    echo <<<HELP
Usage:
  php scientific-notation.php <number>

  <number>   A positive float number

Output:
  The shortest way to represent <input> is <output>

HELP;

    exit();
}

require_once __DIR__ . '/vendor/autoload.php';

$numberParser = new \ScientificNotation\NumberParser();

try {
    $number = $numberParser->parse($input);
} catch (InvalidArgumentException $e) {
    echo $e->getMessage() . PHP_EOL;
    exit(1);
}

$shortestNotationFormatter = new \ScientificNotation\ShortestNotationFormatter();
$output = $shortestNotationFormatter->format($number);

echo sprintf("The shortest way to represent %s is %s", $input, $output) . PHP_EOL;