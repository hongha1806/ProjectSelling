<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MailNotify extends Mailable
{
    use Queueable, SerializesModels;
    private $data = [];
    /**
     * Create a new message instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build(){
        return $this->from('nguyenthihonghatchl@gmail.com',"E-Shopper")
        ->subject('Mail xác nhận đơn hàng thành công.')
        ->view("emails.index")->with("data", $this->data);
    }
}
