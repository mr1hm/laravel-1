<?php

namespace App\Http\Controllers;

use App\Users;
use Illuminate\Http\Request;

class UsersApiController extends Controller
{
    public function getAllUsers() // Get All Current Users in Database.
    {

        $users = Users::all();

        return response($users, 200);

    }

    public function create(Request $request) // Create New User.
    {

        $this->validate(request(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
        ]);

        $user = Users::create([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'email' => $request->get('email'),
        ]);

        $user->save();

        $users = Users::all();


        return response($user, 200);

    }

    public function getUser(Users $userID) // Get A Specific User in the Database.
    {

        return response($userID, 200);

    }

    public function updateUser(Request $request, Users $user) // Update A Specific User in the Database.
    {
        // Validation
        // $this->validate($request, [
        //     'first_name' => 'required',
        //     'last_name' => 'required',
        //     'email' => 'required'
        // ]);

        $user->update($request->all());

        $user->save();

        return response($user, 200);

    }
}
