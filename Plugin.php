<?php namespace JarydKrish\ErrorLogger;

use App;
use Backend;
use BackendAuth;
use Illuminate\Foundation\AliasLoader;
use System\Classes\PluginBase;

/**
 * ErrorLogger Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Sentry error logger',
            'description' => 'Handles errors. Horrible, horrible errors.',
            'author'      => 'Jaryd Krishnan',
            'icon'        => 'icon-bug'
        ];
    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {
        if (!App::runningInConsole()) {
            $this->setSentryHandler();
        }
    }

    public function setSentryHandler()
    {
        // Register the service provider
        App::register(\Sentry\SentryLaravel\SentryLaravelServiceProvider::class);
        // Add the alias
        AliasLoader::getInstance()->alias('Sentry', \Sentry\SentryLaravel\SentryFacade::class);
        
        // On error, capture the exception and send to Sentry
        App::error(function($exception) {
            $sentry = App::make('sentry');
            if (BackendAuth::check()) {
                $user = BackendAuth::getUser();
                $sentry->user_context([
                    'email' => $user->email,
                    'id' => $user->id,
                    'login' => $user->login
                ]);
            }
            $sentry->captureException($exception);
        });

    }
}
