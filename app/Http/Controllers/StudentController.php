<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->route('student.list');
    }
    
    public function student_list()
    {
        //
        $data['students'] = Student::orderByDesc('id')->get(); //orderBy('id','desc');
        //dd($data);
        return view('students.index',$data);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        ]);
        
        $student = Student::create($request->all());
        
        return redirect()->route('student.upload_image',$student->id);
            
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    //public function show(Student $student)
    public function show($id)
    {
        //$data['student'] = Student::whereId($id)->first();
        //return view('students.admit_card_single', $data);
	    $data['students'][0] = Student::whereId($id)->first();
	    return view('students.admit_card_all',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student,$id)
    {
        //dd($student);
        $student = Student::whereId($id)->first();
        
        //dd($student->gender);
	    
        return view('students.edit', ['student'=>$student]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
        'dob'       => 'date',
        'mobile'    => 'regex:/^[6-9][0-9]{9}/i',
        'roll'      => 'numeric',
       
        ]);
        
        $student = Student::whereId($id)
        ->update($request->except(['_token']));
        
        return redirect()->route('student.upload_image',$id);
            
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    
    	$student = Student::whereId($id)->first();
    	
        $student->delete();
        
        return redirect()->route('student.list');
    }
    
    
    public function upload_image($id)
    {
        //$data['id']=$id;
        $student = Student::whereId($id)->get(['id','image'])->first();
        
        //dd($data);
    	return view('students.crop_image',compact('student'));
    }
    
    public function save_image(Request $request)
    {
		$imageName = time().'.jpg'; //$request->image->extension();  
		
		$request->image->move(public_path('upload/images/students'), $imageName);
		
		$student = Student::whereId($request->id)->first();
    	
    	$student->image = $imageName;
    	
    	$student->save();
    	
		//	all array data encode into json for client
		return response()->json([
			'success'=>true,
			'msg'=>'Image uploaded.'
		]);
    
    }
    
    public function admit_cards()
    {
    	$data['students'] = Student::get(); //orderBy('id','desc');
    	//dd($data);
    	return view('students.admit_card_all',$data);
    }
}