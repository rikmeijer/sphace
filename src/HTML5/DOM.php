<?php
declare(strict_types = 1);
namespace Sphace\HTML5;

class DOM
{
    private $html = '<!DOCTYPE html>';

    public function open(string $tag, array $attributes = []): DOM
    {
        $this->html .= '<' . $tag;
        if (count($attributes) > 0) {
            $this->html .= ' ';
            foreach ($attributes as $key => $value) {
                $this->html .= $key . '="' . $value . '"';
            }
        }
        $this->html .= '>';
        return $this;
    }
    
    public function close(string $tag): DOM
    {
        $this->html .= '</' . $tag .'>';
        return $this;
    }
    
    public function text(string $text): DOM
    {
        $this->html .= $text;
        return $this;
    }
    
    public function __toString(): string
    {
        return $this->html;
    }
}
