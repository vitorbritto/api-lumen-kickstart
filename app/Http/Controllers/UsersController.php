<?php

namespace App\Http\Controllers;

use App\Entities\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
		// $this->middleware('auth');
    }

    /**
     * List users
     * GET - /users
     */
    public function index() 
    {
        $users = User::all();
        return $this->success($users, 200);
    }

    /**
     * Create user
     * POST - /users
     */
    public function store(Request $request) 
    {
        $this->validateRequest($request);

        $user = new User;

        $user->cpf = $request->input('cpf');
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->phone = $request->input('phone');
        $user->birth = $request->input('birth');
        $user->gender = $request->input('gender');
        $user->notes = $request->input('notes');
        $user->status = $request->input('status');
        $user->permission = $request->input('permission');

        $user->save();

        return $this->success($user, 200);
    }

    /**
     * View user
     * GET - /users/:id
     */
    public function show($id) 
    {
        $user = User::find($id);

        if (!$user) {
            return $this->error('User not found', 404);
        }

        return $this->success($user, 200);
    }


    /**
     * Update user
     * PUT - /users/:id
     */
    public function update(Request $request, $id) 
    {
        $user = User::find($id);

        if (!$user) {
            return $this->error('User not found', 404);
        }

        $user->cpf = $request->input('cpf');
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->phone = $request->input('phone');
        $user->birth = $request->input('birth');
        $user->gender = $request->input('gender');
        $user->notes = $request->input('notes');
        $user->status = $request->input('status');
        $user->permission = $request->input('permission');

        $user->save();

        return $this->success($user, 200);
    }


    /**
     * Delete user
     * DELETE - /users/:id
     */
    public function destroy($id) 
    {
        $user = User::find($id);

        if (!$user) {
            return $this->error('User not found', 404);
        }

        $user->delete();

        return response()->json('User successfully removed!');
    }


    /**
     * Validators
     */
    public function validateRequest(Request $request)
    {
        $rules = [
            'email' => 'required|email|unique:users', 
            'password' => 'required|min:6'
        ];
        $this->validate($request, $rules);
    }

    public function isAuthorized(Request $request)
    {
		$resource = "users";
		// $user     = User::find($this->getArgs($request)["user_id"]);
		return $this->authorizeUser($request, $resource);
	}
}
