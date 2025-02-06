<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    // Declare a public variable
    public $users;

    // Initialize the variable in the constructor
    public function __construct()
    {
        $this->users = [
            (object) ['id' => 1, 'name' => 'Jack', 'email' => 'jack@email.com'],
            (object) ['id' => 2, 'name' => 'Harry', 'email' => 'harry@gmail.com'],
        ];
    }

    public function index()
    {
        // Fetch all users data with pagination
        $users = User::take(10)->orderByDesc('name')->get();

        return view('users.index', compact('users'));
    }

    public function show(string $id)
    {

        // Fetch specific user data
        $user = User::findOrFail($id)->toArray();

        return view('users.show', compact('user'));
    }
}
