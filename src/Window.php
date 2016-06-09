<?php
declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: Rik Meijer
 * Date: 8-6-2016
 * Time: 21:19
 */
namespace Sphace;

class Window
{

    private $title;

    /**
     * Window constructor.
     */
    public function __construct(string $title)
    {
        $this->title = $title;
    }

    public function render()
    {
        return '<!DOCTYPE html><html><head><title>' . htmlentities($this->title) . '</title></head><body></body></html>';
    }
}