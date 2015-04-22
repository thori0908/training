<?php

require_once 'adder.php';

class AdderTest extends PHPUnit_Framework_TestCase
{
    public function testAdder() {
        $adder = new Adder();
        $this->assertEquals(3,   $adder->add(1, 2));   //1 + 2 = 3
        $this->assertEquals(-1,  $adder->add(1, -2));  //1 - 2 = -1
        $this->assertEquals(2.5, $adder->add(1, 1.5)); //1 + 1.5 = 2.5
    }
}
