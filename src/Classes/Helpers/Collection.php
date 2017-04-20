<?php

namespace Eightfold\Eventbrite\Classes\Helpers;

use ArrayObject;

use Eightfold\Eventbrite\Traits\ClassMappable;

class Collection extends ArrayObject
{
    use ClassMappable;

    private $position = 0;
    private $array = [];  
    private $eventbrite = null;

    public $total = 0;
    public $page = 0;
    public $size = 0;
    public $count = 0;

    public function __construct($payload, $eventbrite) {
        $payloadKeys = array_keys($payload);
        foreach ($payloadKeys as $key) {
            if ($key == 'pagination') {
                $this->total = $payload['pagination']['object_count'];
                $this->page  = $payload['pagination']['page_number'];
                $this->size  = $payload['pagination']['page_size'];
                $this->count = $payload['pagination']['page_count'];                

            } else {
                if (array_key_exists($key, $this->classMap)) {
                    $array = [];
                    $class = $this->classMap[$key];
                    foreach ($payload[$key] as $resourcePayload) {
                        $array[] = new $class($resourcePayload, $eventbrite);

                    }
                    parent::__construct($array);
                }
            }
        }
    }

    public function rewind() {
        // var_dump(__METHOD__);
        $this->position = 0;
    }

    public function current() {
        // var_dump(__METHOD__);
        return $this->array[$this->position];
    }

    public function key() {
        // var_dump(__METHOD__);
        return $this->position;
    }

    public function next() {
        // var_dump(__METHOD__);
        ++$this->position;
    }

    public function valid() {
        // var_dump(__METHOD__);
        return isset($this->array[$this->position]);
    }
}