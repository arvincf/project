<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UsersController extends Controller
{
    private $user;

    public function __construct()
    {
        $this->user = new User;
    }
    public function manageUsers()
    {
        $users = User::where('id', '!=', auth()->user()->id)
            ->where('type', '!=', 'manager')
            ->where('type', '!=', 'applicant')
            ->simplePaginate(5);

        if (request()->ajax()) {
            return response(['userData' => $users]);
        }

        return view('userpage.useraccount.manageusers', compact('users'));
    }

    public function newapplicants()
    {
        $users = User::where('type', 'applicant')->simplePaginate(5);

        return view('userpage.useraccount.newapplicant', compact('users'));
    }

    public function createAccount(Request $request)
{
    $validation = Validator::make($request->all(), [
        'type' => 'required',
        'lastname' => 'required',
        'firstname' => 'required',
        'birthday' => 'required',
        'age' => 'required',
        'address' => 'required',
        'email' => 'required',
        'contact' => 'required',
    ]);

    if ($validation->fails()) {
        return back()->withInput()->with('warning', $validation->errors()->first());
    }

    // Generate a random password
    $password = Str::random(10); // Generates a random string of 10 characters

    $this->user->create([
        'id' => $this->user->max('id') + 1,
        'type' => trim($request->type),
        'last_name' => Str::title(trim($request->lastname)),
        'first_name' => Str::title(trim($request->firstname)),
        'birthdate' => $request->birthday,
        'age' => trim($request->age),
        'address' => trim($request->address),
        'email' => trim($request->email),
        'contact' => trim($request->contact),
        'password' => $password, 
        'plain_password' => $password
    ]);

    return back()->with('success', 'User Added!')->with('password', $password); // Pass the generated password back to the view
}


    public function updateAccount(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            'firstname' => 'required',
            'lastname' => 'required',
            'address' => 'required',
            'email' => 'required',
            'contact' => 'required'
        ]);

        if ($validation->fails()) {
            return back()->withInput()->with('warning', $validation->errors()->first());
        }

        $this->user->find($id)->update([
            'first_name' => Str::title(trim($request->firstname)),
            'last_name' => Str::title(trim($request->lastname)),
            'address' => trim($request->address),
            'email' => trim($request->email),
            'contact' => trim($request->contact)
        ]);

        return back()->with('success', 'User Updated!');
    }

    public function searchApplicant(Request $request, $option)
    {
        if($option == "applicant"){
            $userData = $this->user
            ->select('*')
            ->where('type', 'Applicant')
            ->orWhere('first_name', 'LIKE', "%{$request->name}%")
            ->orWhere('address', 'LIKE', "%{$request->name}%")
            ->get();

        return response(['userData' => $userData]);
        }
        else{$userData = $this->user
            ->select('*')
            ->whereNotIn('type', ['Admin', 'Manager', 'Applicant'])
            ->where('last_name', 'LIKE', "%{$request->name}%")
            ->orWhere('first_name', 'LIKE', "%{$request->name}%")
            ->orWhere('address', 'LIKE', "%{$request->name}%")
            ->get();

        return response(['userData' => $userData]);

        }
        
    }

    public function approveaccount(Request $request, $id)
    {
        $this->user->find($id)->update([
            'type' => trim($request->type),
        ]);
        return back()->with('success', 'User Updated!');
    }

    public function removeAccount($id)
    {
        $this->user->destroy($id);

        return back()->with('deleted', 'User Deleted!');
    }

    public function profile()
    {
        return view("userpage.profile");
    }

    public function searchUsers(Request $request)
{
    $userData = $this->user
        ->select('*')
        ->whereNotIn('type', ['Manager', 'Applicant'])
        ->where('id', '!=', auth()->user()->id)
        ->where(function ($query) use ($request) {
            $query->where('last_name', 'LIKE', "%{$request->name}%")
                  ->orWhere('first_name', 'LIKE', "%{$request->name}%")
                  ->orWhere('address', 'LIKE', "%{$request->name}%");
        })
        ->get();

    return response(['userData' => $userData]);
}


    public function getUsersAccount()
    {
        $users = User::where('id', '!=', auth()->user()->id)
            ->where('type', '!=', 'manager')
            ->where('type', '!=', 'applicant')
            ->get();

        return response(['userData' => $users]);
    }
}
