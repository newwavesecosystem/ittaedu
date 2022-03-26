<?php

namespace App\Mail;

use App\Models\EmailTemplate;
use App\Models\Enrollment;
use Carbon\Carbon;
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
    public $type;
    public function __construct(Enrollment $enrollment, $type)
    {
        $this->enrollment=$enrollment;
        $this->type=$type;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $enrollment=$this->enrollment;
        $type=$this->type;

        $emailTemplate=EmailTemplate::where("type",$type)->first();

        function mailTemplateReplace($body, $code, $with){
            return str_replace ($code, $with, $body);
        }


        if($emailTemplate) {
            if ($emailTemplate->status == 1) {
                $etb=$emailTemplate->body;

                $emt=mailTemplateReplace($etb, "{{name}}", $enrollment->name);
                $emt=mailTemplateReplace($emt, "{{email}}", $enrollment->email);
                $emt=mailTemplateReplace($emt, "{{tel}}", $enrollment->tel);
                $emt=mailTemplateReplace($emt, "{{todaysdate}}", Carbon::now()->format('Y-m-d'));
                $emt=mailTemplateReplace($emt, "{{4weeksdate}}", Carbon::now()->addWeekdays(4)->format('Y-m-d'));

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
