<?php
declare(strict_types = 1);
namespace Sphace\GUI\Layout;

class PlainTest extends \PHPUnit_Framework_TestCase
{

    public function testRender_When_Default_Expect_WellFormedBODYTag()
    {
        $object = new Plain();
        
        $html = $object->render();
        
        $this->assertEquals('<body></body>', $html);
    }
}
