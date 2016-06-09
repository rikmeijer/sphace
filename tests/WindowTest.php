<?php
/**
 * Created by PhpStorm.
 * User: Rik Meijer
 * Date: 8-6-2016
 * Time: 21:11
 */

namespace Sphace;

class WindowTest extends \PHPUnit_Framework_TestCase
{

    public function testRender_When_Default_Expect_WeelFormedHTML5WithBODYTag()
    {
        $object = new Window("Hello World");

        $html = $object->render();

        $this->assertEquals('<!DOCTYPE html><html><head><title>Hello World</title></head><body></body></html>', $html);
    }
}
