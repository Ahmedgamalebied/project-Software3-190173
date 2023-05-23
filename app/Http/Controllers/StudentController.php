<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function index(){
        $subjects = Subject::all();
        return view('index-student',compact('subjects'));
    }
    public function subject(){
        $data = Subject::all();
        return view('doctor.subject',compact('data'));
    }
    public function __construct()
    {
        $this->middleware('guest:student',['except'=>['logout']]);
        
    }
    public function showLoginForm(){
        return view('student.login');
    }
    public function login(Request $request){
      
        // dd($request->all());
        $remember_me = $request->has('remember_me') ? true : false;

        if (auth()->guard('doctor')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {
           // notify()->success('تم الدخول بنجاح  ');
          
            return redirect()->route('index.doctor');

        }
        // dd('hi');
       // notify()->error('خطا في البيانات  برجاء المجاولة مجدا ');
        return redirect()->back()->with(['error' => 'هناك خطا بالبيانات']);
    }
    public function logout(){
       
        Auth::logout();
        return redirect('login');
    }
}
