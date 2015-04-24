<?php

namespace BluehornDigital\FreshBooks\Models;

/**
 * Class Client
 */
class TimeEntry extends Model
{
    /**
     * @return null
     */
    public function getTimeEntryId()
    {
        return $this->get('time_entry_id');
    }

    /**
     * @return null
     */
    public function getStaffId()
    {
        return $this->get('staff_id');
    }
}
