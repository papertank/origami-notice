<?php namespace Origami\Notice;

use Illuminate\Support\ServiceProvider;

class NoticeServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
    {
		$this->loadViewsFrom(__DIR__.'/views', 'notice');

		$this->publishes([
	        __DIR__.'/views' => base_path('resources/views/origami/notice'),
	    ]);
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
        $this->app->bindShared('notice', function()
        {
        	$session = $this->app->make('Illuminate\Session\Store');

            return new Notice($session, 'flash_notice');
        });
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('notice');
	}

}
