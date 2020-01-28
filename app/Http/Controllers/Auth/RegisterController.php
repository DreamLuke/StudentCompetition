<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use App\Models\University;
use App\Models\Contestant;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'full_name' => ['required', 'string', 'max:255'],
            'university_name' => ['required', 'string', 'max:255'],
            'faculty_name' => ['required', 'string', 'max:255'],
            'specialty_name' => ['required', 'string', 'max:255'],
            'year' => ['required', 'numeric', 'min:3', 'max:5'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'full_name' => $data['full_name'],
                'role_id' => 2,
            ]);
        $university = University::create([
                'university_name' => $data['university_name'],
            ]);
        $contestant = Contestant::create([
                // 'user_id' => 3,
                'user_id' => User::all()->last()->id,
                // 'university_id' => 1,
                'university_id' => University::all()->last()->id,
                'faculty_name' => $data['faculty_name'],
                'specialty_name' => $data['specialty_name'],
                'year' => $data['year'],
            ]);

        return $user;




        // return [User::create([
        //     'email' => $data['email'],
        //     'password' => Hash::make($data['password']),
        //     'full_name' => $data['full_name'],
        //     'role_id' => 2,
        // ]),
        // University::create([
        //     'university_name' => $data['university_name'],
        // ]),
        // Contestant::create([
        //     // 'user_id' => 3,
        //     'user_id' => User::all()->last()->id,
        //     // 'university_id' => 1,
        //     'university_id' => University::all()->last()->id,
        //     'faculty_name' => $data['faculty_name'],
        //     'specialty_name' => $data['specialty_name'],
        //     'year' => $data['year'],
        // ])];

        // $user = User::create([
        //         'email' => $data['email'],
        //         'password' => Hash::make($data['password']),
        //         'full_name' => $data['full_name'],
        //         'role_id' => 2,
        //     ]);
        // $university = University::create([
        //         'university_name' => $data['university_name'],
        //     ]);
        // $contestant = Contestant::create([
        //         // 'user_id' => 3,
        //         'user_id' => User::all()->last()->id,
        //         // 'university_id' => 1,
        //         'university_id' => University::all()->last()->id,
        //         'faculty_name' => $data['faculty_name'],
        //         'specialty_name' => $data['specialty_name'],
        //         'year' => $data['year'],
        //     ]);


        // return redirect(route('home'));
    }
}
