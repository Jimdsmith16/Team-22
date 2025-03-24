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
use Illuminate\Support\Facades\Log;

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
        $user = $request->user();

        $this->updateProfile($user, $request);

        if ($user->type === 'admin') {
            return redirect()->back()->with('status', 'Information successfully updated.');
        }

        return redirect()->route('usersettings')
            ->with('status', 'user-updated');
    }

    protected function updateProfile(User $user, Request $request): void
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:users,name,' . $user->id,
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ]);

        $user->update($validated);
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

        if ($user->type === 'admin') {
            return redirect()
                ->to(route('admin.settings') . '#address')
                ->with('address-status', 'Address successfully updated.');
        }

        return redirect()
            ->to(route('usersettings') . '#address')
            ->with('status', 'address-updated');

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
        if (!auth()->check()) {
            Log::error('User is not authenticated');
            abort(403, 'Unauthorized access');
        }

        $user = auth()->user();
        Log::info('Authenticated User', ['user' => $user]);

        if ($user->type !== 'admin') {
            Log::error('User is not an admin', ['user' => $user]);
            abort(403, 'Unauthorized access');
        }

        $users = User::all();
        $totalUsers = $users->count();
        $products = Product::all();
        $stockRequests = StockRequest::where('status', 'pending')->get();
        $orders = \App\Models\Order::with('user', 'products')->get();

        return view('adminsettings', compact('users', 'totalUsers', 'products', 'stockRequests', 'orders'));
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

        return redirect()
            ->to(route('admin.settings') . '#user-management')
            ->with('user-add-success', 'User added successfully!');
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

    public function updatePassword(Request $request): RedirectResponse
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = $request->user();
        $user->password = Hash::make($request->password);
        $user->save();

        $url = $user->type === 'admin'
            ? route('admin.settings') . '#admin-dashboard-link'
            : route('usersettings') . '#security';

        return redirect()->to($url)
            ->with('status', 'password updated');

    }
}
