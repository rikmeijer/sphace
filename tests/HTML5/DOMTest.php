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
    
    public function testOpen_When_Attributes_Expect_WellformedOpeningTagWithAttributes()
    {
        $object = new DOM();
        
        $openedObject = $object->open('html', ['lang' => 'en']);
        
        $this->assertEquals('<!DOCTYPE html><html lang="en">', $openedObject->__toString());
    }

    public function testOpen_When_NoAttributesCalledNested_Expect_WellformedOpeningTagAndNestedOpeningTag()
    {
        $object = new DOM();
    
        $openedObject = $object->open('html')->open('head');
    
        $this->assertEquals("<!DOCTYPE html><html><head>", $openedObject->__toString());
    }
    
    public function testClose_When_Default_Expect_WellformedClosingTag()
    {
        $object = new DOM();
        
        $openedObject = $object->close('html');
        
        $this->assertEquals("<!DOCTYPE html></html>", $openedObject->__toString());
    }
    
}