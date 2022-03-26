<?php

namespace App\Mail;

use App\Models\Activity;
use App\Models\Course;
use App\Models\EmailTemplate;
use App\Models\Enrollment;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdmissionLetterMail extends Mailable
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

        $course=Course::find($enrollment->course_id);


        $emailTemplate=EmailTemplate::where("type","admission")->first();


        $doc=new \App\Http\Controllers\DocumentController();
        $pdfurl=$doc->convertWordToPDFChangable($enrollment,$course->template);

        Activity::create([
            "enrollment_id" => $enrollment->id,
            "type" =>"Admission Letter sent",
            "log" =>$pdfurl,
            "act_by" =>"system"
        ]);

        if($emailTemplate) {
            if ($emailTemplate->status == 1) {
                $etb=$emailTemplate->body;

                $emt=$this->mailTemplateReplace($etb, "{{name}}", $enrollment->name);
                $emt=$this->mailTemplateReplace($emt, "{{email}}", $enrollment->email);
                $emt=$this->mailTemplateReplace($emt, "{{tel}}", $enrollment->tel);
                $emt=$this->mailTemplateReplace($emt, "{{todaysdate}}", Carbon::now()->format('Y-m-d'));
                $emt=$this->mailTemplateReplace($emt, "{{4weeksdate}}", Carbon::now()->addWeekdays(4)->format('Y-m-d'));

                return $this->from($emailTemplate->sender ?? "info@newwavesecosystem.com")
                    ->subject($emailTemplate->subject)
                    ->view('emails.mailrender', [
                        'mailStyle' => $emailTemplate->css,
                        'mailBody' => $emt
                    ])->attach($pdfurl);
            }
        }
    }

    function mailTemplateReplace($body, $code, $with){
        return str_replace ($code, $with, $body);
    }

}
