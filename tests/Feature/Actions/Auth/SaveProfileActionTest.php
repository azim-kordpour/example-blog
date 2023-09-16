<?php

use App\Actions\Auth\SaveProfileAction;
use App\DataTransferObjects\ProfileDto;

beforeEach(fn () => asUser());

it('saves user\'s profile', function () {
    $profileDto = ProfileDto::from([
        'name' => 'Mojtaba',
        'email' => 'mojtaba@gmail.com',
        'password' => 'password',
        'new_password' => 'new_password',
    ]);

    resolve(SaveProfileAction::class)->run($profileDto);

    $user = auth()->user()->refresh();

    expect($user->name)
        ->toBe($profileDto->name)
        ->and($user->email)
        ->toBe($profileDto->email)
        ->and(Hash::check($profileDto->new_password, $user->password))
        ->toBeTrue();
});
