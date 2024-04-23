<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    private $user;

    public function __construct()
    {
        $this->user = new User;
    }
    public function loginUser(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validation->fails()) {
            return back()->withInput()->with('warning', $validation->errors()->first());
        }

        if (auth()->attempt($request->only("email", "password"))) {
            return $this->checkUser();
        }

        return back()->withInput()->with('warning', 'Incorrect User Information.');
    }

    public function logout()
    {
        auth()->logout();
        session()->flush();
        return redirect("/")->with('success', 'Successfully Logged Out.');
    }

    private function checkUser()
    {
        if (auth()->check()) {
            return redirect("/" . Str::lower(auth()->user()->type) . "/dashboard")->with('success', "Welcome " . auth()->user()->first_name . ".");
        }

        return back();
    }

    public function registerUser(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'lastname' => 'required',
            'firstname' => 'required',
            'birthday' => 'required',
            'age' => 'required|numeric',
            'address' => 'required',
            'email' => 'required|email',
            'contact' => 'required',
            'password' => 'required'
        ]);

        if ($validation->fails()) {
            return back()->withInput()->with('error', $validation->errors()->first());
        }

        User::create([
            'id' => $this->user->max('id') + 1,
            'type' => trim($request->type),
            'last_name' => Str::title(trim($request->lastname)),
            'first_name' => Str::title(trim($request->firstname)),
            'birthdate' => $request->birthday,
            'age' => trim($request->age),
            'address' => trim($request->address),
            'email' => trim($request->email),
            'contact' => trim($request->contact),
            'password' => Hash::make(trim($request->password)),
            'plain_password' => trim($request->password)
        ]);

        return back()->with('success', 'User Successfully Registered.');
    }
}
