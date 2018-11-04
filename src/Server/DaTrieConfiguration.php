<?php
/**
 * Double-Array Trie Server
 * 
 * @author Timandes White <timandes@php.net>
 * @license Apache-2.0
 */

namespace Timandes\DaTrieServer\Server;

use \Autumn\Framework\Context\Annotation\Configuration;
use \Autumn\Framework\Context\Annotation\Bean;

use \Timandes\DaTrieServer\Core\Loader\ArrayTrieFilterLoader;
use \Timandes\DaTrieServer\Core\Service\Impl\DaTrieServiceImpl;

/**
 * Main Configuration
 * 
 * @Configuration
 */
class DaTrieConfiguration
{
    /** @Bean */
    public function daTrieService()
    {
        return new DaTrieServiceImpl();
    }

    /** @Bean */
    public function trieFilterLoader()
    {
        return new ArrayTrieFilterLoader($this->getWordsFromConfigFile());
    }

    private function getWordsFromConfigFile()
    {
        $path = '/etc/datrie-server.conf';
        if (!file_exists($path)) {
            throw new \RuntimeException("Cannot find file {$path}");
        }
        include $path;
    }
}