<?php
declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: Rik Meijer
 * Date: 9-6-2016
 * Time: 11:38
 */
namespace Sphace\GUI;

class EventTest extends \PHPUnit_Framework_TestCase
{

    public function testTrigger_When_CallbackGiven_Expect_CallbackCalled()
    {
        $called = false;
        $event = new Event(function () use (&$called) {
            $called = true;
        });
        
        $event->trigger();
        
        $this->assertTrue($called);
    }

    public function testTrigger_When_CallbackGivenWithReturnValue_Expect_ReturnCallbackValue()
    {
        $event = new Event(function () {
            return 'Hello World';
        });
        
        $this->assertEquals('Hello World', $event->trigger());
    }
}
