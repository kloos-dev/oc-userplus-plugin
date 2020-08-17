<?php namespace Codecycler\UserPlus;

use Event;
use Backend;
use Codecycler\UserPlus\Classes\Event\ExtendUserModel;
use System\Classes\PluginBase;

/**
 * UserPlus Plugin Information File
 */
class Plugin extends PluginBase
{
    public $require = [
        'RainLab.User',
    ];

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'User Plus',
            'description' => 'Additional fields',
            'author'      => 'Codecycler',
            'icon'        => 'icon-user-add'
        ];
    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {
        Event::subscribe(ExtendUserModel::class);
    }
}
