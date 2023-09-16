<?php

namespace App\DataTransferObjects;

use App\Abstracts\DataTransferObjects\ParentDto;
use App\Enums\ContactStatus;

class ContactDto extends ParentDto
{
    /**
     * Create a new instance of the class.
     */
    public function __construct(
        public string $subject,
        public string $name,
        public string $email,
        public string $message,
        public ContactStatus $status = ContactStatus::New,
    ) {
    }
}
