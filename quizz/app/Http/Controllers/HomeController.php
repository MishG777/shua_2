<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function index()
    {
        $user=Auth::user();
        return view('quizz',compact('user'));
    }
    public function create_quizz(){
        return view('create_quizz');
    }
    public function save_quizz(Request $request){
        $quizz=new Question($request->all());
        $quizz->save();
        return redirect()->back();
    }
}
