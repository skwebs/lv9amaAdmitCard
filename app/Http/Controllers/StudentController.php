<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index(){

        $students = Student::all();
        // dd($students);


        return view('student.index_student',['students'=>$students]);
    }

    public function create(){
        return view('student.add_student');
    }

    public function store(Request $request)
    {       

        $request->validate([
            'name'      => 'required',
            'mother'    => 'nullable',
            'father'    => 'required',
            'gender'    => 'required',
            'dob'       => 'date|nullable',
            
            'mobile'    => 'regex:/^[6-9][0-9]{9}/i',
            'address'   => 'required',
            'class'     => 'required', 
            'roll'      => 'numeric|required',
            'student_type'=> 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        $imageName = $request->name."_".time().'.'.$request->image->extension();  
     
        $request->image->move(public_path('upload/images/students'), $imageName);
  
        /* Store $imageName name in DATABASE from HERE */
    
        // return back()
        //     ->with('success','You have successfully upload image.')
        //     ->with('image',$imageName); 

        // dd($request->all());

         $student = new Student;

         $student->name = $request->name;
         $student->mother = $request->mother;
         $student->father = $request->father;
         $student->gender = $request->gender;
         $student->dob = $request->dob;
         $student->aadhaar = $request->aadhaar;
         $student->mobile = $request->mobile;
         $student->address = $request->address;
         $student->class = $request->class;
         $student->roll = $request->roll;
         $student->student_type = $request->student_type;
         $student->image = $imageName;

        //  dd($request->name);
         
         $student->save();

         return redirect("/student")->with('success',$request->name.' data uploaded successfully.');
    
    }

    public function singleView($id){
        $student = Student::where('id',$id)->first();
        return view('student.view_student', compact('student'));
    }

    public function oldAma(){
        return view("old_ama");
    }

    public function oldSite(){
        return view("student.old_site");
    }

    public function admitCard(){
        $students = Student::all();
        return view("student.admit_card", ['students'=>$students]);
    }


}