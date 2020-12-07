<?php

namespace App\Http\Controllers;


use App\Models\Lecture;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();

        return view('index', compact('user'));
    }

    public function students()
    {
        $students=User::with(['classes'])->where('is_admin')->get();
        return view('students', compact('students'));

    }

    public function student($id)
    {
        $classes = Lecture::all();
        $student = User::findOrFail($id);
        return view('student', compact('student', 'classes'));
    }


    public function classes()
    {
        $classes = Lecture::with(['students'])->get();
        return view('classes', compact('classes'));
    }

    public function class($id)
    {
        $class = Lecture::findOrFail($id);
        return view('class', compact('class'));
    }

    public function my_classes()
    {
        $student = Auth::user();
        return view('my_classes', compact('student'));
    }

    public function create_class(){
        return view('add_claass');
    }

    public function save(Request $request){
        $request->validate([
            'class_name' => 'required',
        ]);
        $leqture=new Lecture($request->all());
        $leqture->save();
        return redirect()->back();
    }
    public function change_class(Request $request,$id){
        $students=User::findOrFail($id);
        if ($students->classes()->detach($request->classes)==true){
            $students->classes()->detach($request->classes);
        }else{
            $students->classes()->attach($request->classes);
        }

        return redirect()->back();
    }
}
