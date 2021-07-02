<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $students = Student::get();
        //dd($students);
        return view('home',compact('students'));
    }

    public function showCreateStudent(){

        return view('create');
    }

    public function createStudent(Request $request){

        $request->validate([

            'name'          =>  'required',
            'age'           =>  'required|numeric|min:1',   
            'gender'        =>  'required',
            'teacher'       =>  'required',

        ],[

            'age.min' => 'Enter valid age'

        ]);

        $student    = new Student;

        $student->name              = $request->name;
        $student->age               = $request->age;
        $student->gender            = $request->gender;
        $student->report_teacher    = $request->teacher;

        $student->save(); 

        return redirect()->route('home')->with('message', 'Student Added Successfully');
        
        //dd($request->all());
    }

    public function showEditStudent($id){

        $student = Student::find($id);

        // dd($student);

        if($student){

            return view('edit',compact('student'));
        }
        else{
            return redirect()->route('home');
        }
    }

    public function updateStudent(Request $request){

        $request->validate([

            'name'          =>  'required',
            'age'           =>  'required|numeric|min:1',   
            'gender'        =>  'required',
            'teacher'       =>  'required',

        ],[

            'age.min' => 'Enter valid age'

        ]);


        $student = Student::find($request->student_id);
        
        $student->name              = $request->name;
        $student->age               = $request->age;
        $student->gender            = $request->gender;
        $student->report_teacher    = $request->teacher;

        $student->save();

        return redirect()->route('home')->with('message', 'Student detail Updated Successfully');

        //dd($request->all());

    }

    public function deleteStudent($id){

        $student = Student::find($id);

        //dd($student);

        if($student){

            $student->delete(); 

            return redirect()->route('home')->with('message', 'Student data deleted!');
        }
        else{
            return redirect()->route('home');
        }
    }
}
