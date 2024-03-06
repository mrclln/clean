<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EnrolleeController extends Controller
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
    public function index(){
        return view('enroll.index');
    }
    public function create(){}
    public function store(){}
    public function edit(){}
    public function update(){}
    public function destroy(){}

}
