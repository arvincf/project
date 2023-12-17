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
    public function manageusers()
    {
        $users = User::where('id', '!=', auth()->user()->id)
                ->where('type', '!=', 'manager')
                ->where('type', '!=', 'applicant')
                ->simplePaginate(5);
    
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
            'password' => 'required'
        ]);

        if ($validation->fails()) {
            return back()->withInput()->with('warning', $validation->errors()->first());
        }

        $this->user->create([
            'id' => $this->user->max('id') + 1,
            'type' => trim($request->type),
            'lastname' => Str::title(trim($request->lastname)),
            'firstname' => Str::title(trim($request->firstname)),
            'birthday' => $request->birthday,
            'age' => trim($request->age),
            'address' => trim($request->address),
            'email' => trim($request->email),
            'contact' => trim($request->contact),
            'password' => str::title(trim($request->password))
        ]);

        return back()->with('success', 'User Added!');
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
            'firstname' => Str::title(trim($request->firstname)),
            'lastname' => Str::title(trim($request->lastname)),
            'address' => trim($request->address),
            'email' => trim($request->email),
            'contact' => trim($request->contact)
        ]);

        return back()->with('success', 'User Updated!');
    }

    public function approveaccount(Request $request, $id){
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
}
