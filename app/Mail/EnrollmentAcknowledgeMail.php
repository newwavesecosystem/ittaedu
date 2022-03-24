<?php

namespace App\Mail;

use App\Models\EmailTemplate;
use App\Models\Enrollment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnrollmentAcknowledgeMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $enrollment;
    public function __construct(Enrollment $enrollment)
    {
        $this->enrollment=$enrollment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $enrollment=$this->enrollment;

        $emailTemplate=EmailTemplate::where("type","acknowledgemail")->first();

        function mailTemplateReplace($body, $code, $with){
            return str_replace ($code, $with, $body);
        }


        if($emailTemplate) {
            if ($emailTemplate->status == 1) {
                $etb=$emailTemplate->body;

                $emt=mailTemplateReplace($etb, "{{name}}", $enrollment->name);

                return $this->from($emailTemplate->sender ?? "info@newwavesecosystem.com")
                    ->subject($emailTemplate->subject)
                    ->view('emails.mailrender', [
                        'mailStyle' => $emailTemplate->css,
                        'mailBody' => $emt
                    ]);
            }
        }
    }
}
