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
        // test empty
        $this->assertEquals(0, $this->calculator->Add(''));
        // test one
        $this->assertEquals(1000, $this->calculator->Add('1000'));
        // test many
        $this->assertEquals(8, $this->calculator->Add('1,2,5'));
        // test with number bigger than 1000
        $this->assertEquals(2, $this->calculator->Add("2,1001"));
        // test with new line
        $this->assertEquals(6, $this->calculator->Add("1\n,2,3"));
        // test with delimiter(s)
        $this->assertEquals(8, $this->calculator->Add("//;\n1;3;4"));
        $this->assertEquals(6, $this->calculator->Add("//$\n1$2$3"));
        $this->assertEquals(13, $this->calculator->Add("//@\n2@3@8"));
       // arbitary delimiter
        $this->assertEquals(6, $this->calculator->Add("//***\n1***2***3"));
        // multiple delimiters
        $this->assertEquals(6, $this->calculator->Add("//$,@\n1$2@3"));
    }

}
