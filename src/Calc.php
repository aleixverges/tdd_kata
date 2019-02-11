<?php

namespace Calculator;

class Calc
{
    private $result = 0;

    public function result()
    {
        return $this->result;
    }

    public function add(...$numbers)
    {
        foreach ($numbers as $number) {
            $this->checkArgument($number);
            $this->result += $number;
        }
    }

    public function subs(...$numbers)
    {
        foreach ($numbers as $number) {
            $this->checkArgument($number);
            $this->result -= $number;
        }
    }

    /**
     * @param $number
     */
    private function checkArgument($number): void
    {
        if (!is_numeric($number)) {
            throw new \InvalidArgumentException('Argument cannot be a string');
        }
    }
}
