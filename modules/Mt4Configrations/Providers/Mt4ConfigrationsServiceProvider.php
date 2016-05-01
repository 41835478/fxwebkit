<?php namespace Modules\Mt4configrations\Providers;

use Illuminate\Support\ServiceProvider;

class Mt4ConfigrationsServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Boot the application events.
	 * 
	 * @return void
	 */
	public function boot()
	{
		$this->registerTranslations();
		$this->registerConfig();
		$this->registerViews();
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind(
			'Modules\Mt4Configrations\Repositories\Mt4ConfigrationsContract',
			'Modules\Mt4Configrations\Repositories\EloquentMt4ConfigrationsContractRepository'


		);
	}

	/**
	 * Register config.
	 * 
	 * @return void
	 */
	protected function registerConfig()
	{
		$this->publishes([
		    __DIR__.'/../../../Config/mt4ConfigrationsConfig.php' => config_path('mt4configrations.php'),
		]);
		$this->mergeConfigFrom(
		    __DIR__.'/../../../Config/mt4ConfigrationsConfig.php', 'mt4configrations'
		);
	}

	/**
	 * Register views.
	 * 
	 * @return void
	 */
	public function registerViews()
	{
		$viewPath = base_path('resources/views/modules/mt4configrations');

		$sourcePath = __DIR__.'/../Resources/views';

		$this->publishes([
			$sourcePath => $viewPath
		]);

		$this->loadViewsFrom(array_merge(array_map(function ($path) {
			return $path . '/modules/mt4configrations';
		}, \Config::get('view.paths')), [$sourcePath]), 'mt4configrations');
	}

	/**
	 * Register translations.
	 * 
	 * @return void
	 */
	public function registerTranslations()
	{
		$langPath = base_path('resources/lang/modules/mt4configrations');

		if (is_dir($langPath)) {
			$this->loadTranslationsFrom($langPath, 'mt4configrations');
		} else {
			$this->loadTranslationsFrom(__DIR__ .'/../Resources/lang', 'mt4configrations');
		}
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
