<?php

namespace App\Http\Controllers;

use App\Models\StudentMark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentMarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marks = DB::table('student_marks')
                ->select('student_marks.id', 'student_marks.student_id', 'student_marks.term_id',
                'student_marks.maths', 'student_marks.science', 'student_marks.history', 
                DB::raw("(student_marks.maths + student_marks.science + student_marks.history) as total_mark"),
                'students.name as student_name', 'students.gender', 'terms.title as term')
                ->leftJoin('students', 'students.id', '=', 'student_marks.student_id')
                ->leftJoin('terms', 'terms.id', '=', 'student_marks.term_id')
                ->paginate(15);
        // $marks = StudentMark::with('student','term')->paginate(15);
        return view('admin.mark.list', compact('marks'));
           
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = DB::table('students')->get();
        $terms = DB::table('terms')->where('status','active')->get();
        return view('admin.mark.new', compact('students','terms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required',
            'term_id' => 'required',
            'maths' => 'required',
            'science' => 'required',
            'history' => 'required',
        ],  [
            'student_id.required' => 'student field is required',
            'term_id.required' => 'term field is required',
        ]);
        StudentMark::create($request->all());
        return redirect()->route('student-mark.index')->with('success', 'Mark added successfully.');
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
        $mark = StudentMark::find($id);
        $students = DB::table('students')->get();
        $terms = DB::table('terms')->where('status','active')->get();
        return view('admin.mark.edit', compact('mark','students','terms'));
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
        $request->validate([
            'student_id' => 'required',
            'term_id' => 'required',
            'maths' => 'required',
            'science' => 'required',
            'history' => 'required',
        ], [
            'student_id.required' => 'student field is required',
            'term_id.required' => 'term field is required',
        ]);
        $mark = StudentMark::find($id);
        $mark->student_id = $request->student_id;
        $mark->term_id = $request->term_id;
        $mark->maths = $request->maths;
        $mark->science = $request->science;
        $mark->history = $request->history;
        $mark->save();

        return redirect()->route('student-mark.index')->with('success', 'Mark updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mark = StudentMark::find($id);
        $mark->delete();

        return redirect()->route('student-mark.index')->with('success', 'Mark deleted successfully');
    }
}
