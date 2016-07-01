<?php
declare(strict_types = 1);
namespace Sphace\GUI\Layout;

class Fixed implements \Sphace\GUI\Layout
{

    /**
     * 
     * @var int
     */
    private $width;

    public function __construct(int $width)
    {
        $this->width = $width;
    }

    public function render(\Sphace\HTML5\DOM $dom)
    {
        $dom->open('body', ['style' => "width: " . $this->width . "px;"])->close('body');
    }
}