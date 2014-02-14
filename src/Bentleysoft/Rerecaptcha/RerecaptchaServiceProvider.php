<?php namespace Bentleysoft\Rerecaptcha;

use Illuminate\Support\ServiceProvider;

class RerecaptchaServiceProvider extends ServiceProvider {


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
		$this->package('bentleysoft/rerecaptcha');
		require __DIR__ . '/validation.php';
		$this->recaptchaMacro();
	}


	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app["rerecaptcha"] = $this->app->share(function($app){
			return new Rerecaptcha;
		});
	}

	/**
	* Recaptcha macro for forms, now can call Form::recaptcha();
	**/
	public function recaptchaMacro()
	{

		$this->app['form']->macro('recaptcha', function($options = array())
		{
			$re = new Rerecaptcha;
			return $re->recaptcha_get_html();
		});

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