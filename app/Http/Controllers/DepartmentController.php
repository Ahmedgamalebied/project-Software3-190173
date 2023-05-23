<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function store_department(Request $request){
        $data = $request->validate([
            'name'=>'required',
            'code'=>'required'
        ]);
        Department::create($data);
        return redirect()->route('dashboard');
    }
}
