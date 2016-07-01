<?php
declare(strict_types = 1);
namespace Sphace\GUI\Layout;

class Plain implements \Sphace\GUI\Layout
{

    public function render(): string
    {
        return '<body></body>';
    }
}