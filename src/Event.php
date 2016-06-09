<?php
/**
 * Created by PhpStorm.
 * User: Rik Meijer
 * Date: 9-6-2016
 * Time: 11:46
 */

namespace Sphace;


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
        call_user_func($this->callback);
    }
}