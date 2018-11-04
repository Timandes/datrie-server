<?php
/**
 * Double-Array Trie Server
 * 
 * @author Timandes White <timandes@php.net>
 * @license Apache-2.0
 */

namespace Timandes\DaTrieServer\Server;

use \Autumn\Framework\Boot\AutumnApplication;
use \Autumn\Framework\Context\Annotation\ComponentScan;

/**
 * Main Application
 * 
 * @ComponentScan
 */
class DaTrieApplication
{
    public static function run(...$args)
    {
        return AutumnApplication::run(Application::class, ...$args);
    }
}
