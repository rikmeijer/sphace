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

    public function render(): string
    {
        return '<body style="width: ' . $this->width . 'px;"></body>';
    }
}