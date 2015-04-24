<?php

namespace BluehornDigital\FreshBooks;

use BluehornDigital\FreshBooks\Models\TimeEntry;

/**
 * Class Clients
 */
class TimeEntries extends ApiCall
{

    /**
     * @inheritdoc
     */
    protected $modelType = 'time_entry';

    /**
     * @inheritdoc
     */
    protected $modelTypePlural = 'time_entries';

    /**
     * @return array
     */
    public function queryOptions()
    {
        return array(
          'project_id' => null,
          'task_id' => null,
          'date_from' => null,
          'date_to' => null,
          'page' => null,
          'per_page' => null,
        );
    }

    /**
     * @inheritdoc
     */
    protected function newModel($mixed) {
        return new TimeEntry((object) $mixed);
    }
}
