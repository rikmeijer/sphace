<?php
use Sphace\GUI\Window;
use Sphace\GUI\Layout\Fixed;
use Sphace\GUI\Layout\Plain;

require __DIR__ . DIRECTORY_SEPARATOR . "vendor" . DIRECTORY_SEPARATOR . "autoload.php";

$windowDescription = json_decode(file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . "src" . DIRECTORY_SEPARATOR . "public.json"), false);

switch ($windowDescription->layout[0]) {
    case 'fixed':
        $layout = new Fixed($windowDescription->layout[1]->width);
        break;
        
    default:
        $layout = new Plain();
        break;
}

$window = new Window($windowDescription->title, $layout);

echo file_put_contents(__DIR__ . DIRECTORY_SEPARATOR . "public" . DIRECTORY_SEPARATOR . "index.html", $window->render());