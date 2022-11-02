<?php

namespace Larvata\LaravelHttpProxy;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Larvata\LaravelHttpProxy\Skeleton\SkeletonClass
 */
class LaravelHttpProxyFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravelhttpproxy';
    }
}
