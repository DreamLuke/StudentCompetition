<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\Role;

class EditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {


        $currentUserId = Auth::user()->id;
        $user = User::findOrFail($currentUserId); // Для вывода ошибки 404
        $role = Role::findOrFail($user->role_id);

        //dd($role->role_name);

        if($role->role_name == 'contestant'){
           return [
                'full_name' => 'required|string|max:255|min:3',
                'university_name' => 'required|string|max:255|min:3',
                'faculty_name' => 'required|string|max:255|min:3',
                'specialty_name' => 'required|string|max:255|min:3',
                'year' => 'required|numeric|min:3|max:5',


            ];
        }

        if($role->role_name == 'expert'){
            return [
            'full_name' => 'required|string|max:255|min:3',
            'facility' => 'required|string|max:255|min:3',
            ];
        }





        /*return [
            'full_name' => 'required|string|max:255|min:3',
            'facility' => 'required|string|max:255|min:3',

            'university_name' => 'required|string|max:255|min:3',
            'faculty_name' => 'required|string|max:255|min:3',
            'specialty_name' => 'required|string|max:255|min:3',
            'year' => 'required',

        ];*/
    }
}
