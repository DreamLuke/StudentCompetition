<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\User;
use App\Models\Role;

use App\Models\Paper;
use App\Models\Contestant;
use App\Models\Vote;

use Event;
use App\Events\onAddPopularEvent;

class VoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user() != null) {
            $user = User::findOrFail(Auth::user()->id);
            $role = Role::findOrFail($user->role_id);

            if($role->role_name == 'contestant'){
                dd($role->role_name);
            } elseif($role->role_name == 'expert'){
                dd($role->role_name);
            }
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create(Request $request, $id)
    public function create($id)
    {
        //dd('Привет');
        //return;

        if(Auth::user() != null) {
            $user = User::findOrFail(Auth::user()->id);
            $role = Role::findOrFail($user->role_id);

            // dd($_SERVER['HTTP_REFERER']);

            if($role->role_name == 'contestant'){
                // dd($role->role_name);

                $contestant = Contestant::where('user_id', $user->id)->first();
                $vote = Vote::where('contestant_id', $contestant->id)->where('paper_id', $id)->first();
                $votes = Vote::all();

                if($vote == null) {
                    $vote = new Vote;
                    $vote->contestant_id = $contestant->id;
                    $vote->paper_id = $id;
                    $vote->save();

                    $paper = Paper::where('id', $id)->first();

                    Event::dispatch(new onAddPopularEvent(Auth::user(), $paper, $votes));

                    // return redirect(route('home'));
                    // return redirect($_SERVER['HTTP_REFERER']);
                    // 
                    $votes_count = $votes->where('paper_id', $paper->id)->count();
                    
                    return json_encode($votes_count);
                } else {
                    $paper = Paper::where('id', $id)->first();

                    Event::dispatch(new onAddPopularEvent(Auth::user(), $paper, $votes));

                    //return redirect(route('home'));
                    // return redirect($_SERVER['HTTP_REFERER']);
                    // 
                    $votes_count = $votes->where('paper_id', $paper->id)->count();
                    
                    return json_encode($votes_count);
                }
            } elseif($role->role_name == 'expert'){
                // return redirect(route('home'));
                return redirect($_SERVER['HTTP_REFERER']);
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
}
