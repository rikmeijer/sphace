<?php
use Sphace\GUI\Window;

require __DIR__ . DIRECTORY_SEPARATOR . "vendor" . DIRECTORY_SEPARATOR . "autoload.php";

$windowDescription = json_decode(file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . "src" . DIRECTORY_SEPARATOR . "public.json"), false);

$window = new Window($windowDescription->title);

echo file_put_contents(__DIR__ . DIRECTORY_SEPARATOR . "public" . DIRECTORY_SEPARATOR . "index.html", $window->render());