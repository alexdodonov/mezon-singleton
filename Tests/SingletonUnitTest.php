<?php

class SingletonFoo extends \Mezon\Singleton\Singleton
{

    public $tmp = 'Default foo value';
}

class SingletonBar extends \Mezon\Singleton\Singleton
{

    public $tmp = 'Default bar value';
}

class SingletonParams extends \Mezon\Singleton\Singleton
{

    public $tmp = 0;

    public function __construct($param)
    {
        $this->tmp = $param;
    }
}

function hack()
{
    return SingletonParams::getInstance(1);
}

class SingletonUnitTest extends \PHPUnit\Framework\TestCase
{

    /**
     * This test checks common singleton's functionality
     */
    public function testCommonWork()
    {
        $object = new SingletonFoo();

        $this->assertEquals('Default foo value', $object->tmp, 'Invalid object returned');

        $object->destroy();
    }

    /**
     * Test checks that second object can't be created.
     */
    public function testDirectCreationTest()
    {
        $object = new SingletonBar();

        try {
            $object = new SingletonBar();
        } catch (Exception $e) {
            $object->destroy();
            $this->assertEquals(true, true, 'Invalid object creation');
            return;
        }

        $this->assertFalse(false, 'Invalid object creation');
    }

    /**
     * Test checks new ClassName() directives work.
     */
    public function testTwoObjects()
    {
        $object1 = new SingletonFoo();
        $object2 = new SingletonBar();

        $this->assertEquals('Default foo value', $object1->tmp, 'Invalid object returned');
        $this->assertEquals('Default bar value', $object2->tmp, 'Invalid object returned');

        $object1->destroy();
        $object2->destroy();
    }

    /**
     * Test checks new ClassName() directives work.
     */
    public function testCloneObject()
    {
        $object1 = new SingletonFoo();

        try {
            $object2 = clone $object1;
        } catch (Exception $e) {
            $object1->destroy();
            $this->assertEquals(true, true, 'Invalid object cloning');
            return;
        }

        $this->assertFalse(false, 'Invalid object cloning');
        $object2->destroy();
    }

    /**
     * Validating params passing through constructor.
     */
    public function testArgsPassing()
    {
        $object = hack();

        $this->assertEquals(1, $object->tmp, 'Params were not passed');

        $object->destroy();
    }
}
