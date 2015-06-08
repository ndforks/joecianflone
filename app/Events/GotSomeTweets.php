<?php

namespace JoeCianflone\Events;

use JoeCianflone\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class GotSomeTweets extends Event
{
    use SerializesModels;

    public $tweets;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($rawTweets)
    {
       $this->tweets = $rawTweets;
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
