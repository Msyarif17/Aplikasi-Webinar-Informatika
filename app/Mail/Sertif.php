<?php
  
namespace App\Mail;
  
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
  
class Sertif extends Mailable
{
    use Queueable, SerializesModels;
  
    public $details;
    protected $token;
  
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details,$token)
    {
        $this->details = $details;
        $this->token = $token;
    }
  
    /**
     * Build the message.
     *
     * @return $this
     */
    
    public function build()
    {
        return $this->subject('webinarinformarikaofficial@gmail.com')
                    ->attach('storage/sertif/' . $this->token. '.pdf')
                    ->markdown('mail.webinar-mail',['detail' => $this->details]);
    }
}