<?php
/**
 * Double-Array Trie Server
 * 
 * @author Timandes White <timandes@php.net>
 * @license Apache-2.0
 */

namespace Timandes\DaTrieServer\Server\Controller;

use \Autumn\Framework\Annotation\RestController;
use \Autumn\Framework\Annotation\RequestMapping;
use \Autumn\Framework\Context\Annotation\Autowired;
use \Autumn\Framework\Web\Bind\Annotation\RequestBody;

use \Timandes\DaTrieServer\Proto\Model\Response;
use \Timandes\DaTrieServer\Core\Service\DaTrieService;

/**
 * Search-In Controller
 * 
 * @RestController
 */
class SearchInController
{
    /** @Autowired(value=DaTrieService::class) */
    private $daTrieService;

    /**
     * Search in message
     * 
     * @RequestMapping(value="/search-in", method="GET")
     */
    public function searchIn(string $message)
    {
        return $this->daTrieService->searchIn($message);
    }

    /**
     * Search in long message
     * 
     * @RequestMapping(value="/search-in", method="POST")
     * @RequestBody(value="message")
     */
    public function searchInLongMessage(string $message)
    {
        return $this->daTrieService->searchIn($message);
    }
}