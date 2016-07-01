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

    public function render(): string
    {      
        return '<!DOCTYPE html><html><head><title>' . htmlentities($this->title) . '</title></head>' . $this->layout->render() . '</html>';
    }
}