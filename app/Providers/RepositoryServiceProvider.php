<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
        $this->app->bind('App\Repositories\Posts\PostRepositoryInterface', 'App\Repositories\Posts\PostRepository');
        $this->app->bind('App\Repositories\Categories\CategoryRepositoryInterface', 'App\Repositories\Categories\CategoryRepository');
        $this->app->bind('App\Repositories\Tags\TagRepositoryInterface', 'App\Repositories\Tags\TagRepository');
        $this->app->bind('App\Repositories\Comments\CommentRepositoryInterface', 'App\Repositories\Comments\CommentRepository');
        $this->app->bind('App\Repositories\Configurations\ConfigurationRepositoryInterface', 'App\Repositories\Configurations\ConfigurationRepository');
	}

}
