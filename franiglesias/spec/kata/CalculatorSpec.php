<?php

namespace spec\kata;

use kata\Calculator;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CalculatorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Calculator::class);
    }

    public function it_has_an_add_method_that_accepts_string()
    {
        $this->add('')->shouldReturn(0);
    }

    public function it_can_manage_a_string_with_one_number()
    {
        $this->add('5')->shouldReturn(5);
        $this->add('123')->shouldReturn(123);
    }

    public function it_can_manage_a_string_with_two_numbers()
    {
        $this->add('8,5')->shouldReturn(13);
        $this->add('8,  5')->shouldReturn(13);
        $this->add('82,53')->shouldReturn(135);
    }

    public function it_can_manage_several_numbers()
    {
        $this->add('3,5,8,4')->shouldReturn(20);
    }

    public function it_can_manage_cr_as_separator()
    {
        $this->add("1\n2,3")->shouldReturn(6);
    }

    public function it_throws_exception_when_malformed()
    {
        $this->shouldThrow(\InvalidArgumentException::class)->during('add', ["1,\n"]);
    }
}
