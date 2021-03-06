<?php namespace Modules\Ibportal\Providers;

use Illuminate\Support\ServiceProvider;

class IbportalServiceProvider extends ServiceProvider {

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
			'Modules\Ibportal\Repositories\IbportalContract',
			'Modules\Ibportal\Repositories\EloquentIbportalContractRepository'


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
		    __DIR__.'/../../../config/ibportalConfig.php' => config_path('ibportal.php'),
		]);
		$this->mergeConfigFrom(
		    __DIR__.'/../../../config/ibportalConfig.php', 'ibportal'
		);
	}

	/**
	 * Register views.
	 * 
	 * @return void
	 */
	public function registerViews()
	{
		$viewPath = base_path('resources/views/modules/ibportal');

		$sourcePath = __DIR__.'/../Resources/views';

		$this->publishes([
			$sourcePath => $viewPath
		]);

		$this->loadViewsFrom(array_merge(array_map(function ($path) {
			return $path . '/modules/ibportal';
		}, \Config::get('view.paths')), [$sourcePath]), 'ibportal');
	}

	/**
	 * Register translations.
	 * 
	 * @return void
	 */
	public function registerTranslations()
	{
		$langPath = base_path('resources/lang/modules/ibportal');

		if (is_dir($langPath)) {
			$this->loadTranslationsFrom($langPath, 'ibportal');
		} else {
			$this->loadTranslationsFrom(__DIR__ .'/../Resources/lang', 'ibportal');
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
