<?php

namespace BluehornDigital\FreshBooks\Tests;

use BluehornDigital\FreshBooks\Models\TimeEntry;
use BluehornDigital\FreshBooks\TimeEntries;

/**
 * Class ClientsTest
 * @package BluehornDigital\FreshBooks\Tests
 */
class TimeEntriesTest extends FreshBooks_BaseTestCase
{
    public function testRequest()
    {
        $timeEntriesCall = new TimeEntries($this->apiClient);
        $response = $timeEntriesCall->query();

        /** @var \BluehornDigital\FreshBooks\Models\TimeEntry[] $paged */
        $paged = $timeEntriesCall->query(['page' => 1, 'per_page' => 5]);

      print_r($paged[0]);
        $this->assertNotNull($paged[0]->getStaffId());
    }

    public function testRequestSingle()
    {
        $timeEntryCall = new TimeEntries($this->apiClient);
        /** @var \BluehornDigital\FreshBooks\Models\TimeEntry $timeEntry */
        $timeEntry = $timeEntryCall->get('105593');

        $this->assertNotNull($timeEntry->getStaffId());
    }
}
