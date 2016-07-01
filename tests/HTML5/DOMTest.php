<?php
declare(strict_types = 1);
namespace Sphace\HTML5;


/**        
        document()->open('html', [
            'lang' => 'en',
            'disabled'
        ])
            ->open('head')
            ->open('title')
            ->text("Hello World")
            ->close('title')
            ->close('head')
            ->close('html');
            */

class DOMTest extends \PHPUnit_Framework_TestCase
{

    public function testDom_When_Default_Expect_WellformedDoctype()
    {
        $this->assertEquals("<!DOCTYPE html>", dom()->__toString());
    }
    
    public function testOpen_When_NoAttributes_Expect_WellformedOpeningTag()
    {
        $object = new DOM();
        
        $openedObject = $object->open('html');
        
        $this->assertEquals("<!DOCTYPE html><html>", $openedObject->__toString());
    }
    
}