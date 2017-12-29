<?php

namespace App\Listeners;

use App\Events\PageChanged;
use Cache;

class FlushCache {
	/**
	 * Create the event listener.
	 *
	 * @return void
	 */
	public function __construct() {
		//
	}

	/**
	 * Handle the event.
	 *
	 * @param  PageChanged $event
	 * @return void
	 */
	public function handle(PageChanged $event) {
		Cache::flush();
	}
}
