<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
            'duration' => 'required|string',
            'requirement' => 'required|string',
            'books' => 'required|string',
            'other_requirement' => 'required|string',
            'tution_fee' => 'required|string',
            'admission_fee' => 'required|string',
            'graduation_fee' => 'required|string',
            'other_fee' => 'nullable|string',
            'other' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        Course::create($input);

        return redirect()->route('admin.courses')->with(['success' => "Course creation was successful. Applicants can access it on enrollment."]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
