<?php
/**
 * Double-Array Trie Server
 * 
 * @author Timandes White <timandes@php.net>
 * @license Apache-2.0
 */

namespace Timandes\DaTrieServer\Core\Service\Impl;

use \Autumn\Framework\Context\Annotation\Autowired;

use \Timandes\DaTrieServer\Core\Loader\TrieFilterLoader;
use \Timandes\DaTrieServer\Core\Service\DaTrieService;
use \Timandes\DaTrieServer\Proto\Model\Location;

/**
 * Double-Array Trie Service
 */
class DaTrieServiceImpl implements DaTrieService
{
    /** @Autowired(value=TrieFilterLoader::class) */
    private $trieFilterLoader;

    private $trieFilterHandle = null;

    public function searchIn(string $message)
    {
        if (!$message) {
            return [];
        }
        
        if (!$this->trieFilterHandle) {
            $this->trieFilterHandle = $this->trieFilterLoader->getHandle();
        }

        $result = trie_filter_search_all($this->trieFilterHandle, $message);
        if (!$result) {
            return [];
        }

        $returnValue = [];
        foreach ($result as $row) {
            $location = new Location();
            $location->setStart($row[0]);
            $location->setEnd($row[1]);
            $returnValue[] = $location;
        }
        return $returnValue;
    }
}