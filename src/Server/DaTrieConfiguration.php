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
use \Autumn\Framework\Doctrine\DbalConnectionFactoryBean;
use \Autumn\Framework\Doctrine\DbalTemplate;

use \Timandes\DaTrieServer\Core\Loader\ArrayTrieFilterLoader;
use \Timandes\DaTrieServer\Core\Loader\MySqlTrieFilterLoader;
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
        $conf = $this->getWordsFromConfigFile();
        $loaderName = $this->getLoaderNameFromConfig($conf);
        switch ($loaderName) {
            case 'mysql':
                return new MySqlTrieFilterLoader();
            case 'array':
                return new ArrayTrieFilterLoader($conf['words']);
            default:
                return new ArrayTrieFilterLoader($conf);
        }
    }

    /** @Bean */
    public function dbalConnection()
    {
        $conf = $this->getWordsFromConfigFile();
        $loaderName = $this->getLoaderNameFromConfig($conf);
        if ($loaderName != 'mysql') {
            return null;
        }

        $options = array_merge($conf, ['driver' => 'pdo_mysql']);
        return new DbalConnectionFactoryBean($options);
    }

    /** @Bean */
    public function dbalTemplate()
    {
        return new DbalTemplate();
    }

    private function getWordsFromConfigFile()
    {
        $path = '/etc/datrie-server.conf';
        if (!file_exists($path)) {
            throw new \RuntimeException("Cannot find file {$path}");
        }
        return include $path;
    }

    private function getLoaderNameFromConfig(array $conf): string
    {
        return $conf['loader']??'';
    }
}