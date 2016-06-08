<?php
/**
 * Created by PhpStorm.
 * User: Rik Meijer
 * Date: 8-6-2016
 * Time: 21:11
 */

namespace Sphace;


use Window;

class WindowTest extends \PHPUnit_Framework_TestCase
{

    public function testRender_When_Default_Expect_WeelFormedHTML5WithBODYTag()
    {
        $object = new Window();

        $html = $object->render();

        $this->assertEquals('<!DOCTYPE html><html><body></body></html>', $html);
    }
}
