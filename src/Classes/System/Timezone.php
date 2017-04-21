<?php

namespace Eightfold\Eventbrite\Classes\System;

use Eightfold\Eventbrite\Classes\System;

use Eightfold\Eventbrite\Eventbrite;

use Eightfold\Eventbrite\Interfaces\ApiResourceInterface;

class Timezone extends System implements ApiResourceInterface
{
    static public function all(Eventbrite $eventbrite)
    {
        return parent::getMany($eventbrite, static::baseEndpoint());
    }

    /**************/
    /* Interfaces */
    /**************/

    static public function baseEndpoint()
    {
        return 'system/timezones';
    }

    static public function classPath()
    {
        return __CLASS__;
    }

    public function endpoint()
    {
        return static::baseEndpoint();
    }
}