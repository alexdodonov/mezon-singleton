<?php
namespace Mezon\Singleton\Tests;

use PHPUnit\Framework\TestCase;

/**
 * Method returns instance of the stored object
 *
 * @return SingletonParams
 * @psalm-suppress MoreSpecificReturnType, LessSpecificReturnStatement
 */
function hack(): SingletonParams
{
    return SingletonParams::getInstance(1);
}

/**
 *
 * @psalm-suppress PropertyNotSetInConstructor
 */
class SingletonUnitTest extends TestCase
{

    /**
     * This test checks common singleton's functionality
     */
    public function testCommonWork(): void
    {
        $object = new SingletonFoo();

        $this->assertEquals('Default foo value', $object->tmp, 'Invalid object returned');

        $object->destroy();
    }

    /**
     * Test checks that second object can't be created
     */
    public function testDirectCreationTest(): void
    {
        $object = new SingletonBar();

        try {
            $object = new SingletonBar();
        } catch (\Exception $e) {
            $object->destroy();
            $this->assertEquals(true, true, 'Invalid object creation');
            return;
        }

        $this->assertFalse(false, 'Invalid object creation');
    }

    /**
     * Test checks new ClassName() directives work
     */
    public function testTwoObjects(): void
    {
        $object1 = new SingletonFoo();
        $object2 = new SingletonBar();

        $this->assertEquals('Default foo value', $object1->tmp, 'Invalid object returned');
        $this->assertEquals('Default bar value', $object2->tmp, 'Invalid object returned');

        $object1->destroy();
        $object2->destroy();
    }

    /**
     * Test checks new ClassName() directives work
     */
    public function testCloneObject(): void
    {
        $object1 = new SingletonFoo();

        try {
            $object2 = clone $object1;
        } catch (\Exception $e) {
            $object1->destroy();
            $this->assertEquals(true, true, 'Invalid object cloning');
            return;
        }

        $this->assertFalse(false, 'Invalid object cloning');
        $object2->destroy();
    }

    /**
     * Validating params passing through constructor
     */
    public function testArgsPassing(): void
    {
        $object = hack();

        $this->assertEquals(1, $object->tmp, 'Params were not passed');

        $object->destroy();
    }
}
