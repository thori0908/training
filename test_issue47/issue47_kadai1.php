<?php

require_once 'adder.php';

class AdderTest extends PHPUnit_Framework_TestCase
{
    public function testAdder() {
        $adder = new Adder();
        $this->assertEquals(3, $adder->add(1, 2));
    }
}
