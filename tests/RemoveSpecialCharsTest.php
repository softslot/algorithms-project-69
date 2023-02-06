<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

use function App\removeSpecialChars;
use function PHPUnit\Framework\assertEquals;

class RemoveSpecialCharsTest extends TestCase
{
    public function test1(): void
    {
        $word = '+foo(?';

        assertEquals('foo', removeSpecialChars($word));
    }
}
