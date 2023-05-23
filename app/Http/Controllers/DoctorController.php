<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
    public function register_doctor(Request $request){
       return view('doctor.register-doctor');
   }
   public function subject($id){
    // return 'hi';
       $data = Subject::find($id);
        return view('doctor.subject',compact('data'));
   }
    public function create_doctor(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:doctors'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $subjects = Subject::all();
         Doctor::create([
            'name' =>$request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
         ]);
         return view('index-doctor',compact('subjects'));
    }
    public function __construct()
    {
        $this->middleware('guest:doctor',['except'=>['logout']]);
        
    }
    public function showLoginForm(){
        //  $admin = new Doctor();
        // $admin -> name ="Sayed";
        // $admin -> email ="sayed45@gmail.com";
        // $admin -> password = bcrypt("sayed123456");
        // $admin -> save();
        return view('doctor.login');
         // $admin = new Doctor();
        // $admin -> name ="Sayed";
        // $admin -> email ="sayed@gmail.com";
        // $admin -> password = bcrypt("sayed123456");
        // $admin -> save();
    }
    public function login(Request $request){
        // $admin = new Doctor();
        // $admin -> name ="Sayed";
        // $admin -> email ="sayed@gmail.com";
        // $admin -> password = bcrypt("sayed123456");
        // $admin -> save();
      
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
        return redirect('doctor/getlogin');
    }
}
