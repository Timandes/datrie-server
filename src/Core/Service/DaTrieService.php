<?php
/**
 * Double-Array Trie Server
 * 
 * @author Timandes White <timandes@php.net>
 * @license Apache-2.0
 */

namespace Timandes\DaTrieServer\Core\Service;

/**
 * Double-Array Trie Service
 */
interface DaTrieService
{
    /**
     * Search in message
     * 
     * @return array
     */
    public function searchIn(string $message);
}