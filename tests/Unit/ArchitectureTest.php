<?php

use App\Abstracts\Actions\ParentAction;
use App\Abstracts\DataTransferObjects\ParentDto;
use App\Abstracts\Livewire\ParentBackComponent;
use App\Abstracts\Livewire\ParentComponent;
use AzimKordpour\PowerEnum\Traits\PowerEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Livewire\Form;

test('Actions')
    ->expect('App\Actions')
    ->toBeClass()
    ->toExtend(ParentAction::class)
    ->toHaveSuffix('Action')
    ->not->toUse(Form::class)
    ->not->toUse(Request::class);

test('Data transfer objects')
    ->expect('App\DataTransferObjects')
    ->toBeClass()
    ->toExtend(ParentDto::class)
    ->not->toUse(Request::class);

test('Enums')
    ->expect('App\Enums')
    ->toBeEnums()
    ->toOnlyUse(PowerEnum::class)
    ->not->toUse(Request::class);

test('Livewire Component')
    ->expect('App\Livewire\Back')
    ->toBeClass()
    ->toExtend(ParentBackComponent::class)
    ->and('App\Livewire\Front')
    ->toBeClass()
    ->toExtend(ParentComponent::class)
    ->and('App\Livewire\Forms')
    ->toBeClass()
    ->toExtend(Form::class);

test('Models')
    ->expect('App\Models')
    ->toBeClass()
    ->toExtend(Model::class)
    ->not->toUse(Request::class);

test('Parent Abstracts')
    ->expect('App\Parents')
    ->toBeAbstract()
    ->toHavePrefix('Parent')
    ->not->toUse(Request::class);
