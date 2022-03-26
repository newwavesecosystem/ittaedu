<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EmailTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MailTemplateController extends Controller
{
    public function index(){
        $datas['datas']=EmailTemplate::get();
        return view('admin.mailtemplate', $datas);
    }

    public function show($id){
        $datas['data']=EmailTemplate::find($id);
        return view('admin.modify-mailtemplate', $datas);
    }

    public function update(Request $request){
        $input = $request->all();

        $validator = Validator::make($request->all(), [
            'id' => 'required|string',
            'sender' => 'required|string',
            'subject' => 'required|string',
            'body' => 'required|string',
            'status' => 'required|string'
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $et=EmailTemplate::find($input['id']);
        $et->sender=$input['sender'];
        $et->subject=$input['subject'];
        $et->body=$input['body'];
        $et->status=$input['status'];
        $et->save();

        return redirect()->route('admin.mailtemplate')->with(['success' => 'Email Template updated successfully']);
    }
}
