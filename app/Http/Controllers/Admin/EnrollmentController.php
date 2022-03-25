<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enrollment;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function index(){
        $datas['datas']=Enrollment::get();
        return view('admin.enrollments', $datas);
    }

    public function dashboard(){
        $datas['total']=Enrollment::count();
        $datas['pending']=Enrollment::where('status', 0)->count();
        $datas['success']=Enrollment::where('status', 1)->count();
        $datas['rejected']=Enrollment::where('status', 2)->count();
        $datas['datas']=Enrollment::latest()->take(10)->get();
        return view('admin.dashboard', $datas);
    }

    public function show($id){
        $datas['data']=Enrollment::find($id)->with();
        return view('admin.enrollment', $datas);
    }


}
