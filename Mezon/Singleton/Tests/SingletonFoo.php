<?php
namespace Mezon\Singleton\Tests;

use Mezon\Singleton\Singleton;

class SingletonFoo extends Singleton
{

    /**
     * Temporary variable
     *
     * @var string
     */
    public $tmp = 'Default foo value';
}
