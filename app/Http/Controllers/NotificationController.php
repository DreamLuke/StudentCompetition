<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Contestant;
use App\Models\Notification;
use App\Models\Paper;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contestant = Contestant::where('user_id', Auth::user()->id)->first();
        //dd($contestant->id);
        $notifications = Notification::all()->where('contestant_id', $contestant->id);
        //$notifications2 = Notification::all('created_at');

        $notifications_data = [];
        foreach($notifications as $notification) {
            $notifications_data[$notification->created_at->format('d.m.Y')][] = [$notification->notfn_content, $notification->paper_id, $notification->created_at->format('H:i')];
        }

        // dd($notifications_data);
        //if($notifications_data)
        $keys = array_keys($notifications_data);

        return view('notification.index', compact('contestant', 'notifications', 'notifications_data', 'keys'));
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
