<?php
declare(strict_types = 1);
namespace Sphace\HTML5;

class DOM
{
    private $html;
    
    private function filterTag(string $tag): string
    {
        return preg_replace("/[^a-zA-Z0-9]+/", "", $tag);
    }
    
    private function filterAttribute(string $key): string
    {
        return preg_replace("/\s+/", "-", $key);
    }
    
    private function escape(string $text): string
    {
        return htmlentities($text, ENT_HTML5);
    }

    public function append(DOM $dom): DOM
    {
        $this->html .= $dom->html;
        return $this;
    }
    
    public function open(string $tag, array $attributes = []): DOM
    {
        $this->html .= '<' . $this->filterTag($tag);
        if (count($attributes) > 0) {
            foreach ($attributes as $key => $value) {
                $this->html .= ' ';
                if (is_integer($key)) {
                    $this->html .= $this->filterAttribute($value);
                } else {
                    $this->html .= $this->filterAttribute($key) . '="' . $this->escape($value) . '"';
                }
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
        return '<!DOCTYPE html>' . $this->html;
    }
}
