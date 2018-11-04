<?php
/**
 * Double-Array Trie Server
 * 
 * @author Timandes White <timandes@php.net>
 * @license Apache-2.0
 */

require_once __DIR__ . '/vendor/autoload.php';

exit(Timandes\DaTrieServer\Server\DaTrieApplication::run($argc, $argv));
