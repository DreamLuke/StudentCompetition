<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\Paper;
use App\Models\Contestant;
use App\Models\Vote;
use App\Models\Role;

class ListOfWork extends Controller
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

            if($role->role_name == 'contestant') {
                $contestant = Contestant::where('user_id', Auth::user()->id)->get()->first();
                $papers = Paper::where('contestant_id', $contestant->id)->orderBy('updated_at', 'DESC')->get();
                $votes = Vote::all();

                $listOfWorks = Paper::orderBy('updated_at', 'DESC')->paginate(10);

                return view('listOfWorks.index', compact('listOfWorks', 'papers', 'votes'));
            } elseif($role->role_name == 'expert'){
                $papers = Paper::where('contestant_id', '*')->orderBy('updated_at', 'DESC')->get();
                $votes = Vote::all();

                $listOfWorks = Paper::orderBy('updated_at', 'DESC')->paginate(10);

                return view('listOfWorks.index', compact('listOfWorks', 'papers', 'votes'));
            }
        } else {
            $papers = Paper::where('contestant_id', '*')->orderBy('updated_at', 'DESC')->get();
            $votes = Vote::all();

            $listOfWorks = Paper::orderBy('updated_at', 'DESC')->paginate(10);

            return view('listOfWorks.index', compact('listOfWorks', 'papers', 'votes'));
        }

        //$contestant = new Contestant();
        /*$contestant = Contestant::where('user_id', Auth::user()->id)->get()->first();
        $papers = Paper::where('contestant_id', $contestant->id)->orderBy('updated_at', 'DESC')->get();
        $votes = Vote::all();

        $listOfWorks = Paper::orderBy('updated_at', 'DESC')->paginate(10);
        return view('listOfWorks.index', compact('listOfWorks', 'papers', 'votes'));*/
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
        $listOfWorks = Paper::findOrFail($id)->first();
        return view('listOfWorks.show', compact(['listOfWorks']));
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
