<?php

namespace App\Interfaces;

interface CollageManagerInterface
{
    public function generate(string $pathToImageFolder): string;
}
