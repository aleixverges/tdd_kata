<?php

namespace Tests\StringCalculator;

use Calculator\StringCalculator;
use PHPUnit\Framework\TestCase;

class StringCalculatorTest extends TestCase
{
    /** @var StringCalculator */
    private $calculator;

    protected function setUp()
    {
        $this->calculator = new StringCalculator();
    }

    public function test_should_return_zero_when_no_arguments()
    {
        static::assertSame(0, $this->calculator->add());
    }

    public function test_should_return_zero_when_empty_argument()
    {
        static::assertSame(0, $this->calculator->add(''));
    }

    public function test_should_sum_a_group_of_numbers()
    {
        static::assertSame(6, $this->calculator->add('1, 2, 3'));
    }

    public function test_should_sum_numbers_spearated_by_new_line()
    {
        static::assertSame(6, $this->calculator->add("1\n2, 3"));
    }

    public function test_it_should_ignore_non_numeric_arguments()
    {
        static::assertSame(3, $this->calculator->add("1\n2, this not a number"));
    }

    public function test_should_throw_exception_when_negative_numbers()
    {
        $this->expectException(\InvalidArgumentException::class);

        $this->calculator->add('1, -2');
    }

    public function test_should_throw_exception_with_all_negative_numbers_when_several()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Negative numbers not allowed: -1, -2');

        $this->calculator->add('-1, -2, 5');
    }

    public function test_should_process_numbers_till_thousand()
    {
        static::assertSame(1002, $this->calculator->add('2, 1000'));
    }

    public function test_should_ignore_numbers_bigger_than_thousand()
    {
        static::assertSame(2, $this->calculator->add('2, 1001'));
    }
}
