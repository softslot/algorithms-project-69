<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertTrue;

class TrueTest extends TestCase
{
    public function testTrue(): void
    {
        assertTrue(true);
    }
}
