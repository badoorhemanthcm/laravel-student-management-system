<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mark;
use App\Models\Student;
class MarkController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //$students = Student::get();
        //dd($students[0]->mark);

        $marks = Mark::get();
        //dd($marks[0]->student);
        return view('marks.index',compact('marks'));
    }

    public function showCreateMark(){

    	$students = Student::get();

    	return view('marks.create',compact('students'));
    }

    public function addMark(Request $request){

        $request->validate([

            'student'   =>  'required',
            'term'      =>  'required',   
            'maths'     =>  'required|numeric|min:0',
            'science'   =>  'required|numeric|min:0',
            'history'	=>	'required|numeric|min:0',

        ]);

        //dd($request->all());

        $total = $request->maths + $request->science + $request->history;

        $mark    = new Mark;

        $mark->student_id  	= $request->student;
        $mark->maths       	= $request->maths;
        $mark->science     	= $request->science;
        $mark->history     	= $request->history;
        $mark->term    		= $request->term;
        $mark->total    	= $total;

        $mark->save(); 

        return redirect()->route('mark')->with('message', 'New Mark Added Successfully');
        
    }

    public function showEditMark($id){

        $mark = Mark::find($id);

        //dd($mark->term);

        if($mark){

        	$students = Student::get();

            return view('marks.update',compact('mark','students'));
        }
        else{
            return redirect()->route('mark');
        }
    }

    public function updateMark(Request $request){

        $request->validate([

            'student'   =>  'required',
            'term'      =>  'required',   
            'maths'     =>  'required|numeric|min:0',
            'science'   =>  'required|numeric|min:0',
            'history'	=>	'required|numeric|min:0',

        ]);

        //dd($request->all());

        $total = $request->maths + $request->science + $request->history;

        $mark = Mark::find($request->mark_id);

        $mark->student_id  	= $request->student;
        $mark->maths       	= $request->maths;
        $mark->science     	= $request->science;
        $mark->history     	= $request->history;
        $mark->term    		= $request->term;
        $mark->total    	= $total;

        $mark->save(); 

        return redirect()->route('mark')->with('message', 'Student Mark Updated Successfully');
        
    }

    public function deleteMark($id){

        $mark = Mark::find($id);

        //dd($mark);

        if($mark){

            $mark->delete(); 

            return redirect()->route('mark')->with('message', 'Student mark deleted!');
        }
        else{
            return redirect()->route('mark');
        }
    }
}
