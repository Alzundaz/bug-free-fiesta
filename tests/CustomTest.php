<?php

namespace Alzundaz\BugFreeFiesta\Tests;

use Alzundaz\BugFreeFiesta\Custom;
use Alzundaz\BugFreeFiesta\Collection;
use PHPUnit\Framework\TestCase;

/**
 * @covers Alzundaz\BugFreeFiesta\Custom
 * If present covers on methods are optionnal.
 */
class CustomTest extends TestCase
{
    /**
     * @covers Alzundaz\BugFreeFiesta\Custom::__construct
     */
    public function testInstanciate()
    {
        $mock = $this->createMock(Collection::class);
        $custom = new Custom($mock);
        $this->assertInstanceOf(Custom::class, $custom);
    }

    /**
     * @covers Alzundaz\BugFreeFiesta\Custom::add
     */
    public function testAdd()
    {
        $mock = $this->createMock(Collection::class);
        $mock->expects($this->once())
            ->method('set')
            ->with($this->equalTo('42'), $this->equalTo('42'));

        $custom = new Custom($mock);
        $custom->add(42);
    }
}
