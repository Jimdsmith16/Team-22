<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Address;
use Illuminate\Database\QueryException;
use App\Models\Product;
use App\Models\StockRequest;


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
            'name' => 'required|string|max:255|unique:users,name,' . Auth::id(),
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
        ]);

        $user = $request->user();
        $user->update($validated);

        if ($request->filled('password')) {
            $validatedPassword = $request->validate([
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
            $user->password = bcrypt($validatedPassword['password']);
        }

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
        ]);

        if ($user->address_id) {
            $address = Address::find($user->address_id);
            if ($address) {
                $address->update($validated);
            }
        } else {
            $address = Address::create($validated);
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
        $users = User::all();
        $totalUsers = $users->count();
        $products = Product::all();
        $stockRequests = StockRequest::where('status', 'pending')->get(); 

        return view('adminsettings', compact('users', 'totalUsers', 'products', 'stockRequests'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type' => 'user',
        ]);

        return redirect()->back()->with('success', 'User added successfully!');
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->back()->with('success', 'User updated successfully!');
    }

    public function destroyUser($id)
    {
        try {
            $user = User::findOrFail($id);

            if ($user->id == auth()->id()) {
                return response()->json(['success' => false, 'message' => 'Unable to delete currently logged-in user.']);
            }

            if ($user->hasActiveOrders()) {
                return response()->json(['success' => false, 'message' => 'Unable to delete user. User has an active order.']);
            }

            $user->delete();
            return response()->json(['success' => true, 'message' => 'User deleted successfully.']);
        } catch (QueryException $e) {
            return response()->json(['success' => false, 'message' => 'Unable to delete user. User has an active order.']);
        }
    }
    public function showInventory()
    {
        $products = Product::all();

        return view('adminsettings', compact('products'));
    }

}
