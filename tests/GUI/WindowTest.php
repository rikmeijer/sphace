<?php
declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: Rik Meijer
 * Date: 8-6-2016
 * Time: 21:11
 */
namespace Sphace\GUI;

class WindowTest extends \PHPUnit_Framework_TestCase
{

    public function testRender_When_Default_Expect_WellFormedHTML5WithBODYTag()
    {
        $object = new Window("Hello World", new Layout\Plain());
        
        $html = $object->render();
        
        $this->assertEquals('<!DOCTYPE html><html><head><title>Hello World</title></head><body></body></html>', $html);
    }

    public function testRender_When_FixedLayoutPassed_Expect_WellFormedHTML5WithFixedLayoutBODYTag()
    {
        $object = new Window("Hello World", new Layout\Fixed(700));
        
        $html = $object->render();
        
        $this->assertEquals('<!DOCTYPE html><html><head><title>Hello World</title></head><body style="width: 700px;"></body></html>', $html);
    }

    public function testRender_When_NonASCIITitle_Expect_WellFormedHTML5WithBODYTag()
    {
        $object = new Window("Hello Wörld", new Layout\Plain());
        
        $html = $object->render();
        
        $this->assertEquals('<!DOCTYPE html><html><head><title>Hello W&ouml;rld</title></head><body></body></html>', $html);
    }
}
