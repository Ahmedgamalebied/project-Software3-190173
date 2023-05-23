<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function  getLogin(){
        
        return view('doctor.login');
    }
    public function dashboard(){
        $subjects = Subject::all();
        return view('index',compact('subjects'));
    }
    // public function login(Request $request){
        
    //     $remember_me = $request->has('remember_me') ? true : false;

    //     if (auth()->guard('doctor')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {
    //        // notify()->success('تم الدخول بنجاح  ');
    //         return redirect() -> route('index');
    //     }
    //    // notify()->error('خطا في البيانات  برجاء المجاولة مجدا ');
    //     return redirect()->back()->with(['error' => 'هناك خطا بالبيانات']);
    // }
    public function index(){
     $subjects = Subject::all();
        return view('index-doctor',compact('subjects'));
    }
    public function index_student(){
        $subjects = Subject::all();
           return view('index',compact('subjects'));
       }
    public function create_subject(){
        $departments = Department::all();
        return view('create-subject',compact('departments'));
    }   
    public function create_department(){
     
        return view('create-department');
    }
    public function store_subject(Request $request){ 
     $data = $request->validate([
        'name'=>'required',
        'code'=>'required',
        'department'=>'required'
     ]);
     Subject::create($data);
        return redirect()->back();
    }
    public function delete_subject($id){
        Subject::find($id)->delete();
        return redirect()->back();
    }
    public function edit_subject($id){
         $departments = Department::all();
         $subject = Subject::find($id);
         return view('edit-subject',compact('departments','subject'));
    }
    public function update_subject(Request $request,$id){
        $request->validate([
            'name'=>'required',
            'code'=>'required',
        ]);
        $subject = Subject::find($id);
       $subject->update($request->all());
     
       return redirect()->route('dashboard');
    }
}
