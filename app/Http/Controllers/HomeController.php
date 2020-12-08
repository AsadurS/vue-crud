<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Board;
use App\Models\Division;
use App\Models\Exam;
use App\Models\University;
use Illuminate\Http\Request;

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

        $divisionsNames  = Division::all();
        $applicant  = Applicant::with("upozila", "district", "division")->get();
        return view("home" ,compact('divisionsNames', "applicant"));
    }

    public function filter(Request $request)
    {
        $name = $request->name ?: null;
        $email = $request->email ?: null;
        $division= $request->division ?: null;
        $district = $request->district ?: null;
        $upozila = $request->upozila ?: null;

      $applicant  = Applicant::when(!empty($name), function ($query)use ($name) {
          return $query->where('name', 'like','%'. $name .'%');
           })
          ->when($email!==null, function ($query) use ($email) {
              return $query->where('email', $email);
          })
          ->when($division!==null, function ($query)use($division) {
              return $query->where('division', $division);
          })
          ->when($district!==null, function ($query) use ($district) {
              return $query->where('district', $district);
          })
          ->when($upozila!==null, function ($query) use ($upozila) {
              return $query->where('upozila', $upozila);
          })
          ->get();

      return response()->json(["applicants" =>$applicant]);


    }
}
