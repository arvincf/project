<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Delivery;
use App\Models\Product;
use App\Models\ProductReserve;
use App\Models\User;

class MainController extends Controller
{
    private $user;

    public function dashboard()
    {
        $totalUsers = User::count();
        $totalProducts = Product::count();
        $totalreservation = ProductReserve::count();
        $totalDelivery = Delivery::count();

        return view("userpage.dashboard", compact("totalUsers", "totalProducts", "totalreservation", "totalDelivery"));
    }

    public function settings()
    {
        $user = Auth::user();
        return view("userpage.settings", compact('user'));
    }

    public function updateSettings(Request $request, $id)
    {
        // Validate input data
        $validation = Validator::make($request->all(), [
            'firstname' => 'required',
            'lastname' => 'required',
            'birthday' => [
                'required',
                'date',
                // Use a custom validation rule to ensure the user is between 18 and 60 years old
                function ($attribute, $value, $fail) {
                    $minAge = now()->subYears(70);
                    $maxAge = now()->subYears(18);
                    if ($value > $maxAge || $value < $minAge) {
                        $fail("The $attribute must be between 18 and 60 years old.");
                    }
                },
            ],
            'age' => 'required',
            'address' => 'required',
            'email' => 'required|email',
            'contact' => 'required|numeric' // Assuming contact is numeric
        ]);

        // Check if validation fails
        if ($validation->fails()) {
            return back()->withInput()->with('warning', $validation->errors()->first());
        }

        // Find the user by ID
        $user = User::find($id);

        // Check if user exists
        if (!$user) {
            return redirect()->back()->with('error', 'User not found');
        }

        // Update user data
        $user->update([
            'first_name' => Str::title(trim($request->firstname)),
            'last_name' => Str::title(trim($request->lastname)),
            'birthdate' => trim($request->birthday),
            'age' => $request->age,
            'address' => trim($request->address),
            'email' => trim($request->email),
            'contact' => trim($request->contact)
        ]);

        return redirect()->back()->with('success', 'Settings updated successfully');
    }
}
