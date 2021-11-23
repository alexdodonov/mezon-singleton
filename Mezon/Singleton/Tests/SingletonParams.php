<?php
namespace Mezon\Singleton\Tests;

use Mezon\Singleton\Singleton;

class SingletonParams extends Singleton
{

    /**
     * Temporary field
     *
     * @var integer
     */
    public $tmp = 0;

    /**
     * Initial parameter
     *
     * @param int $param
     */
    public function __construct(int $param)
    {
        $this->tmp = $param;
    }
}
