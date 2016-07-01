<?php
declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: Rik Meijer
 * Date: 8-6-2016
 * Time: 21:19
 */
namespace Sphace\GUI;

class Window
{

    private $title;
    private $layout;

    /**
     * Window constructor.
     */
    public function __construct(string $title, Layout $layout)
    {
        $this->title = $title;
        $this->layout = $layout;
    }

    public function render()
    {
        return '<!DOCTYPE html><html><head><title>' . htmlentities($this->title) . '</title></head>' . $this->layout->render() . '</html>';
    }
}