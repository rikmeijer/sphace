<?php
declare(strict_types = 1);
namespace Sphace\HTML5;

function dom() {
    return new class {
      public function __toString() {
          return '<!DOCTYPE html>';
      }
    };
}
