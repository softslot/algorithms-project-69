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

    public function test1(): void
    {
        $expected = ['doc1', 'doc2'];
        $actial = search($this->docs, 'shoot');

        assertEquals($expected, $actial);
    }

    public function test2(): void
    {
        $expected = ['doc1'];
        $actial = search($this->docs, 'pint');

        assertEquals($expected, $actial);
    }

    public function test3(): void
    {
        $expected = ['doc1'];
        $actial = search($this->docs, 'pint!!!');

        assertEquals($expected, $actial);
    }

    public function test4(): void
    {
        $expected = [];
        $actial = search($this->docs, 'Shot');

        assertEquals($expected, $actial);
    }

    public function test5(): void
    {
        $expected = [];
        $actial = search([], 'hello');

        assertEquals($expected, $actial);
    }
}
