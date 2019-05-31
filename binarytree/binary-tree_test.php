<?php

include_once 'binary-tree.php';

class BinaryTreeTest extends PHPUnit\Framework\TestCase
{
    public function testCreate()
    {
        $this->assertEquals("Right", solution([1,4,100,5]));
    }

    public function testCreate2()
    {
        $this->assertEquals("", solution([1,10,5,1,0,6]));
    }

    public function testCreate3()
    {
        $this->assertEquals("Left", solution([3,6,2,9,-1,10]));
    }

}
