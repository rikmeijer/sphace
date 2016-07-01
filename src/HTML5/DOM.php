<?php
declare(strict_types = 1);
namespace Sphace\HTML5;

class DOM
{
    private $html = '<!DOCTYPE html>';
    
    private function filterTag(string $tag): string
    {
        return preg_replace("/[^a-zA-Z0-9]+/", "", $tag);
    }
    
    private function escape(string $text): string
    {
        return htmlentities($text, ENT_HTML5);
    }

    public function open(string $tag, array $attributes = []): DOM
    {
        $this->html .= '<' . $this->filterTag($tag);
        if (count($attributes) > 0) {
            $this->html .= ' ';
            foreach ($attributes as $key => $value) {
                $this->html .= $key . '="' . $this->escape($value) . '"';
            }
        }
        $this->html .= '>';
        return $this;
    }
    
    public function close(string $tag): DOM
    {
        $this->html .= '</' . $this->filterTag($tag) .'>';
        return $this;
    }
    
    public function text(string $text): DOM
    {
        $this->html .= $this->escape($text);
        return $this;
    }
    
    public function __toString(): string
    {
        return $this->html;
    }
}
