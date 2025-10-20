<?php


namespace App\Mail;

use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookingNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $booking;
    public $isCustomer;

    public function __construct(Booking $booking, $isCustomer = false)
    {
        $this->booking = $booking;
        $this->isCustomer = $isCustomer;
    }

    public function build()
    {
        $subject = $this->isCustomer
            ? 'Booking Confirmation – Thank You for Your Request'
            : 'New Travel Booking Request Submitted';

        return $this->subject($subject)
                    ->view('emails.booking_notification');
    }
}
