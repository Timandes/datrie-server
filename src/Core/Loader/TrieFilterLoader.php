<?php
/**
 * Double-Array Trie Server
 * 
 * @author Timandes White <timandes@php.net>
 * @license Apache-2.0
 */

namespace Timandes\DaTrieServer\Core\Loader;

/**
 * Trie-Filter Loader
 */
interface TrieFilterLoader
{
    /**
     * Load Trie-Filter handle
     * 
     * @return resource
     */
    public function load();
}