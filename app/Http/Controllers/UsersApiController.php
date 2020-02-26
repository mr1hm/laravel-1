<?php

namespace App\Http\Controllers;

use App\Users;
use Illuminate\Http\Request;

class UsersApiController extends Controller
{
    public function index()
    {
        $users = Users::all();

        return response($users, 200);
    }

    public function store()
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

        return response($users, 200);
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, Users $user)
    {
        //
    }
}
