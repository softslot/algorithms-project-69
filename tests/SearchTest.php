<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

use function App\search;
use function PHPUnit\Framework\assertEquals;

class SearchTest extends TestCase
{
    private array $docs = [
        ['id' => 'doc1', 'text' => "I can't shoot straight unless I've had a pint!"],
        ['id' => 'doc2', 'text' => "Don't shoot shoot shoot that thing at me."],
        ['id' => 'doc3', 'text' => "I'm your shooter."],
    ];

    public function testRelevance(): void
    {
        assertEquals(
            ['doc2', 'doc1'],
            search($this->docs, 'shoot')
        );
    }

    public function test2(): void
    {
        assertEquals(
            ['doc1'],
            search($this->docs, 'pint')
        );
    }

    public function test3(): void
    {
        assertEquals(
            ['doc1'],
            search($this->docs, 'pint!!!')
        );
    }

    public function test4(): void
    {
        assertEquals(
            [],
            search($this->docs, 'Shot')
        );
    }

    public function test5(): void
    {
        assertEquals(
            [],
            search([], 'hello')
        );
    }

    public function test6(): void
    {
        assertEquals(
            ['doc2', 'doc1'],
            search($this->docs, 'shoot at me')
        );
    }
}
