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

    public function render(): \Sphace\HTML5\DOM
    {
        return \Sphace\HTML5\dom()->open('html')->open('head')->open('title')->text($this->title)->close('title')->close('head')->append($this->layout->render())->close('html');
    }
}