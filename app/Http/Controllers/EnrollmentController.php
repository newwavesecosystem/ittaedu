<?php

namespace App\Http\Controllers;

use App\Mail\AdmissionLetterMail;
use App\Mail\EnrollmentAcknowledgeMail;
use App\Models\Activity;
use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Nnjeim\World\World;

class EnrollmentController extends Controller
{
    public function index(){
        $datas['courses']=Course::select('id', 'title')->get();


        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://laravel-world.com/api/countries',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $rep=json_decode($response);

        $datas['countries']=$rep->data;

        return view('enrollment', $datas);
    }

    public function store(Request $request){

        $input = $request->all();

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'address' => 'required|string',
            'tel' => 'required|string',
            'email' => 'required|string',
            'country' => 'required|string',
            'state' => 'required|string',
            'county' => 'required|string',
            'agent' => 'nullable|string',
            'agent_resp_name' => 'nullable|string',
            'agent_resp_email' => 'nullable|string',
            'course_id' => 'required',
            'suggested_start_date' => 'required|string',
            'highest_education_level' => 'required|string',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }


        $input['country']=explode("|",$input['country'])[1];
        $input['state']=explode("|",$input['state'])[1];
        $en=Enrollment::create($input);

        Activity::create([
            "enrollment_id" => $en->id,
            "type" =>"Acknowledgement mail sent to",
            "log" =>" ",
            "act_by" =>"system"
        ]);

        try {
            Mail::to($input['email'])->later(now()->addSeconds(2), new EnrollmentAcknowledgeMail($en));

            Activity::create([
                "enrollment_id" => $en->id,
                "type" =>"Admission Letter sent to",
                "log" =>"admission",
                "act_by" =>"system"
            ]);

            Mail::to($input['email'])->later(now()->addSeconds(10), new AdmissionLetterMail($en));
        }catch (\Exception $e){

        }

        return redirect()->route('enrollment')->with(['success' => "Your enrollment was successful. You will receive acknowledge mail shortly."]);

    }
}
