<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\Role;
use App\Models\Contestant;
use App\Models\University;
use App\Models\Paper;
use App\Models\Expert;
use App\Models\Score;
use App\Models\Vote;

use App\Models\Examination;
use App\Models\Status;

/*use App\Models\Facility;
use App\Models\Paper;*/
use App\Http\Requests\EditRequest;

// class ProfileContestantController extends Controller
class ProfileController extends Controller
{

    public function redirect()
    {
        $currentUserId = Auth::user()->id;
        $user = User::findOrFail($currentUserId); // Для вывода ошибки 404
        $role = Role::findOrFail($user->role_id);

        // dd($role->role_name);

        if($role->role_name == 'contestant'){
           return redirect()->route('contestant');
        }

        if($role->role_name == 'expert'){
            return redirect()->route('expert');
        }

        /*
        if( Auth::user()->role_name == 'contestant'){
           return redirect()->route('contestant');
        }

        if( Auth::user()->role_name == 'expert'){

            return redirect()->route('expert');
        }*/
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentUserId = Auth::user()->id;
        $user = User::findOrFail($currentUserId); // Для вывода ошибки 404
        $role = Role::findOrFail($user->role_id);

        if($role->role_name == 'contestant') {
            $contestant = Contestant::where('user_id', $currentUserId)->first();
            $university = University::where('id', $contestant->university_id )->first();
	        $papersCount = Paper::where('contestant_id', $contestant->id)->count();

	        return view('profile_contestant.index', compact(['user', 'contestant', 'university', 'papersCount']));

        } elseif($role->role_name == 'expert') {
            $expert = Expert::where('user_id', $currentUserId)->first();



        	return view('profile_expert.index', compact(['user', 'expert']));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EditRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $currentUserId = Auth::user()->id;
        $user = User::findOrFail($currentUserId); // Для вывода ошибки 404
        $role = Role::findOrFail($user->role_id);

        if($role->role_name == 'contestant') {
        	$contestant = Contestant::where('user_id', $currentUserId)->first();
            $university = University::where('id', $contestant->university_id )->first();
            $papersCount = Paper::where('contestant_id', $contestant->id)->count();
            $universities = University::all();

        	return view('profile_contestant.edit', compact(['user', 'contestant', 'university', 'papersCount', 'universities']));

        } elseif($role->role_name == 'expert') {
            $expert = Expert::where('user_id', $currentUserId)->first();

        	return view('profile_expert.edit', compact(['user', 'expert']));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $role = Role::findOrFail($user->role_id);

        if($role->role_name == 'contestant') {
            $user->full_name = $request->full_name;

            $contestant = Contestant::where('user_id', $user->id)->first();
            $contestant->faculty_name = $request->faculty_name;
            $contestant->specialty_name = $request->specialty_name;
            $contestant->year = $request->year;


            $universities = University::all();
            foreach($universities as $value) {
                $universities_names[] = $value->university_name;
            }

            //dd($universities_names);
            //dd($request->university_name);
            if (in_array($request->university_name, $universities_names)) {
                $university = University::where('university_name', $request->university_name)->first();
                $contestant->university_id = $university->id;

            } else {
                $university = University::where('id', $contestant->university_id )->first();
                $university->university_name = $request->university_name;
            }

            $resoult = $user->save();
            $resoult = $contestant->save();
            $resoult = $university->save();

            return redirect(route('contestant'));

        } elseif($role->role_name == 'expert') {
            $user->full_name = $request->full_name;

            $expert = Expert::where('user_id', $user->id)->first();
            $expert->facility = $request->facility;

            $resoult = $user->save();
            $resoult = $expert->save();

            return redirect(route('expert'));
        }

        /*$user = User::findOrFail($id);
        $role = Role::findOrFail($user->role_id);

        if($role->role_name == 'contestant') {
            $user->full_name = $request->full_name;

            $contestant = Contestant::where('user_id', $user->id)->first();
            $contestant->faculty_name = $request->faculty_name;
            $contestant->specialty_name = $request->specialty_name;
            $contestant->year = $request->year;

            $university = University::where('id', $contestant->university_id )->first();
            $university->university_name = $request->university_name;

            $resoult = $user->save();
            $resoult = $contestant->save();
            $resoult = $university->save();

            return redirect(route('contestant'));

        } elseif($role->role_name == 'expert') {
            $user->full_name = $request->full_name;

            $expert = Expert::where('user_id', $user->id)->first();
            $expert->facility = $request->facility;

            $resoult = $user->save();
            $resoult = $expert->save();

            return redirect(route('expert'));
        }*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function works()
    {
//       $listOfWorks = Paper::with(['score'])->orderBy('updated_at', 'DESC')->where('id')->get();

//       $listOfWorks = Paper::leftJoin('scores', 'papers.id', '=', 'scores.paper_id')->where('papers.comnt_content', '=','')->get(["papers.id", "scores.value"]);

        // $listOfWorks = Paper::orderBy('updated_at', 'DESC')->where('comnt_content', '')->paginate(5);
        $expert = Expert::where('id', Auth::user()->id)->first();
        $examinations = Examination::all()->where('expert_id', $expert->id);

        // dd($examinations);
        $statuses = Status::all();
        /*$statuses_arr = [];
        foreach ($statuses as $statuse) {
            if($statuse->statuse_name == 'not') {
                $statuses_arr[] = $statuse;
            }
        }

        dd($statuses_arr);*/

        $examination_papers_id = [];
        foreach ($examinations as $examination) {
            // dd(Status::where('id', $examination->status_id)->first());
            if(Status::where('id', $examination->status_id)->first()->status_name == 'not') {
                $examination_papers_id[] = $examination->paper_id;
            }
        }

        // dd($examination_papers_id);


        // $listOfWorks = Paper::orderBy('updated_at', 'DESC')->where('comnt_content', '')->paginate(5);
        // $listOfWorks = Paper::orderBy('updated_at', 'DESC')->where('id', $examination_papers_id)->paginate(5);
        
        // $listOfWorks = Paper::orderBy('updated_at', 'DESC')->find($examination_papers_id)->paginate(5);
//dd($examination_papers_id); die;
        $listOfWorks = Paper::orderBy('updated_at', 'DESC')->whereIn('id',$examination_papers_id)->paginate(5);


        $scores = Score::where('value')->get();

        $votes = Vote::all();

        return view('profile_expert.works', compact(['listOfWorks', 'votes']));
    }
}
