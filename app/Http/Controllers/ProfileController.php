<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Address;


class ProfileController extends Controller
{
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function editAddress(Request $request)
    {
        return view('address.edit', [
            'user' => $request->user(),
        ]);
    }

    public function update(Request $request): RedirectResponse
    {

        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                'unique:users,name,' . Auth::id()
            ],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users,email,' . Auth::id()
            ],
        ]);

        $user = $request->user();

        $user->name = $validated['name'];
        $user->email = $validated['email'];

        if ($request->filled('password')) {
            $validatedPassword = $request->validate([
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
            $user->password = bcrypt($validatedPassword['password']);
        }
        $user->save();

        return redirect('/usersettings')->with('status', 'Profile updated successfully!');
    }
    public function updateAddress(Request $request)
    {
        $user = $request->user();

        $validated = $request->validate([
            'address_line1' => 'required|string|max:255',
            'address_line2' => 'nullable|string|max:255',
            'postcode' => 'required|string|max:20',
            'country' => 'required|string|max:100',
        ], [
            'address_line1.required' => 'The address line 1 is required.',
            'postcode.required' => 'The postcode is required.',
            'country.required' => 'Please provide the country name.',
        ]);

        if ($user->address_id) {
            $address = Address::find($user->address_id);

            if ($address) {
                $address->update([
                    'address_line1' => $validated['address_line1'],
                    'address_line2' => $validated['address_line2'],
                    'postcode' => $validated['postcode'],
                    'country' => $validated['country'],
                ]);
            }
        } else {
            $address = Address::create([
                'address_line1' => $validated['address_line1'],
                'address_line2' => $validated['address_line2'],
                'postcode' => $validated['postcode'],
                'country' => $validated['country'],
            ]);

            $user->address_id = $address->id;
            $user->save();
        }

        return redirect()->back()->with('status', 'Your address has been successfully updated!');
    }


    public function destroy(Request $request): RedirectResponse
    {

        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();
        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function showAdminDashboard(): View
    {
        $totalUsers = User::count();

        $users = User::all();

        return view('adminsettings', compact('totalUsers', 'users'));
    }
}
