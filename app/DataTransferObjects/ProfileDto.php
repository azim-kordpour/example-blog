<?php

namespace App\DataTransferObjects;

use App\Abstracts\DataTransferObjects\ParentDto;

class ProfileDto extends ParentDto
{
    /**
     * Create a new instance of the class.
     */
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
        public ?string $new_password,
    ) {
    }
}
