<?php

namespace App;

// phpcs:disable
require_once __DIR__ . '/../vendor/autoload.php';
// phpcs:enable

function search(array $docs, string $searchedText): array
{
    $searchedText = removeSpecialChars($searchedText);
    $result = [];

    foreach ($docs as ['id' => $id, 'text' => $text]) {
        $words = explode(' ', $text);
        foreach ($words as $word) {
            $word = removeSpecialChars($word);
            if ($word === $searchedText) {
                $result[] = $id;
                break;
            }
        }
    }

    return $result;
}

function removeSpecialChars(string $word): ?string
{
    return preg_replace('/\W+/', '', $word);
}
