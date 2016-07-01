<?php
declare(strict_types = 1);
namespace Sphace\GUI;

class WindowTest extends \PHPUnit_Framework_TestCase
{

    public function testRender_When_Default_Expect_WellFormedHTML5WithBODYTag()
    {
        $object = new Window("Hello World", new Layout\Plain());
        $html = \Sphace\HTML5\dom();
        
        $object->render($html);
        
        $this->assertEquals('<!DOCTYPE html><html><head><title>Hello World</title></head><body></body></html>', (string)$html);
    }

    public function testRender_When_FixedLayoutPassed_Expect_WellFormedHTML5WithFixedLayoutBODYTag()
    {
        $object = new Window("Hello World", new Layout\Fixed(700));
        $html = \Sphace\HTML5\dom();
        
        $object->render($html);
        
        $this->assertEquals('<!DOCTYPE html><html><head><title>Hello World</title></head><body style="width: 700px;"></body></html>', (string)$html);
    }
}
