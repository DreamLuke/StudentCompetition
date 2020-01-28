<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\Role;
use App\Models\Contestant;
use App\Models\Paper;
use App\Models\Vote;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

//        $papers = Paper::where('contestant_id', '*')->orderBy('updated_at', 'DESC')->get();
        $votes = Vote::all();

        // $listOfWorks = Paper::orderBy('updated_at', 'DESC')->paginate(10);

        //return view('listOfWorks.index', compact('listOfWorks', 'papers', 'votes'));

        $papers = DB::table('papers')
            ->selectRaw('COUNT(*) as voteCount, papers.id, papers.paper_name, papers.paper_note, papers.updated_at')
            ->join('votes', 'papers.id', 'votes.paper_id')
            ->groupBy('papers.id')
            ->orderBy('voteCount', 'desc')
            ->limit(3)
            ->get();


//        $papers = Paper::orderBy('updated_at', 'DESC')->get()->take(3);
//        foreach($papers as $paper) {
//            $papers_data = $paper->id;
//        }
        return view('welcome', compact('papers', 'votes', 'papers_data'));
    }
}
