<?php

namespace App\Abstracts\DataTransferObjects;

use Spatie\LaravelData\Data;

abstract class ParentDto extends Data
{
    /**
     * Get the keys of all DTO.
     *
     * @return array<string>
     */
    public function keysToArray(): array
    {
        return array_keys($this->toArray());
    }
}
