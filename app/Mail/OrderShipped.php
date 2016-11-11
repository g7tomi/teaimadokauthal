<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    private $order;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
          $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.orders.shipped')
                ->with([
                        'order' => $this->order
                    ])->subject("[TeaImádók] Csomag feladva");
    }
}
