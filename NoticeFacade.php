<?php namespace Origami\Notice;

use Illuminate\Support\Facades\Facade;

class NoticeFacade extends Facade
{
    /**
     * Get the registered component.
     *
     * @return object
     */
    protected static function getFacadeAccessor()
    {
        return 'notice';
    }
}
