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
    
    public function testOpen_When_ForbiddenCharacters_Expect_FilteredOpeningTag()
    {
        $object = new DOM();
        
        $openedObject = $object->open('ht&m&l');
        
        $this->assertEquals("<!DOCTYPE html><html>", $openedObject->__toString());
    }
    
    public function testOpen_When_EscapableAttributes_Expect_WellformedOpeningTagWithEscapedAttributes()
    {
        $object = new DOM();
        
        $openedObject = $object->open('html', ['lang' => 'ën']);
        
        $this->assertEquals('<!DOCTYPE html><html lang="&euml;n">', $openedObject->__toString());
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

    public function testClose_When_NoAttributesCalledNested_Expect_WellformedClosingTagAndNestedClosingTag()
    {
        $object = new DOM();
    
        $openedObject = $object->close('html')->close('head');
    
        $this->assertEquals("<!DOCTYPE html></html></head>", $openedObject->__toString());
    }
    
    public function testText_When_SimpleText_Expect_SimpleText()
    {
        $object = new DOM();
    
        $openedObject = $object->text('Hello World');
    
        $this->assertEquals("<!DOCTYPE html>Hello World", $openedObject->__toString());
    }


    public function testText_When_EscapableText_Expect_EscapedText()
    {
        $object = new DOM();
    
        $openedObject = $object->text('Hello Wörld');
    
        $this->assertEquals("<!DOCTYPE html>Hello W&ouml;rld", $openedObject->__toString());
    }
}