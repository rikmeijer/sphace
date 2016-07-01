<?php
declare(strict_types = 1);
namespace Sphace\GUI\Layout;

class Plain implements \Sphace\GUI\Layout
{

    public function render(\Sphace\HTML5\DOM $dom)
    {
        $dom->open('body')->close('body');
    }
}