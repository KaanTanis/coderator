<?php

namespace KaanTanis\Coderator\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \KaanTanis\Coderator\Coderator
 */
class Coderator extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'coderator';
    }
}
