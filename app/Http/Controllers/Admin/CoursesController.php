<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class CoursesController extends Controller
{

    public function index()
    {
        $datas['datas']=Course::get();
        return view('admin.courses', $datas);
    }

    public function create()
    {
        return view('admin.create-courses');
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'coursecode' => 'required|string',
            'template' => 'required',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $url = Storage::put('course_template', $request->template);

        $input['template']=$url;

        Course::create($input);

        return redirect()->route('admin.courses')->with(['success' => "Course creation was successful. Applicants can access it on enrollment."]);

    }


    public function show($id)
    {
        $datas['data']=Course::find($id);

        return view('admin.modify-courses', $datas);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }


    public function update(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($request->all(), [
            'id' => 'required|string',
            'title' => 'required|string',
            'coursecode' => 'required|string',
            'template' => 'nullable',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $id=$input['id'];

        $f=Course::find($id);

        if(!$f){
            return redirect()->route('admin.courses')->with(['danger' => "Course not found"]);
        }

        $f->title=$input['title'];
        $f->coursecode=$input['coursecode'];

        if(isset($input['template'])){
            $url = Storage::put('course_template', $request->template);
            $f->template=$url;
        }

        $f->save();

        return redirect()->route('admin.courses')->with(['success' => "Course modified successfully"]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
