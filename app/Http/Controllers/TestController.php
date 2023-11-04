<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class TestController extends Controller
{
    public function index()
    {
        $students = Student::with('address')->get();
        return view('pages.testing', ['students'=>$students]);
    }

    public function store(Request $requset)
    {
        $students = new Student();
        $students->name = $requset->student_name;
        $students->save();

        // $students = Student::find($requset->student_id);

        $students = Student::where('status', 1)->get();
        $students->name = $requset->student_name;
        $students->update();

        return redirect()->back();
    }
}
