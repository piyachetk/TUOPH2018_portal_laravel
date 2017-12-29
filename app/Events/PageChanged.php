<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class PageChanged extends Event {
	use SerializesModels;

	public $url;

	/**
	 * Create a new event instance.
	 *
	 * @return void
	 */
	public function __construct($pageUrl) {
		$this->url = $pageUrl;
	}

	/**
	 * Get the channels the event should be broadcast on.
	 *
	 * @return array
	 */
	public function broadcastOn() {
		return [];
	}
}
