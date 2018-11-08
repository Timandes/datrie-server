<?php
/**
 * Double-Array Trie Server
 * 
 * @author Timandes White <timandes@php.net>
 * @license Apache-2.0
 */

namespace Timandes\DaTrieServer\Proto\Model;

use \MintWare\JOM\JsonField;

/**
 * Location Model
 */
class Location
{
    /** @JsonField(name="start", type="int") */
    private $start;

    /** @JsonField(name="end", type="int") */
    private $end;

    public function getStart()
    {
        return $this->start;
    }

    public function setStart($start)
    {
        $this->start = $start;
    }

    public function getEnd()
    {
        return $this->end;
    }

    public function setEnd($end)
    {
        $this->end = $end;
    }
}