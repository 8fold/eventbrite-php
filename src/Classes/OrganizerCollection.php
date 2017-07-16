<?php

namespace Eightfold\Eventbrite\Classes;

use Eightfold\Eventbrite\Classes\Core\ApiCollection;

use Eightfold\Eventbrite\Classes\Organizer;

/**
 * @package Collections
 */
class OrganizerCollection extends ApiCollection
{
    public function __construct($client, $endpoint)
    {
        parent::__construct($client, $endpoint, 'organizers', Organizer::class);
    }
}
