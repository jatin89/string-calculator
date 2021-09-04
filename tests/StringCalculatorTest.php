<?php

require __DIR__ . "/../src/StringCalculator.php";

use jatinpatel\StringCalculator;
use PHPUnit\Framework\TestCase;

class StringCalculatorTest extends TestCase
{
    protected $calculator;

    public function setUp(): void
    {
        $this->calculator = new StringCalculator();
    }

    public function testOfAdd()
    {
        // test empty string
        $this->assertEquals(0, $this->calculator->Add("",""));
        // test 1
        // test 2
        // test many
        // test mix de
    }

}
