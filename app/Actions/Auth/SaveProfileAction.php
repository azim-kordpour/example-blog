<?php

namespace App\Actions\Auth;

use App\Abstracts\Actions\ParentAction;
use App\DataTransferObjects\ProfileDto;
use Illuminate\Support\Facades\Hash;

class SaveProfileAction extends ParentAction
{
    /**
     * Handle saving profile's changes.
     */
    public function run(ProfileDto $profileDto): void
    {
        $user = auth()->user();

        abort_if(! Hash::check($profileDto->password, $user->password), 401);

        $user->fill($profileDto->only('name', 'email')->toArray());

        if ($profileDto->new_password) {
            $user->password = $profileDto->new_password;
        }

        $user->save();
    }
}
