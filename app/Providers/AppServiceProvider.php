<?php

namespace App\Providers;

use Exception;
use Illuminate\Support\ServiceProvider;
use Monolog\Handler\GelfHandler;
use Monolog\Formatter\GelfMessageFormatter;
use Log;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
	    if (env('GRAYLOG2_ENABLE', false) && class_exists(\Gelf\Publisher::class)) {
	    	try {
			    // Monolog setup
			    $monolog = Log::getMonolog();
			    $gelf = new GelfHandler(new \Gelf\Publisher(new \Gelf\Transport\HttpTransport(env('GRAYLOG2_SERVER'), env('GRAYLOG2_PORT'), '/gelf')));
			    $gelf->setFormatter(new GelfMessageFormatter('clubs.triamudom.ac.th'));
			    $monolog->pushHandler($gelf);
		    } catch (Exception $exception) {
		    	// Who cares?
		    }
	    }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
