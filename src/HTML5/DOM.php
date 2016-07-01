<?php
declare(strict_types = 1);
namespace Sphace\HTML5;

class DOM
{
    private $html = '<!DOCTYPE html>';

    public function open(string $tag): DOM
    {
        $this->html .= '<' . $tag . '>';
        return $this;
    }
    
    public function __toString(): string
    {
        return $this->html;
    }
}
