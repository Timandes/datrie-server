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
     */
    public function load();

    /**
     * Get trie_filter handle
     * 
     * @return resource
     */
    public function getHandle();
}