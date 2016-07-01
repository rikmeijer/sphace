<?php
declare(strict_types = 1);
namespace Sphace\GUI\Layout;

class Plain implements \Sphace\GUI\Layout
{

    public function render(): \Sphace\HTML5\DOM
    {
        return \Sphace\HTML5\fragment()->open('body')->close('body');
    }
}