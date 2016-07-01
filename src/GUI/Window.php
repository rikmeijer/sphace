<?php
declare(strict_types = 1);
namespace Sphace\GUI;

class Window implements \Sphace\GUI
{
    
    /**
     * 
     * @var string
     */
    private $title;

    /**
     * 
     * @var Layout
     */
    private $layout;

    /**
     * Window constructor.
     */
    public function __construct(string $title, Layout $layout)
    {
        $this->title = $title;
        $this->layout = $layout;
    }

    public function render(\Sphace\HTML5\DOM $dom)
    {
        $dom->open('html')->open('head')->open('title')->text($this->title)->close('title')->close('head');
        $this->layout->render($dom);
        $dom->close('html');
    }
}