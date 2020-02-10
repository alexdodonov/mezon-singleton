<?php
namespace Mezon\Singleton;

/**
 * Class Singleton
 *
 * @package Mezon
 * @subpackage Singleton
 * @author Dodonov A.A.
 * @version v.1.0 (2019/08/17)
 * @copyright Copyright (c) 2019, aeon.org
 */

/**
 * Singleton class
 */
class Singleton
{

    /**
     * Created instances of different objects
     */
    private static $instances;

    /**
     * Constructor
     */
    public function __construct()
    {
        $className = get_class($this);

        if (isset(self::$instances[$className])) {
            throw (new \Exception("You can not create more than one copy of a singleton of type $className"));
        } else {
            self::$instances[$className] = $this;
        }
    }

    /**
     * Function returns instance of the object
     */
    public static function getInstance()
    {
        $className = get_called_class();

        if (! isset(self::$instances[$className])) {
            $args = func_get_args();

            $reflectionObject = new \ReflectionClass($className);

            self::$instances[$className] = $reflectionObject->newInstanceArgs($args);
        }

        return self::$instances[$className];
    }

    /**
     * Cloner
     */
    public function __clone()
    {
        throw (new \Exception('You can not clone a singleton.'));
    }

    /**
     * Destroy object
     */
    public function destroy()
    {
        $className = get_called_class();

        if (isset(self::$instances[$className])) {
            unset(self::$instances[$className]);
        }
    }
}
