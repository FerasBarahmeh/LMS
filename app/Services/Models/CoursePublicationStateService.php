<?php

namespace App\Services\Models;

use App\Models\CoursePublicationState;

class CoursePublicationStateService
{
    protected CoursePublicationState $state;

    public function __construct(CoursePublicationState $publishStatus)
    {
        $this->state = $publishStatus;
    }

    public function toggleProperty(string $propertyName): void
    {
        $this->state->$propertyName = !$this->state->$propertyName;
        $this->state->save();
    }

    public function __get($key)
    {
        if (property_exists($this->state, $key)) {
            return $this->state->$key;
        }
        return null;
    }
}
