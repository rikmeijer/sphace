<?php
/**
 * Created by PhpStorm.
 * User: Rik Meijer
 * Date: 9-6-2016
 * Time: 11:38
 */

namespace Sphace;


class EventTest extends \PHPUnit_Framework_TestCase
{
    public function testTrigger_When_CallbackGiven_Expect_CallbackCalled()
    {
        $called = false;
        $event = new Event(function() use (&$called) {
            $called = true;
        });

        $event->trigger();

        $this->assertTrue($called);
    }


}
