<?php
namespace Mezon\Singleton\Tests;

use Mezon\Singleton\Singleton;

class SingletonBar extends Singleton
{

    /**
     * Temporary variable
     *
     * @var string
     */
    public $tmp = 'Default bar value';
}
