<?php
declare(strict_types = 1);
namespace Sphace\HTML5;

class FragmentTest extends \PHPUnit_Framework_TestCase
{    
    public function testConstructor_When_RawHTMLPassed_Expect_RawHTMLPrepended()
    {
        $object = new Fragment('<!DOCTYPE html>');
    
        $openedObject = $object->open('html');
    
        $this->assertEquals("<!DOCTYPE html><html>", $openedObject->__toString());
    }
    
    
    public function testOpen_When_NoAttributes_Expect_WellformedOpeningTag()
    {
        $object = new Fragment();
        
        $openedObject = $object->open('html');
        
        $this->assertEquals("<html>", $openedObject->__toString());
    }
    
    public function testOpen_When_Attributes_Expect_WellformedOpeningTagWithAttributes()
    {
        $object = new Fragment();
        
        $openedObject = $object->open('html', ['lang' => 'en']);
        
        $this->assertEquals('<html lang="en">', $openedObject->__toString());
    }
    
    public function testOpen_When_AttributeWithSpace_Expect_WellformedOpeningTagWithAttributes()
    {
        $object = new Fragment();
        
        $openedObject = $object->open('html', ['lan g' => 'en']);
        
        $this->assertEquals('<html lan-g="en">', $openedObject->__toString());
    }

    public function testOpen_When_NonValuedAttributes_Expect_WellformedOpeningTagWithAttributes()
    {
        $object = new Fragment();
    
        $openedObject = $object->open('html', ['lang' => 'en', 'disabled']);
    
        $this->assertEquals('<html lang="en" disabled>', $openedObject->__toString());
    }


    public function testOpen_When_NonValuedAttributesWithSpaces_Expect_WellformedOpeningTagWithAttributes()
    {
        $object = new Fragment();
    
        $openedObject = $object->open('html', ['lang' => 'en', 'disa bled']);
    
        $this->assertEquals('<html lang="en" disa-bled>', $openedObject->__toString());
    }
    
    public function testOpen_When_ForbiddenCharacters_Expect_FilteredOpeningTag()
    {
        $object = new Fragment();
        
        $openedObject = $object->open('ht&m&l');
        
        $this->assertEquals("<html>", $openedObject->__toString());
    }
    
    public function testOpen_When_DoubleQuotedAttributes_Expect_WellformedOpeningTagWithEscapedAttributes()
    {
        $object = new Fragment();
        
        $openedObject = $object->open('html', ['lang' => '"n']);
        
        $this->assertEquals('<html lang="&quot;n">', $openedObject->__toString());
    }

    public function testOpen_When_NoAttributesCalledNested_Expect_WellformedOpeningTagAndNestedOpeningTag()
    {
        $object = new Fragment();
    
        $openedObject = $object->open('html')->open('head');
    
        $this->assertEquals("<html><head>", $openedObject->__toString());
    }
    
    public function testClose_When_Default_Expect_WellformedClosingTag()
    {
        $object = new Fragment();
        
        $openedObject = $object->close('html');
        
        $this->assertEquals("</html>", $openedObject->__toString());
    }
    
    public function testClose_When_ForbiddenCharacters_Expect_FilteredClosingTag()
    {
        $object = new Fragment();
        
        $openedObject = $object->close('ht&m&l');
        
        $this->assertEquals("</html>", $openedObject->__toString());
    }

    public function testClose_When_NoAttributesCalledNested_Expect_WellformedClosingTagAndNestedClosingTag()
    {
        $object = new Fragment();
    
        $openedObject = $object->close('html')->close('head');
    
        $this->assertEquals("</html></head>", $openedObject->__toString());
    }
    
    public function testText_When_SimpleText_Expect_SimpleText()
    {
        $object = new Fragment();
    
        $openedObject = $object->text('Hello World');
    
        $this->assertEquals("Hello World", $openedObject->__toString());
    }


    public function testText_When_EscapableText_Expect_EscapedText()
    {
        $object = new Fragment();
    
        $openedObject = $object->text('Hello Wörld');
    
        $this->assertEquals("Hello W&ouml;rld", $openedObject->__toString());
    }
    
    public function testAppend_When_DOM_Expect_AppendedHTML()
    {
        $object = new Fragment();
    
        $openedObject = $object->append((new Fragment())->open("html"));
    
        $this->assertEquals("<html>", $openedObject->__toString());
    }
}