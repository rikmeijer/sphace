<?php
declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: Rik Meijer
 * Date: 8-6-2016
 * Time: 21:11
 */
namespace Sphace\GUI\Layout;

class FixedTest extends \PHPUnit_Framework_TestCase
{

    public function testRender_When_Default_Expect_WellFormedBODYTag()
    {
        $object = new Fixed(800);
        
        $html = $object->render();
        
        $this->assertEquals('<body style="width: 800px;"></body>', $html);
    }
}
