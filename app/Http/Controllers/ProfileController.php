<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
class ProfileController extends Controller
{
    public function show(): View
    {
        return view('profile.show', [
            'user' => Auth::user(),
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $user = $request->user();

        $validated = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
        ]);

        $user->update($validated);

        return redirect()->route('profile.show')->with('status', 'Profile updated successfully.');
    }

    public function destroy(Request $request): RedirectResponse
    {
        // 1. Require current password for security verification
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        // 2. Log out the user before deleting the record
        Auth::logout();

        // 3. Delete from database (or soft delete if SoftDeletes trait is enabled on User model)
        $user->delete();

        // 4. Invalidate session & regenerate CSRF token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('status', 'Your account has been permanently deleted.');
    }

}
