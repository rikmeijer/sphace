<?php
declare(strict_types = 1);
namespace Sphace;

interface GUI
{

    function render(\Sphace\HTML5\DOM $dom);
}