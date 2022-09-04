<?php

namespace Alzundaz\BugFreeFiesta\Tests;

use Alzundaz\BugFreeFiesta\Collection;
use Exception;
use PHPUnit\Framework\TestCase;

/**
 * @covers Alzundaz\BugFreeFiesta\Collection
 */
class CollectionTest extends TestCase
{
    private $shortCollection = [1, 2, 3];

    public function testAllEmpty()
    {
        $collection = new Collection();
        $this->assertCount(0, $collection->all());
    }

    public function testAll()
    {
        $collection = new Collection($this->shortCollection);
        $this->assertCount(3, $collection->all());
    }

    public function testCountEmpty()
    {
        $collection = new Collection();
        $this->assertEquals(0, $collection->count());
    }

    public function testCount()
    {
        $collection = new Collection($this->shortCollection);
        $this->assertEquals(3, $collection->count());
    }

    public function testGetEmpty()
    {
        $collection = new Collection();
        $this->assertNull($collection->get(0));
    }

    public function testGet()
    {
        $collection = new Collection($this->shortCollection);
        $this->assertEquals(2, $collection->get(1));
    }

    public function testGetDefault()
    {
        $collection = new Collection($this->shortCollection);
        $this->assertEquals(42, $collection->get(5, 42));
    }

    public function testSetEmpty()
    {
        $collection = new Collection();
        $collection->set(2, 42);
        $this->assertEquals(42, $collection->get(2));
    }

    public function testSet()
    {
        $collection = new Collection($this->shortCollection);
        $collection->set(2, 42);
        $this->assertEquals(42, $collection->get(2));
    }

    /**
     * @throws Exception
     */
    public function testFirstEmpty()
    {
        $collection = new Collection();
        $this->expectExceptionObject(new Exception("Collection is empty"));
        $collection->first();
    }

    /**
     * @throws Exception
     */
    public function testFirst()
    {
        $collection = new Collection($this->shortCollection);
        $this->assertEquals(1, $collection->first());
    }

    /**
     * @throws Exception
     */
    public function testLastEmpty()
    {
        $collection = new Collection();
        $this->expectExceptionObject(new Exception("Collection is empty"));
        $collection->last();
    }

    /**
     * @throws Exception
     */
    public function testLast()
    {
        $collection = new Collection($this->shortCollection);
        $this->assertEquals(3, $collection->last());
    }

    public function testIsEmptyEmpty()
    {
        $collection = new Collection();
        $this->assertTrue($collection->isEmpty());
    }

    public function testIsEmpty()
    {
        $collection = new Collection($this->shortCollection);
        $this->assertFalse($collection->isEmpty());
    }

    public function testIsNotEmptyEmpty()
    {
        $collection = new Collection();
        $this->assertFalse($collection->isNotEmpty());
    }

    public function testIsNotEmpty()
    {
        $collection = new Collection($this->shortCollection);
        $this->assertTrue($collection->isNotEmpty());
    }
}
