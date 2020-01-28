<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\Role;
use App\Models\Paper;
use App\Models\Score;
use App\Models\Notification;
use App\Models\Expert;

use Event;
use App\Events\onAddValueEvent;
use App\Events\onAddCommentEvent;
use App\Http\Requests\RevivingRequest;

class ReviewingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // !!! Пока не знаю, что надо писать в этом методе и нужен ли он
        $currentUserId = Auth::user()->id;
        $user = User::findOrFail($currentUserId); // Для вывода ошибки 404
        $role = Role::findOrFail($user->role_id);

        if($role->role_name == 'contestant'){
            // конкурсант не может рецензировать работу
            return redirect(route('paper'));
        } elseif($role->role_name == 'expert'){
            return view('reviewing.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create() - стандартный метод create()
    public function create($id) // метод create($id), где $id - id рецензируемой работы (передаётся в ссылке)
    {
        //dd('create');

        $currentUserId = Auth::user()->id;
        $paper = Paper::where('id', $id)->first();

        return view('reviewing.create', compact(['currentUserId', 'paper']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    public function store(RevivingRequest $request)
    {
        $notification = Notification::where('paper_id', $request->id)->where('expert_id', Auth::user()->id)->first();

        $paper = Paper::where('id', $request->id)->first();
        $paper->comnt_content = $request->comnt_content;
        $resoult = $paper->save();

        $expert = Expert::where('user_id', Auth::user()->id)->first();

        if($notification == null || $notification->expert_id == null) {
        	$score = new Score;
        	$score->expert_id = $expert->id;
        	$score->paper_id = $request->id;
        	$score->value = $request->value;
        	$resoult = $score->save();

            // Event::dispatch(new onAddPaperEvent(Auth::user(), $paper));
            Event::dispatch(new onAddValueEvent(Auth::user(), $paper));
            Event::dispatch(new onAddCommentEvent(Auth::user(), $paper));

            //dd('store 1');
            return redirect(route('redirect'));
            //return redirect(route('reviewing.edit', $score->paper_id));
        } else {
            //return redirect(route('reviewing.edit', $score->paper_id));
            $paper = Paper::where('id', $request->id)->first();
            $paper->comnt_content = $request->comnt_content;
            $resoult = $paper->save();

            
            $score = Score::where('expert_id', $expert->id)->where('paper_id', $request->id)->first();

            $score->expert_id = Auth::user()->id;

            $score->paper_id = (integer)$request->id;
            $score->value = $request->value;

            //$resoult = $score->save();
            $score->save();

            //dd($score);


            // Event::dispatch(new onAddPaperEvent(Auth::user(), $paper));
            Event::dispatch(new onAddValueEvent(Auth::user(), $paper));
            Event::dispatch(new onAddCommentEvent(Auth::user(), $paper));

            //dd(11111);
            return redirect(route('redirect'));
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
        // !!! Пока не знаю, что надо писать в этом методе и нужен ли он

        //$paper = Paper::where('id', $id)->first();
        /*$paper = Paper::findOrFail($id); // Для вывода ошибки 404

        return view('reviewing.show', compact('paper'));*/
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
        $paper = Paper::where('id', $id)->first();

        //return view('reviewing.edit', compact(['currentUserId', 'paper']));
        //return view('paper.edit', compact(['currentUserId', 'paper']));

        return redirect(route('reviewing.update', $paper->id));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    public function update(RevivingRequest $request, $id)
    {
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
