<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class getDataEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    
    public $suhu_object;
    public $suhu_lingkungan;
    public $konsentrasi_ozon;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($suhu_object, $suhu_lingkungan, $konsentrasi_ozon)
    {
        $this->suhu_object = $suhu_object;
        $this->suhu_lingkungan = $suhu_lingkungan;
        $this->konsentrasi_ozon = $konsentrasi_ozon;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return ['my-channel'];
    }

    public function broadcastAs()
    {
        return 'my-event';
    }
}
