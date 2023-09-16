<?php

namespace App\Abstracts\Actions;

use Illuminate\Support\Facades\DB;
use Mockery;
use Mockery\ExpectationInterface;
use Mockery\MockInterface;

/**
 * @method static run()
 */
abstract class ParentAction
{
    /**
     * Execute the run method in a transaction.
     */
    public function transactionalRun(mixed ...$arguments): mixed
    {
        return DB::transaction(function () use ($arguments) {
            return static::run(...$arguments);
        });
    }

    /**
     * Make sure the method "run" is called once with some arguments.
     */
    public static function expectsRunOnceWith(mixed ...$with): ExpectationInterface
    {
        return self::expectsRunOnce()
            ->withArgs(array_map(fn ($value) => Mockery::mustBe($value), $with));
    }

    /**
     * Make sure the method "run" is called once.
     */
    public static function expectsRunOnce(): ExpectationInterface
    {
        return self::buildMock()
            ->shouldReceive('run')
            ->once();
    }

    /**
     * Make sure the method "transactionalRun" is called once.
     */
    public static function expectsTransactionalRunOnce(): ExpectationInterface
    {
        return self::buildMock()
            ->shouldReceive('transactionalRun')
            ->once();
    }

    public static function buildMock(): MockInterface|ParentAction|Mockery\LegacyMockInterface
    {
        $mock = Mockery::mock(static::class);

        app()->singleton(static::class, fn () => $mock);

        return $mock;
    }
}
