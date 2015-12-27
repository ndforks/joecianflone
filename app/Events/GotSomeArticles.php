<?php

namespace JoeCianflone\Events;

use JoeCianflone\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class GotSomeArticles extends Event
{
    use SerializesModels;

    public $articles;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($articles)
    {
        $this->articles = $articles;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
