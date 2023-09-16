<?php

namespace App\Actions\Contact;

use App\Abstracts\Actions\ParentAction;
use App\Models\Contact;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class PaginateAllContactsAction extends ParentAction
{
    /**
     * Handle paginating all categories.
     */
    public function run(): LengthAwarePaginator
    {
        return Contact::latest()
            ->paginate(config('blog.admin.per_page'));
    }
}
