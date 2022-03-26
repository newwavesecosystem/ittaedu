<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\AdmissionLetterMail;
use App\Mail\EnrollmentAcknowledgeMail;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ActivityController extends Controller
{
    public function resend($id){
        $activity=Activity::find($id);
        if(!$activity){
            return back()->with(['danger' => 'Invalid Activity name']);
        }

        Activity::create([
            "enrollment_id" => $activity->enrollment_id,
            "type" =>"Initiate resend ".$activity->type,
            "log" =>"resend",
            "act_by" =>Auth::user()->name
        ]);

        try {
            if ($activity->log == "admission") {
                Mail::to($activity->enrollment->email)->later(now()->addSeconds(10), new AdmissionLetterMail($activity->enrollment));
            } else {
                Mail::to($activity->enrollment->email)->later(now()->addSeconds(2), new EnrollmentAcknowledgeMail($activity->enrollment));
            }
        }catch (\Exception $e){

        }

        return redirect()->route('admin.enrollment.show',$activity->enrollment_id)->with(['success' => 'Letter resent successfully']);

    }
}
