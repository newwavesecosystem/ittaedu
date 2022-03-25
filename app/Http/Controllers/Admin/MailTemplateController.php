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
            'css' => 'required|string',
            'status' => 'required|string'
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        return redirect()->route('admin.mailtemplate')->with(['success' => 'Email Template updated successfully']);
    }
}
