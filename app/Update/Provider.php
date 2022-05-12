<?php

namespace Camaraderie\Update;
use Benlumia007\Backdrop\Tools\ServiceProvider;

class Provider extends ServiceProvider {
	public function register() {
		$this->app->singleton( 'camaraderie/updater', Component::class );
	}

	public function boot() {
		$this->app->resolve( 'camaraderie/updater')->boot();
	}
}