<?php
/**
 * Double-Array Trie Server
 * 
 * @author Timandes White <timandes@php.net>
 * @license Apache-2.0
 */

namespace Timandes\DaTrieServer\Server\Listener;

use \Autumn\Framework\Context\Listener\ContextRefreshedEventApplicationListener;
use \Autumn\Framework\Context\Event\ContextRefreshedEvent;
use \Autumn\Framework\Context\Annotation\Autowired;

use \Timandes\DaTrieServer\Core\Loader\TrieFilterLoader;

class DaTrieApplicationListener implements ContextRefreshedEventApplicationListener
{
    private $trieFilterLoader = null;

    /**
     * @Autowired
     */
    public function setTrieFilterLoader(TrieFilterLoader $trieFilterLoader)
    {
        $this->trieFilterLoader = $trieFilterLoader;
    }

    public function onApplicationEvent(ContextRefreshedEvent $event)
    {
        $this->trieFilterLoader->load();
    }
}