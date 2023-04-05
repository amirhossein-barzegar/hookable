<?php

namespace Tests;

use PHPUnit\Framework\TestCase as PHPUnitTestCase;

class TestCase extends PHPUnitTestCase
{
    public function getFileNameFromRoot($filename): string
    {
        return str_replace('\\', '/', dirname(__DIR__)) . "/{$filename}";
    }
}