<?php

namespace App\Http\Controllers;

use App\User as User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();

        return view('users.index', [ 'users' => $users]);
    }

    /**
     * @param User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function store()
    {

        User::create($this->validateUser());

        return redirect('/users');
    }

    /**
     * @param User $user
     *
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function update(User $user)
    {

        $user->update($this->validateUser());

        return redirect('/users/', $user->id);
    }

    protected function validateUser()
    {
        return request()->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
    }
}
