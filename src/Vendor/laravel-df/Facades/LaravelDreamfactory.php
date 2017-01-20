<?php

namespace GDCE\Framework\LaravelDreamfactory\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Active facade class
 *
 * @author Hieu Le
 */
class LaravelDreamfactory extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'laravel-dreamfactory';
    }

}
