<?php
declare(strict_types = 1);
namespace Sphace\HTML5;

function dom(): DOM {
    return new DOM('<!DOCTYPE html>');
}

function fragment(): DOM {
    return new DOM('');
}
