<?php

namespace App\Http\Controllers\contest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Auth;
use App\University;


class ContestController extends Controller
{
    public function Index()
    {
        $university = University::Where('vendor_id', Auth::user()->id)->first();

        // dd($university);
        return view('pages.contest.index')->with(["university" => $university]);
    }

    public function EditContest(Request $request)
    {
        $university = University::Where('vendor_id', Auth::user()->id);
        // dd($university);
        if (count($university->get()) < 1) {
            $validator = Validator::make($request->all(), [
                'university_name' => 'required', 'string', 'max:255',
                'fullname1' => 'required', 'string', 'max:255',
                'studentid1' => 'required', 'string', 'max:255',
                'position1' => 'required', 'string', 'max:255',
                'group_name' => 'required', 'string', 'max:255',
                'checkbox' => 'accepted',
            ]);
            if ($validator->fails()) {
                echo "<script>
               alert('Please check your data and conditions');
               window.location.href='/contest';
               </script>";
            } else {
                $request['vendor_id'] = Auth::User()->id;
                University::create($request->all());
                return redirect('/');
            }
        }

        if (count($university->get()) >= 1) {

            $university->update([
                'university_name' => $request->university_name,
                'fullname1' => $request->fullname1,
                'studentid1' => $request->studentid1,
                'position1' => $request->position1,

                'fullname2' => $request->fullname2,
                'studentid2' => $request->studentid2,
                'position2' => $request->position2,

                'fullname3' => $request->fullname3,
                'studentid3' => $request->studentid3,
                'position3' => $request->position3,

                'fullname4' => $request->fullname4,
                'studentid4' => $request->studentid4,
                'position4' => $request->position4,

                'fullname5' => $request->fullname5,
                'studentid5' => $request->studentid5,
                'position5' => $request->position5,
                'group_name' => $request->group_name,

            ]);
        }
        return redirect('/');
    }
}
