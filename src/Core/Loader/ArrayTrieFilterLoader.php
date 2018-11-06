<?php
/**
 * Double-Array Trie Server
 * 
 * @author Timandes White <timandes@php.net>
 * @license Apache-2.0
 */

namespace Timandes\DaTrieServer\Core\Loader;

/**
 * Load Trie-Filter from array
 */
class ArrayTrieFilterLoader implements TrieFilterLoader
{
    private $words;

    public function __construct(array $words)
    {
        $this->words = $words;
    }

    public function load()
    {
        $handle = trie_filter_new();

        foreach ($this->words as $word) {
            trie_filter_store($handle, $word);
        }

        return $handle;
    }
}