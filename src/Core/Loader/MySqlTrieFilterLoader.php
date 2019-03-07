<?php
/**
 * Double-Array Trie Server
 * 
 * @author Timandes White <timandes@php.net>
 * @license Apache-2.0
 */

namespace Timandes\DaTrieServer\Core\Loader;

use \Autumn\Framework\Doctrine\DbalOperations;
use \Autumn\Framework\Context\Annotation\Autowired;

/**
 * Load Trie-Filter from MySQL
 */
class MySqlTrieFilterLoader implements TrieFilterLoader
{
    private $dbalOperations;

    private $handle = null;

    const QUERY_SQL = "SELECT * FROM `word` WHERE `id`>:id LIMIT 100";

    /**
     * @Autowired
     */
    public function setDbalOperations(DbalOperations $dbalOperations)
    {
        $this->dbalOperations = $dbalOperations;
    }

    public function load()
    {
        $this->handle = $this->prefetch();
    }

    public function getHandle()
    {
        return $this->handle;
    }

    private function prefetch()
    {
        $handle = trie_filter_new();

        $wordList = $this->dbalOperations->queryAll(self::QUERY_SQL, function($row) {
            return $row['word'];
        }, 'id');
        foreach ($wordList as $word) {
            trie_filter_store($handle, $word);
        }

        return $handle;
    }
}