<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\models\Standard;
use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Students::with('reportingTo', 'standard')->paginate(15);
        return view('admin.student.list', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = DB::table('users')->where('user_type','teacher')->where('status','active')->get();
        $standards = Standard::where('status','active')->get();
        return view('admin.student.new', ["teachers" => $teachers, "standards" => $standards]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        $student = new Students();
        $student->name = $request->name;
        $student->age = $request->age;
        $student->gender = $request->gender;
        $student->reporting_to = $request->reporting_to;
        $student->standard_id = $request->standard_id;
        $student->save();
        return redirect()->route('student.index')->with('success', 'Student created successfully.');
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
        $teachers = DB::table('users')->where('user_type','teacher')->where('status','active')->get();
        $standards = Standard::where('status','active')->get();
        $student = Students::find($id);
        return view('admin.student.edit', compact('student','teachers', 'standards'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StudentRequest $request, $id)
    {
        $student = Students::find($id);
        $student->name = $request->name;
        $student->age = $request->age;
        $student->gender = $request->gender;
        $student->reporting_to = $request->reporting_to;
        $student->standard_id = $request->standard_id;
        $student->save();
        return redirect()->route('student.index')->with('success', 'Student updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Students $student)
    {
        $student->delete();
        return redirect()->route('student.index')->with('success', 'Student deleted successfully');
    }
}
