<?php

namespace App;

// phpcs:disable
require_once __DIR__ . '/../vendor/autoload.php';
// phpcs:enable

function search(array $docs, string $searchedText): array
{
    $result = [];

    foreach ($docs as ['id' => $id, 'text' => $text]) {
        $textWords = explode(' ', $text);
        $searchedWords = explode(' ', $searchedText);

        foreach ($searchedWords as $searchedWord) {
            $searchedWord = removeSpecialChars($searchedWord);
            
            foreach ($textWords as $textWord) {
                $textWord = removeSpecialChars($textWord);
                if ($textWord === $searchedWord) {
                    $result[$id] = isset($result[$id]) ? $result[$id] + 1 : 1;
                }
            }
        }
    }

    arsort($result);

    return array_keys($result);
}

function removeSpecialChars(string $word): ?string
{
    return preg_replace('/\W+/', '', $word);
}
