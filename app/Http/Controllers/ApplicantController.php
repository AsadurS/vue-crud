<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicantRequest;
use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\Board;
use App\Models\Upozila;
use App\Models\Division;
use App\Models\District;
use App\Models\University;
use App\Models\Applicant;
use App\Models\Training;
use Illuminate\Support\Str;
use App\Models\EducationQualification;
class ApplicantController extends Controller
{

	public function showForm()
	{

	  $examName        = Exam::all();
	  $boardName       = Board::all();
	  $universityNames = University::all();
	  $divisionsnames  = Division::all();

	  return view("reg" ,compact('examName', 'boardName', 'universityNames', 'divisionsnames'));
	}
    public function store(ApplicantRequest $request)
    {
		$applicant= Applicant::create([
			"name"=>$request->form["name"],
			"uuid"=>Str::orderedUuid()->toString(),
			"email"=>$request->form["email"],
			"division"=>$request->form["division"],
			"district"=>$request->form["district"],
			"upozila"=>$request->form["upozila"],
			"address_details"=>$request->form["address"],
			"training"=>$request->form["training"],
			"language"=>json_encode($request->form["language"])
		]);
		if($request->form["training"]==='yes')
		{
			foreach($request->form["trainingDetails"] as $details)
			{
				Training::create([
					"applicant_id"=>$applicant->id,
					'name'=>$details["name"],
					'details'=>$details["details"]
				]);
			}
		}

		foreach($request->form["qualification"] as $qualification)
			{
				EducationQualification::create([
					"applicant_id"=>$applicant->id,
					"exam_id"=>$qualification["examName"],
					"un_id"=>$qualification["universityName"],
					"board_id"=>$qualification["boardName"],
					"result"=>$qualification["result"]
				]);
			}

		return response()->json(["applicant_id"=>$applicant->id]);
    }

    public function district(Request $request)
    {
    	$district = District::where('division_id', $request->id)->get();

    	return response()->json(["districts"=>$district],200);
    }

     public function upozila(Request $request)
    {
    	$upozila = Upozila::where('district_id', $request->id)->get();

    	return response()->json(["upozilas"=>$upozila],200);
    }

    public function upload(Request $request)
    {
         $imageName = time().$request->image->getClientOriginalName();
         $fileName = time().$request->file->getClientOriginalName();
        $request->image->storeAs('image', $imageName );
        $request->file->storeAs('file', $fileName );
        $applicant= Applicant::where('id', $request->applicant_id)->update([
            "file"=>$fileName,
            "image"=>$imageName
        ]);
        return response()->json(['success' => $applicant]);
    }
}
