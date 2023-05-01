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
        $expected = ['doc2', 'doc1'];
        $actual = search($this->docs, 'shoot');

        assertEquals($expected, $actual);
    }

    public function test2(): void
    {
        $expected = ['doc1'];
        $actual = search($this->docs, 'pint');

        assertEquals($expected, $actual);
    }

    public function test3(): void
    {
        $expected = ['doc1'];
        $actual = search($this->docs, 'pint!!!');

        assertEquals($expected, $actual);
    }

    public function test4(): void
    {
        $expected = [];
        $actual = search($this->docs, 'Shot');

        assertEquals($expected, $actual);
    }

    public function test5(): void
    {
        $expected = [];
        $actual = search([], 'hello');

        assertEquals($expected, $actual);
    }
}
