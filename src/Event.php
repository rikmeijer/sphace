<?php declare(strict_types=1);
namespace Sphace;

/**
 * Created by PhpStorm.
 * User: Rik Meijer
 * Date: 9-6-2016
 * Time: 11:46
 */

class Event
{

    private $callback;

    /**
     * Event constructor.
     * @param callable $callback
     */
    public function __construct(callable $callback)
    {
        $this->callback = $callback;
    }

    public function trigger()
    {
        return call_user_func($this->callback);
    }
}