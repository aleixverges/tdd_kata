<?php

namespace Tests;

use Calculator\Calc;
use PHPUnit\Framework\TestCase;

class CalcTest extends TestCase
{
    /** @var Calc */
    private $calculator;

    protected function setUp()
    {
        $this->calculator = new Calc();
    }

    public function test_it_should_create_instance()
    {
        static::assertInstanceOf(Calc::class, $this->calculator);
    }

    public function test_it_should_be_zero_when_no_arguments()
    {
        static::assertSame(0, $this->calculator->result());
    }

    public function test_it_should_add()
    {
        $this->calculator->add(7);

        static::assertSame(7, $this->calculator->result());
    }

    public function test_should_throw_exception_when_trying_to_add_with_string()
    {
        $this->expectException(\InvalidArgumentException::class);

        $this->calculator->add('four');
    }

    public function test_should_add_with_more_than_one_number()
    {
        $this->calculator->add(1, 2, 3, 4, 5);

        static::assertSame(15, $this->calculator->result());
    }

    public function test_should_substract_number()
    {
        $this->calculator->add(7);
        $this->calculator->subs(4);

        static::assertSame(3, $this->calculator->result());
    }
}
