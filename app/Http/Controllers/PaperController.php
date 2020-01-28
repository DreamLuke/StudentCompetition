<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\Role;
use App\Models\Contestant;
use App\Models\Paper;
use Illuminate\Support\Facades\Storage;

use Event;
use App\Events\onAddPaperEvent;
use App\Models\Notification;
use App\Models\Vote;
use App\Models\Examination;
use App\Models\Expert;
use App\Models\Status;

use App\Http\Requests\AddPaperRequest;

class PaperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$contestant = new Contestant();
        $contestant = Contestant::where('user_id', Auth::user()->id)->get()->first();
        $papers = Paper::where('contestant_id', $contestant->id)->orderBy('updated_at', 'DESC')->get();
        $votes = Vote::all();
        return view('paper.index', compact('papers', 'votes'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $currentUserId = Auth::user()->id;
        $user = User::findOrFail($currentUserId); // Для вывода ошибки 404
        $role = Role::findOrFail($user->role_id);

        if($role->role_name == 'contestant'){
            return view('paper.create', compact(['currentUserId']));
        } elseif($role->role_name == 'expert'){
            dd('Эксперт не может добовлять работу');
        }

        //$currentUserId = Auth::user()->id;
        //return view('paper.create', compact(['currentUserId']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    // public function store(AddPaperRequest $request)
    {
        $currentUserId = Auth::user()->id;
        $contestant = Contestant::where('user_id', $currentUserId)->first();

        $paper = new Paper;
        $paper->contestant_id = $contestant->id;
        $paper->paper_name = $request->paper_name;
        $paper->paper_note = $request->paper_note;

        $notification = new Notification;

        if($request->hasFile('avatar') &&
            $request->avatar->extension() == 'pdf') {
            $path = $request->avatar->storeAs('public/papers_storage', $contestant->id . '_' . date('Y_m_d_H_i_s') . '_' . $request->avatar->getClientOriginalName());

            $paper->paper_content = $path;
            $paper->comnt_content = '';
            $resoult = $paper->save();

            // Event::dispatch(new onAddPaperEvent(Auth::user(), $paper, $notification));
            Event::dispatch(new onAddPaperEvent(Auth::user(), $paper));

            return redirect(route('paper'));
        } else {
            return redirect(route('paper.store'));
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Auth::user() != null) {
        	$papers = Paper::findOrFail($id);
        	$currentUserId = Auth::user()->id;

        	$user = User::findOrFail($currentUserId); // Для вывода ошибки 404
        	$role = Role::findOrFail($user->role_id);
            $votes = Vote::all();

            if($role->role_name == 'contestant') {
                return view('paper.show', compact(['papers', 'currentUserId', 'role', 'votes']));
            } elseif($role->role_name = 'expert') {
                $examination = Examination::where('paper_id', $id)->first();
                $status = Status::where('id', $examination->paper_id)->first();

                // dd($status);


                return view('paper.show', compact(['papers', 'currentUserId', 'role', 'votes', 'examination', 'status']));
            }

        	// return view('paper.show', compact(['papers', 'currentUserId', 'role', 'votes']));
        } else {
        	$papers = Paper::findOrFail($id);
        	$role = Role::findOrFail(2);
        	$votes = Vote::all();

        	return view('paper.show', compact(['papers', 'role', 'votes']));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    // public function update(AddPaperRequest $request, $id)
    {
        //
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

    public function download($id){
        $entry = Paper::where('id', '=', $id)->firstOrFail('paper_content');
        $pathToFile=storage_path()."/app/".$entry->paper_content;
        return response()->download($pathToFile);
    }
}
