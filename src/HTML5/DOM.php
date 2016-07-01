<?php
declare(strict_types = 1);
namespace Sphace\HTML5;

class DOM
{
    private $html = '<!DOCTYPE html>';

    public function open(string $tag, array $attributes = []): DOM
    {
        $this->html .= '<' . preg_replace("/[^a-zA-Z0-9]+/", "", $tag);
        if (count($attributes) > 0) {
            $this->html .= ' ';
            foreach ($attributes as $key => $value) {
                $this->html .= $key . '="' . htmlentities($value, ENT_HTML5) . '"';
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
        $this->html .= htmlentities($text, ENT_HTML5);
        return $this;
    }
    
    public function __toString(): string
    {
        return $this->html;
    }
}
